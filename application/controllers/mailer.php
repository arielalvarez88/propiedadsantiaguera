<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$a = new Mailer(new Forgot_password_email('ariel'));
class Mailer 
{
    private $template;
    
    public function __construct(Email_template $template) 
    {
        $this->template = $template;      
    }
    
    public function sendemail($email,$subject,$message,$headers)
    {
        mail($email, $subject, $this->template->get_template(), $headers);
    }
    
}
?>
