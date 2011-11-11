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

        $this->load->library('User_info_getter_from_object');
        $this->load->library('User_info_getter_from_post');
    }

    public function panel($section = 'propiedades', $subsection ='publicadas', $messages = array()) {

        $messages = $messages ? $messages : $this->session->userdata("messages");

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $panel_view = array();

        switch ($section) {
            case 'propiedades':
                $section_info['user'] = $user;
                $section_info['subsession'] = $user;
                $section_info['messages'] = $messages;
                $section_info['pager'] = empty($subsection) || $subsection == 'publicadas' ? $this->get_user_published_properties_pager() : $this->get_user_created_properties_pager();
                $panel_view['topLeftSide'] = $this->load->view('blocks/panels_property_section', $section_info, true);
                break;
        }


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

    public function loginform() {
//$this->load->view('page.php');
        $this->load->view('blocks/login');
    }

    public function logout() {
        User_handler::loggout();
        redirect(base_url());
    }

    public function signup($extra_parameters = array()) {
        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $clientType['clientType'] = 'client';
        $form_data = array_merge($extra_parameters, $clientType);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_form.php', $form_data, true);
        $signUpData = array_merge($signUpData, $signUpData);
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }

    public function validate($editing_existing_user =false) {

        $clientType = $this->input->post('signup-client-type');
        $validationType = '';
        if($editing_existing_user)
            $validationType = $clientType == 'client' ? 'edit_client' : 'edit_company';
        else
            $validationType = $clientType == 'client' ? 'signupClient' : 'signupCompany';
        
        $user_photo_path = '';


        $user_info_is_invalid = $this->form_validation->run($validationType) == false;
        if ($user_info_is_invalid) {
            $extra_parameters = array();
            if ($editing_existing_user)
                $extra_parameters['edit'] = true;
            $this->error($extra_parameters);
            return;
        } elseif (File_handler::file_to_upload_exits("signup-photo")) {


            try {

                $upload_path = realpath("./" . Environment_vars::$environment_vars['user_photos_dir_path']);
                $user_photo_path_in_array = File_handler::save_photos(array("signup-photo"), $upload_path, 2048);
            } catch (Exception $error) {
                $extra_parameters = array();
                if ($editing_existing_user)
                    $extra_parameters['edit'] = true;
                $extra_parameters['errors'] = $error->getMessage();
                $this->signup($extra_parameters);
                return;
            }

            $user_files_hasnt_errors = $user_photo_path_in_array;

            if ($user_files_hasnt_errors)
                $user_photo_path = $user_photo_path_in_array[0];
        }

        if (!$editing_existing_user) {
            $email_already_exists = User::email_exists($this->input->post('signup-email'));

            if ($email_already_exists) {
                $messages['errors'] = "El email " . $this->input->post('signup-email') . " ya existe en nuestra base de datos";
                $this->reppopulate_signup_form($messages);
                return;
            }
        }


        if ($user_photo_path)
            $this->save_user($user_photo_path,$editing_existing_user);
        else
            $this->save_user('',$editing_existing_user);
    }

    private function reppopulate_signup_form($extra_parameters=array(), $repopulate_object = false) {

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $repopulateForm = array();
        $user_info_getter = $repopulate_object ? new User_info_getter_from_object($repopulate_object) : new User_info_getter_from_post($this->input->post());


        if ($this->input->post('signup-client-name') || $user_info_getter->get_type() == "client") {
            $repopulateForm['clientName'] = $user_info_getter->get_name();

            $repopulateForm['clientLastname'] = $user_info_getter->get_lastname();
        }
        else
            $repopulateForm['companyName'] = $user_info_getter->get_name();

        $repopulateForm['email'] = $user_info_getter->get_email();
        $repopulateForm['tel'] = $user_info_getter->get_tel();
        
        $repopulateForm['cel'] = $user_info_getter->get_cel();
        $repopulateForm['fax'] = $user_info_getter->get_fax();
        $repopulateForm['website'] = $user_info_getter->get_website();
        $repopulateForm['description'] = $user_info_getter->get_description();
        $repopulateForm['clientType'] = $user_info_getter->get_type();
        $repopulateForm['rnc'] = $user_info_getter->get_rnc();

        $repopulateForm = array_merge($repopulateForm, $extra_parameters);
        $this->signup($repopulateForm);
        }

        private function save_user($photo_file_name = false, $editing_existing_user=false) {

        $newUser = $editing_existing_user? $this->get_logged_user_or_redirect_to_please_login() : new User();
        

        
        $userInfo = $this->input->post();


        $newUser->name = isset($userInfo['signup-name']) ? $userInfo['signup-name'] : $userInfo['signup-company-name'];
        if (isset($userInfo['signup-lastname']))
            $newUser->lastname = $userInfo['signup-lastname'];
        $newUser->email = $userInfo['signup-email'];
        if($userInfo['signup-password'])
            $newUser->password = $userInfo['signup-password'];
        $newUser->tel = $userInfo['signup-tel'];
        $newUser->cel = $userInfo['signup-cel'];
        $newUser->fax = $userInfo['signup-fax'];
        $newUser->website = $userInfo['signup-website'];
        $newUser->rnc = $userInfo['signup-rnc'];
        $newUser->address = $userInfo['signup-address'];
        $newUser->description = $userInfo['signup-description'];


        if ($photo_file_name)
            $newUser->photo = Environment_vars::$environment_vars['user_photos_dir_path'] . $photo_file_name;

        
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);

        if($editing_existing_user)
            $this->editar (array("messages" => "Su información fue editada con éxito."));
        else
            redirect('/');
    }

    public function editar($extra_paramaters = array()) {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $parameters = array("edit" => true, "client_type" => "edit_client");
        $all_parameters = array_merge($parameters,$extra_paramaters);
        $this->reppopulate_signup_form($all_parameters, $user);
    }

    public function comprar_plan($plan_name) {
        $user = $this->get_logged_user_or_redirect_to_please_login();

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

    private function error($messages = array()) {



        if (isset($messages['errors']))
            $messages['errors'] .= "\n" . validation_errors();
        else
            $messages['errors'] = validation_errors();

        $this->reppopulate_signup_form($messages);
    }

}

?>
