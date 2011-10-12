<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class password_reset_success_template implements Iemail_template
{
    private $token;
    public function __construct($token=null)
    {
        $this->token = $token;
    }
    
    public function get_subject()
    {
        return 'Cambio de password exitoso';
    }
    
    public function email_template($client_name)
    {
        $text = 'Hola '.$client_name.' su nuevo password es: '. $this->token;
        return $text;
    }
    
}
?>

