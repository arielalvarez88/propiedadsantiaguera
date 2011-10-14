<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//ini_set('display_errors','1');

class Usuario extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('password_reset_template.php');
        $this->load->library('password_reset_success_template.php');
    }
  
    public function login()
    {         
        $email = $this->input->post('login-email');     
        $password = sha1($this->input->post('login-password'));        
        User_handler::login($email, $password);        
        redirect(base_url());       
    }
    
    
    public function logout()
    {
                User_handler::loggout();        
                redirect(base_url());
    }
    
    public function signup()
    {
        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $clientType['clientType'] = 'client';
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_form.php', $clientType, true);
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);        
        $this->load->view('page.php', $data);
    }
    
    
    public function validate() {

        $clientType = $this->input->post('signup-client-type');

        $validationType = $clientType == 'client'? 'signupClient' : 'signupCompany'; 
        
        if ($this->form_validation->run($validationType) == false)
        {
                $this->error();
        }
        else
        {
            $this->save_user();
        }
            
    }
    
    private function save_user()
    {
       
        $newUser = new User();
        $userInfo = $this->input->post();


        $newUser->name = isset($userInfo['signup-client-name'])? $userInfo['signup-client-name'] : $userInfo['signup-company-name'];        
        if(isset($userInfo['signup-apellido']))
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
        
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);
       
        redirect('/');

        
    }
            
    public function password_reset_request()
    {
        $email = $this->input->post('password-reset-input');
        
        $usuario = new User();
        $usuario->where('email', $email);
        $usuario->get();
        $usuario->email;
        
        if($usuario->email)
        {
    
            $token = uniqid();   
            $usuario->token = $token;
            $success = $usuario->save();   

            if($success)
            {
                $send_email = new Mailer();
                $template   = new Password_reset_template($token);
                $response->success = $send_email->send_email($template, $usuario->name, $email, $token);
                echo json_encode($response);
            }
            else
            {
                die;
            } 
        }
        else
        {
            echo 'Usuario no existe';
        }
    }
    
    public function password_reset_request_success()
    {
        $email = $this->input->post('email');
        
        $usuario = new User();
        $usuario->where('email', $email);
        $usuario->get();
        $usuario->email;
        
        if($usuario->email)
        {
    
            $token = uniqid();   
            $usuario->token = $token;
            $success = $usuario->save();   

            if($success)
            {
                $send_email = new Mailer();
                $template   = new Password_reset_template($token);
                $send_email->send_email($template, $client_name, $email, $token);
                
            }
            else
            {
                die;
            } 
        }
        else
        {
            echo 'Usuario no existe';
        }
    }

    private function password_reset_confirm($token)
    {
            $success = $usuario->update('password', $token);   
            if($success)
            {
                $send_email = new Mailer();
                $template   = new password_reset_success_template($token);
                $send_email->send_email($template, $client_name, $email, $token);
            }
            else
            {
                die;
            }
        
    }

     private function error() {
         
         $repopulateForm = array();
         if($this->input->post('signup-client-name'))
         {
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
       
       
        $repopulateForm['errores'] = validation_errors();

        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_form', $repopulateForm, true);
        
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }
    


}
?>
