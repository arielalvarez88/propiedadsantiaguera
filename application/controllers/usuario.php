<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//ini_set('display_errors','1');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('password_reset_template.php');
        $this->load->library('password_reset_success_template.php');
    }

   

    public function get_user_published_properties_pager($print='')
    {
      
        $user =$this->get_logged_user_or_redirect_to_please_login();        
        $properties_pager_info['properties'] = $user->property->where('display_property',1)->get_iterated();
        $properties_pager_info['section'] = "published";
        $return_in_string_instead_of_printing = $print ? false : true;
             
        return  $this->load->view('blocks/panels_properties_pager',$properties_pager_info,$return_in_string_instead_of_printing);

    }
    



    public function get_user_created_properties_pager($print='')
    {
        
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $properties_pager_info['properties'] = $user->property->get_iterated();
        $properties_pager_info['section'] = "created";
        $return_in_string_instead_of_printing = $print ? false : true;
        return  $this->load->view('blocks/panels_properties_pager',$properties_pager_info,$return_in_string_instead_of_printing);

    }
    
    
    
    public function panel($section = 'propiedades', $subsection ='publicadas', $messages = array())
    {
        
        $messages = $messages ? $messages : $this->session->userdata("messages");
       
        $user = $this->get_logged_user_or_redirect_to_please_login();                        
        $panel_view = array();
        
        switch($section)
        {
            case 'propiedades':
                $section_info['user'] = $user;
                $section_info['subsession'] = $user;
                $section_info['messages'] = $messages;
                $section_info['pager'] = empty($subsection ) || $subsection == 'publicadas' ? $this->get_user_published_properties_pager() : $this->get_user_created_properties_pager();
                $panel_view['topLeftSide'] = $this->load->view('blocks/panels_property_section',$section_info,true);
            break;
        }
        
        
        $this->load->view('page',$panel_view);
        
        
        
    }
    
    public function login() {
        $email = $this->input->post('login-email');
        $password = sha1($this->input->post('login-password'));

        $usuario = User_handler::loginAndSaveInCookies($email, $password);   
        
        $response = new stdClass();
        $response->success = is_object($usuario) && $usuario->id ? true : false;

        echo json_encode($response);
    }

    public function loginform() {
//$this->load->view('page.php');
        $this->load->view('blocks/login');
    }

    public function logout() {
        User_handler::loggout();
        redirect(base_url());
    }

    public function signup($repopulate_form = array()) {
        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $clientType['clientType'] = 'client';
        $form_data = array_merge($repopulate_form, $clientType);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_form.php', $form_data, true);
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }

    public function validate() {

        $clientType = $this->input->post('signup-client-type');

        $validationType = $clientType == 'client' ? 'signupClient' : 'signupCompany';
        $user_photo_path = '';
        if ($this->form_validation->run($validationType) == false) {

            $this->error();
        } else {            

            if (isset($_FILES['signup-photo']) && $_FILES['signup-photo']['size']) {
                 
                $user_photo_config['upload_path'] = Environment_vars::$environment_vars['user_photos_dir_path'];
                $user_photo_config['file_name'] = time() ;                
                $user_photo_config['allowed_types'] = 'gif|jpg|png';
                $user_photo_config['max_size'] = '1000';
                $this->load->library('upload', $user_photo_config);

                if (!$this->upload->do_upload('signup-photo')) {
                    $errores['errores'] = $this->upload->display_errors();
                    $this->reppopulate_signup_form($errores);
                    return;
                }
                $user_photo_info = $this->upload->data();
                $user_photo_path = $user_photo_info['full_path'];
            }                  
                    $this->save_user($user_photo_path);

        }
    }

    private function reppopulate_signup_form($extra_parameters=array()) {

        $repopulateForm = array();
        if ($this->input->post('signup-client-name')) {
            $repopulateForm['clientName'] = $this->input->post('signup-client-name');
            $repopulateForm['clientLastname'] = $this->input->post('signup-client-lastname');
        }
        else
            $repopulateForm['companyName'] = $this->input->post('signup-company-name');

        $repopulateForm['company'] = $this->input->post('signup-company-name');
        $repopulateForm['email'] = $this->input->post('signup-email');
        $repopulateForm['tel'] = $this->input->post('signup-tel');
        $repopulateForm['cel'] = $this->input->post('signup-cel');
        $repopulateForm['fax'] = $this->input->post('signup-fax');
        $repopulateForm['website'] = $this->input->post('signup-website');
        $repopulateForm['description'] = $this->input->post('signup-description');
        $repopulateForm['clientType'] = $this->input->post('signup-client-type');
        $repopulateForm['rnc'] = $this->input->post('signup-rnc');

        $repopulateForm = array_merge($repopulateForm, $extra_parameters);
        $this->signup($repopulateForm);
    }

    private function save_user($photo_file_path = false) {

        $newUser = new User();
        $userInfo = $this->input->post();


        $newUser->name = isset($userInfo['signup-client-name']) ? $userInfo['signup-client-name'] : $userInfo['signup-company-name'];
        if (isset($userInfo['signup-apellido']))
            $newUser->lastname = $userInfo['signup-lastname'];
        $newUser->email = $userInfo['signup-email'];
        $newUser->password = $userInfo['signup-password'];
        $newUser->tel = $userInfo['signup-tel'];
        $newUser->cel = $userInfo['signup-cel'];
        $newUser->fax = $userInfo['signup-fax'];
        $newUser->website = $userInfo['signup-website'];
        $newUser->rnc = $userInfo['signup-rnc'];
        $newUser->address = $userInfo['signup-address'];
        $newUser->description = $userInfo['signup-description'];


       if($photo_file_path)
        $newUser->photo = $photo_file_path;

        $newUser->save();

        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);

        redirect('/');
    }

    public function comprar_plan($plan_name) {
        $user = User_handler::getLoggedUser();
        if (!$user->id || !$plan_name) {
            redirect("/please_login");
        }

        switch ($plan_name) {
            case "plan-basico":
                $user->posts_left += 1;
                break;
            case "plan-plus":
                $user->posts_left += 5;
                break;
            case "plan-agente":
                $user->posts_left += 10;
                break;
            case "plan-inmobilaria":
                $user->posts_left += 25;
                break;
        }

        $user->save();
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

    private function error() {



        $repopulateForm['errores'] = validation_errors();

        $this->reppopulate_signup_form($repopulateForm);
    }

}

?>
