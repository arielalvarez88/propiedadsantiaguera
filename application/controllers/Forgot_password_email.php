<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Forgot_password_email implements Email_Interface
{
    private $client_name;
    public function __construct($client_name, $client_email) 
    {
        $a = new User();
        $a->where('email =', $client_email);
        $a->get();
        if($a->id)
        {
            
        }
        else
        {
            
        }
                
    }
    
    public function get_template()
    {
        $a = 'Hola'. $this->client_name.'\n Su nueva clave es: aduken';
    }
}
?>
