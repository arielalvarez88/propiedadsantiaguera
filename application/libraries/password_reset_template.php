<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Password_reset_template implements Iemail_template
{
    public $token;
    public function __construct($token=null)
    {
        $this->token = $token;
    }
    
    public function get_subject()
    {
        return 'Solicitud de cambio de password';
    }
    
    public function email_template($client_name)
    {
        $token = $this->token;
        $text = 'Hola '.$client_name.' hemos recibido una solicitud de cambio de password
        http://www.propiedadsantiaguera.5050mkt.com/usuario/password_reset_confirm/'.$token;  
        return $text;
    }
    
    
}
?>
