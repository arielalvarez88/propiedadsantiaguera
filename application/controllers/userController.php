<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UserController extends CI_Controller{
    
    
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

}
?>
