<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Password_reset_template implements Iemail_template
{
    private $token;
    public function __construct($token)
    {
        $this->token = $token;
    }
    
    public function get_subject()
    {
        return 'Solicitud de cambio de password';
    }
    
    public function email_template($client_name)
    {
        $this->token;
        $text = 'Hola '.$client_name.' hemos recibido una solicitud de cambio de password
        <a href="http://www.propiedadsantiguera.com/usuario/password_reset_confirm/'.$token.'" />Click aqu&iacute;</a>';
    
        return $text;
    }
    
    
}
?>
