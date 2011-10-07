<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario extends CI_Controller{
    
    
    
    
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
    
    
    private function validate() {
    
       
        $clientType = $this->input->post('signup-client-type');

        $validationType = $clientType == 'client'? 'signupClient' : 'signupCompany'; 
        
        if ($this->form_validation->run($validationType) == false)
            $this->error();
        
        else
            $this->save_user();
    }
    
    private function save_user()
    {
        $newUser = new User();
        $userInfo = $this->input->post();


        $newUser->name = isset($userInfo['signup-client-name'])? $userInfo['signup-cleint-name'] : $userInfo['signup-company-name'];        
        if(isset($userInfo['signup-apellido']))
            $newUser->lastname = $userInfo['signup-lastname'];       
        $newUser->email = $userInfo['signup-email'];
        $newUser->password = $userInfo['signup-password'];
        $newUser->tel = $userInfo['signup-tel'];
        $newUser->cel = $userInfo['signup-cel'];
        $newUser->fax = $userInfo['signup-fax'];
        $newUser->website = $userInfo['signup-website'];        
        $newUser->rnc = $userInfo['signup-rnc'];
        $newUser->address = $userInfo['signup-adress'];
        $newUser->description = $userInfo['signup-description'];
        
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);
        redirect('/');

        
    }
    
    

}
?>
