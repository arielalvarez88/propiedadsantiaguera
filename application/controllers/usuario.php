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

    public function signup($client_type_string= null, $requester=null, $extra_parameters = array()) {
        
        $client_type_is_valid = $client_type_string == null ||  array_key_exists($client_type_string, Environment_vars::$maps['html_to_id']['user_types']);
        
        if(!$client_type_is_valid)
            redirect ("/pagina_no_valida");
        
        $inscriber = User_handler::getLoggedUser();
        if(!isset($extra_parameters['user_types']))
        {
            if($requester)
                $extra_parameters['user_types'] =  Environment_vars::$maps['texts_to_id']['user_types_requesters'];
            else
                $extra_parameters['user_types'] = $inscriber && $inscriber->type== Environment_vars::$maps['texts_to_id']['Empresa']?  Environment_vars::$maps['texts_to_id']['user_types'] : Environment_vars::$maps['texts_to_id']['user_types_if_not_company'];
        }
        
        if(!isset ($extra_parameters['client_type']))
            $extra_parameters['client_type'] = $client_type_string ? Environment_vars::$maps['html_to_id']['user_types'][$client_type_string]  : Environment_vars::$maps['texts_to_id']['user_types']['Particular'];
        
        $inscriber_is_logged = User_handler::getLoggedUser();
        
        if($inscriber_is_logged)
            $extra_parameters['inscriber_type'] = $inscriber_is_logged->type;
            
        
        if($inscriber && $inscriber->type == Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa'] && isset($extra_parameters['edit']))
        {
            $extra_parameters['hide_all_fields_except_password'] =  'hidden';
        }
        
        $blocks['topLeftSide'] = $this->load->view('forms/signup_form', $extra_parameters, true);
        $this->load->view('page.php', $blocks);
    }

    public function validate($editing_existing_user =false) {
        
         $logged_user = User_handler::getLoggedUser();
    
         $logged_user_type = $logged_user? $logged_user->type  : Environment_vars::$maps['texts_to_id']['user_types']['Particular'];
         
         
        $client_type = $this->input->post('signup-client-type');
        
 
        $validationType = '';
        
        $user_handler = '';
        $user_handler_base_behaviour = new Base_user_inscriber($this->form_validation);
        if($editing_existing_user)
        {
            $user_handler = User_editor_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        }
        else 
        {
            
           $user_handler = User_inscriber_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        }


        $error_messages['errors'] = '';
        try{
                 
            $user_info_getter = new User_info_getter_from_post($this->input->post());
            $user_handler->validate_info($user_info_getter,$logged_user_type);
  
            $user_handler->validate_photos();
            
       
        }
        
        
        catch(Validation_not_passed_exception $validation_exception)
        {
            $error_messages['errors'] .= $validation_exception->getMessage() . "\n";
        }
        catch(Invalid_photos_exception $photos_exception)
        {
         
            $error_messages['errors'] .= $photos_exception->getMessage();
        }
        catch(Already_existing_user_exception $already_existing_exception)
        {
            
            $error_messages['errors'] .= $already_existing_exception->getMessage()  . "\n";
        }
        

        if(empty ($error_messages['errors']))
            $this->save_user ($user_handler, $editing_existing_user);
        else
            $this->error ($error_messages, $editing_existing_user);
        
    }

    private function reppopulate_signup_form($extra_parameters=array(), $repopulate_object = false) {

        
        $repopulateForm = array();
        $user_info_getter = $repopulate_object ? new User_info_getter_from_object($repopulate_object) : new User_info_getter_from_post($this->input->post());


        if ($user_info_getter->get_type() == Environment_vars::$maps['texts_to_id']['user_types']['Empresa']) {
           $repopulateForm['companyName'] = $user_info_getter->get_name();
        }
        else
        {
            $repopulateForm['clientName'] = $user_info_getter->get_name();
            $repopulateForm['clientLastname'] = $user_info_getter->get_lastname();
        }
            
                        
        $repopulateForm['email'] = $user_info_getter->get_email();
        $repopulateForm['tel'] = $user_info_getter->get_tel();
        $repopulateForm['address'] = $user_info_getter->get_address();
        $repopulateForm['description'] = $user_info_getter->get_description();

        $repopulateForm['cel'] = $user_info_getter->get_cel();
        $repopulateForm['fax'] = $user_info_getter->get_fax();
        $repopulateForm['website'] = $user_info_getter->get_website();
        $repopulateForm['description'] = $user_info_getter->get_description();
        
        $repopulateForm['client_type'] = $user_info_getter->get_type();

   
        $repopulateForm = array_merge($repopulateForm, $extra_parameters);
        
        $this->signup('','',$repopulateForm);
    }

    private function save_user($user_handler, $editing_user=false) {
   
        $user = new User();
                                 
        $inscriber = User_handler::getLoggedUser();                       
        $user_info_getter = new User_info_getter_from_post($this->input->post());
        
         if($editing_user)
        {
            
            $user = $user->where("id",$user_info_getter->get_id())->get();
            
        }
        
      
   
        $user_handler->save_name($user,$user_info_getter);
        $user_handler->save_lastname($user,$user_info_getter);
        $user_handler->save_company($user,$inscriber);
        $user_handler->save_type($user,$user_info_getter);
        $user_handler->save_email($user,$user_info_getter);
        
        $user_handler->save_password($user,$user_info_getter);
        $user_handler->save_website($user,$user_info_getter);
        $user_handler->save_tel($user,$user_info_getter);
              
        $user_handler->save_cel($user,$user_info_getter);
        $user_handler->save_fax($user,$user_info_getter);

        $user_handler->save_photo($user,$user_info_getter);
        $user_handler->save_address($user,$user_info_getter);
        $user_handler->save_description($user,$user_info_getter);                    
        $user_handler->save_inscription_date($user, $user_info_getter);
       
                
        $user->save();
       

        $company_is_adding_or_editing_agent = $user_handler instanceof Company_agent_inscriber || $user_handler instanceof Company_agent_editor;
        
        if($company_is_adding_or_editing_agent)
            redirect('/panel/agentes');                                    
        
        if ($editing_user)
        {
            $user_is_editing_himself= $inscriber && $user_info_getter->get_id() == $inscriber->id;
            if($user_is_editing_himself)
                    User_handler::loginAndSaveInCookies($user->email, $user->password);                       
                    
            $this->editar($user_info_getter->get_id(),array("messages" => "Su información fue editada con éxito."));
        }
            
        else
        {
            
            User_handler::loginAndSaveInCookies($user->email, $user->password);
            redirect('/');
            
        }
            
    }

    public function editar($user_id=null, $extra_paramaters = array()) {
        
        $logged_user = $this->get_logged_user_or_redirect_to_please_login();
        
        $user_to_edit = '';        
        $is_himself ='';
        $is_his_agent= '';
        
        if($user_id)
        {            
            $is_his_agent = $logged_user->has_agent($user_id);
            $is_himself = $user_id == $logged_user->id; 
            
        }
        else
        {
            $is_himself=true;
        }
        
        if($is_his_agent)        
            $user_to_edit = new User($user_id);
        elseif($is_himself)
            $user_to_edit = new User($logged_user->id);
        else
            redirect ("/pagina_no_valida");
                                        
        $extra_paramaters['edit'] = true;
        
        
        
        
        $extra_paramaters['edit_client_id'] = $user_to_edit->id;
        $this->reppopulate_signup_form($extra_paramaters, $user_to_edit, true);
    }

    public function comprar_plan($plan_name) {
        $user = $this->get_logged_user_or_redirect_to_please_login();

        if($user instanceof Company_agent_user)
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

    private function error($error_messages=array(), $editing_user=false, $requesters_only=false) {

           
            if ($editing_user)
                $error_messages['edit'] = true;
            if($requesters_only)
                $error_messages['user_types'] = Environment_vars::$maps['texts_to_id']['user_types_requesters'];
            
            $this->reppopulate_signup_form($error_messages);
        
    }

}

?>
