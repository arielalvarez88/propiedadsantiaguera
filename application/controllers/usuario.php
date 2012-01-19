<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//ini_set('display_errors','1');


require_once realpath('./application/libraries/User_inscriber_factory.php');
require_once realpath('./application/libraries/User_editor_factory.php');



require_once realpath('./application/libraries/Base_user_inscriber.php');



require_once realpath('./application/libraries/Company_inscriber.php');
require_once realpath('./application/libraries/Company_editor.php');
require_once realpath('./application/libraries/Company_agent_inscriber.php');
require_once realpath('./application/libraries/Company_agent_editor.php');
require_once realpath('./application/libraries/Particular_inscriber.php');
require_once realpath('./application/libraries/Particular_editor.php');

require_once realpath('./application/libraries/Validation_not_passed_exception.php');
require_once realpath('./application/libraries/Invalid_photos_exception.php');
require_once realpath('./application/libraries/User_info_getter_from_object.php');
require_once realpath('./application/libraries/User_info_getter_from_post.php');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('password_reset_template.php');
        $this->load->library('password_reset_success_template.php');
    }

    public function panel($section = 'propiedades', $subsection ='publicadas', $messages = array()) {

        $messages = $messages ? $messages : $this->session->userdata("messages");

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $panel_view = array();



        redirect("/panel/" . $section . $subsection);
        $this->load->view('page', $panel_view);
    }

    public function login() {
        $email = $this->input->post('login-email');
        $password = sha1($this->input->post('login-password'));

        $usuario = User_handler::loginAndSaveInCookies($email, $password);

        $response = new stdClass();
        $response->success = is_object($usuario) && $usuario->id ? true : false;

        echo json_encode($response);
    }

    public function logout() {
        User_handler::loggout();
        redirect(base_url());
    }

    public function signup() {

        if(!$_SERVER['HTTPS'])
            redirect(Environment_vars::$paths['https_base_site']."/usuario/signup");
        
        $signup_form_parameters = $this->get_new_user_signup_form_variables();

        $this->load_signup_form($signup_form_parameters);
    }
    
    
   private function get_new_user_signup_form_variables($extra_parameters=array())
   {
       $inscriber = User_handler::getLoggedUser();
        
        $user_can_only_post_requests = true;

        $signup_form_parameters['user_types'] = Environment_vars::$maps['texts_to_id']['user_types_requesters'];
        
        $signup_form_parameters['client_type'] = Environment_vars::$maps['texts_to_id']['user_types_requesters']['Particular'];
        
        $signup_form_parameters = array_merge($signup_form_parameters,$extra_parameters);

        return $signup_form_parameters;
       
   }
    
    private function load_signup_form($signup_form_parameters = array())
    {  
        
        
        $signup_form_parameters['form_content'] = $this->load->view('forms/signup_form_content', $signup_form_parameters, true);
        $blocks['topLeftSide'] = $this->load->view('blocks/signup_form_container', $signup_form_parameters, true);
        $this->load->view('page.php', $blocks);
    }

    public function validate($editing_existing_user =false) {

        $logged_user = User_handler::getLoggedUser();

        $logged_user_type = $logged_user ? $logged_user->type : Environment_vars::$maps['texts_to_id']['user_types']['Particular'];


        $client_type = $this->input->post('signup-client-type');


        $validationType = '';

        $user_handler = '';
        $user_handler_base_behaviour = new Base_user_inscriber($this->form_validation);
        
       
        if ($editing_existing_user) {
            $user_handler = User_editor_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        } else {
            $user_handler = User_inscriber_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        }


        $error_messages['errors'] = '';
        try {
  
            $user_info_getter = new User_info_getter_from_post($this->input->post());
            
            $user_handler->validate_info($user_info_getter, $logged_user_type);
         

            $user_handler->validate_photos();
        } catch (Validation_not_passed_exception $validation_exception) {
            $error_messages['errors'] .= $validation_exception->getMessage() . "\n";
        } catch (Invalid_photos_exception $photos_exception) {

            $error_messages['errors'] .= $photos_exception->getMessage();
        } catch (Already_existing_user_exception $already_existing_exception) {

            $error_messages['errors'] .= $already_existing_exception->getMessage() . "\n";
        }


        if (empty($error_messages['errors']))
            $this->save_user($user_handler, $editing_existing_user);
        else
            $this->error($error_messages, $editing_existing_user);
    }

    private function reppopulate_signup_form($extra_parameters=array(), $repopulate_object = false) {


        $repopulateForm = array();
        $user_info_getter = $repopulate_object ? new User_info_getter_from_object($repopulate_object) : new User_info_getter_from_post($this->input->post());



        $repopulateForm['companyName'] = $user_info_getter->get_name();


        $repopulateForm['clientName'] = $user_info_getter->get_name();
        



        $repopulateForm['email'] = $user_info_getter->get_email();
        $repopulateForm['tel'] = $user_info_getter->get_tel();
        $repopulateForm['address'] = $user_info_getter->get_address();
        $repopulateForm['description'] = $user_info_getter->get_description();

        $repopulateForm['cel'] = $user_info_getter->get_cel();
        $repopulateForm['cel2'] = $user_info_getter->get_cel2();
        $repopulateForm['fax'] = $user_info_getter->get_fax();
        $repopulateForm['website'] = $user_info_getter->get_website();
        $repopulateForm['description'] = $user_info_getter->get_description();

        $repopulateForm['client_type'] = $user_info_getter->get_type();
        
        $repopulateForm = array_merge($repopulateForm, $extra_parameters);        
    
        $this->load_signup_form ($repopulateForm);

    }

    private function save_user($user_handler, $editing_user=false) {


        $user = new User();
        
        $inscriber = User_handler::getLoggedUser();
        $user_info_getter = new User_info_getter_from_post($this->input->post());

        if ($editing_user) {
            $user = $user->where("id", $user_info_getter->get_id())->get();
        }
  
        $user_handler->save_name($user, $user_info_getter);


        $user_handler->save_company($user, $inscriber);
        $user_handler->save_type($user, $user_info_getter);
        $user_handler->save_email($user, $user_info_getter);

        $user_handler->save_password($user, $user_info_getter);
        $user_handler->save_website($user, $user_info_getter);
        $user_handler->save_tel($user, $user_info_getter);

        $user_handler->save_cels($user, $user_info_getter);
        
        $user_handler->save_fax($user, $user_info_getter);

        $user_handler->save_photo($user, $user_info_getter);
        
        
        $user_handler->save_address($user, $user_info_getter);
        $user_handler->save_description($user, $user_info_getter);
        $user_handler->save_inscription_date($user, $user_info_getter);


        
        
        

        
        $user->save();

        $company_is_adding_or_editing_agent = ($user_handler instanceof Company_agent_inscriber || $user_handler instanceof Company_agent_editor) && ($inscriber && $inscriber instanceof Company_user);

         
        

       
            
         
          
            if(!$company_is_adding_or_editing_agent)
            {
                User_handler::loginAndSaveInCookies($user->email, $user->password);
                redirect('/panel/cuenta');
            }
            else
            {
                
                redirect('/panel/agentes');
            }
      
   
    }

    
    
    public function editar($user_id=null) {
        if(!$_SERVER['HTTPS'])
            redirect(Environment_vars::$paths['https_base_site'].'/usuario/editar/'.$user_id);

        $logged_user = $this->get_logged_user_or_redirect_to_please_login();
        
        
        
              $user_to_edit = '';
        $is_himself = '';
        $is_his_agent = '';

        if ($user_id) {
            $is_his_agent = $logged_user->has_agent($user_id);
            $is_himself = $user_id == $logged_user->id;
        } else {
            $is_himself = true;
        }

        if ($is_his_agent)
            $user_to_edit = User_factory::get_user_from_id ($user_id);
        elseif ($is_himself)
            $user_to_edit = $logged_user;
        else
            redirect("/pagina_no_valida");
        
        $edit_form_parameters = $this->get_edit_form_parameters($user_id);
        
        $this->reppopulate_signup_form($edit_form_parameters, $user_to_edit);
    }
    
    
    private function get_edit_form_parameters($user_id = null, $extra_parameters =array())
    {
        $logged_user = $this->get_logged_user_or_redirect_to_please_login();

        $user_to_edit = '';
        $is_himself = '';
        $is_his_agent = '';
               
        if ($user_id) {
            $is_his_agent = $logged_user->has_agent($user_id);
            $is_himself = $user_id == $logged_user->id;
        } else {
            $is_himself = true;
        }

        if ($is_his_agent)
            $user_to_edit = User_factory::get_user_from_id ($user_id);
        elseif ($is_himself)
            $user_to_edit = $logged_user;
        else
            redirect("/pagina_no_valida");

        $edit_form_parameters['edit'] = true;
        $edit_form_parameters['edit_client_id'] = $user_to_edit->id;
        
        
        if($user_to_edit instanceof IUser_requests_only)
        {
            
            $edit_form_parameters['user_types'] = Environment_vars::$maps['texts_to_id']['user_types_requesters'];
        }
            
        
            
        
        else
            $edit_form_parameters['user_types'] = Environment_vars::$maps['texts_to_id']['user_types'];
        
        $edit_form_parameters['client_type'] = $user_to_edit->type;
        
        
        $edit_form_parameters['user_to_edit'] = $user_to_edit;
        
        $edit_form_parameters = array_merge($extra_parameters,$edit_form_parameters);
        return $edit_form_parameters;
        
    }
    

    public function comprar_plan($plan_name) {
        $user = $this->get_logged_user_or_redirect_to_please_login();

        if ($user instanceof Company_agent_user)
            redirect("/pagina_no_valida");

        switch ($plan_name) {
            case "basico":
                $user->posts_left += 1;
                break;
            case "plus":
                $user->posts_left += 5;
                break;
            case "agente":
                $user->posts_left += 10;
                break;
            case "inmobiliaria":
                $user->posts_left += 25;
                break;
        }

        $user->save();
        redirect("/panel/propiedades");
    }

    public function password_reset_request() {
        $email = $this->input->post('password-reset-input');

        $usuario = new User();
        $usuario->where('email', $email);
        $usuario->get();
        $usuario->email;

        if ($usuario->email) {

            $token = uniqid();
            $usuario->token = $token;
            $success = $usuario->save();

            if ($success) {
                $send_email = new Mailer();
                $template = new Password_reset_template($token);
                $response->success = $send_email->send_email($template, $usuario->name, $email, $token);
                echo json_encode($response);
            } else {
                die;
            }
        } else {
            echo 'Usuario no existe';
        }
    }

    public function password_reset_request_success() {
        $email = $this->input->post('email');

        $usuario = new User();
        $usuario->where('email', $email);
        $usuario->get();
        $usuario->email;

        if ($usuario->email) {
            $token = uniqid();
            $usuario->token = $token;
            $success = $usuario->save();

            if ($success) {
                $send_email = new Mailer();
                $template = new Password_reset_template($token);
                $send_email->send_email($template, $usuario->name, $email, $token);
            } else {
                die;
            }
        } else {
            echo 'Usuario no existe';
        }
    }

    public function password_reset_confirm($token) {
        $usuario = new User();
        $usuario->where('token', $token);
        $usuario->get();

        $new_token = uniqid();

        $usuario->password = $new_token;
        $usuario->token = '';
        $data = '';
        $success = $usuario->save();
        if ($success) {
            $send_email = new Mailer();
            $template = new password_reset_success_template($new_token);
            $send_email->send_email($template, $usuario->name, $usuario->email, $new_token);
            $response ['success'] = true;
            $data['topLeftSide'] = $this->load->view('blocks/password_reset_confirmed', $response, true);
        } else {
            $response ['success'] = false;
            $data['topLeftSide'] = $this->load->view('blocks/password_reset_confirmed', $response, true);
        }
        $this->load->view('page.php', $data);
    }

    private function error($error_messages=array(), $editing_user=false) {


        $parameters_to_repopulate = array();
        $user_to_edit = null;
        if ($editing_user)
        {
            $user_to_edit = $this->input->post("edit-client-id");
            $parameters_to_repopulate = $this->get_edit_form_parameters ($user_to_edit,$error_messages);
            $user_to_edit = $parameters_to_repopulate['user_to_edit'];
        }
        else
        {
            $parameters_to_repopulate = $this->get_new_user_signup_form_variables($error_messages);
        }
        
            
        
        
        
            $this->reppopulate_signup_form($parameters_to_repopulate,$user_to_edit);
        
            
    }

}

?>
