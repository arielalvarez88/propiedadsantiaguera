<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Mailer
{
    public function send_email($template, $client_name, $email, $token='')
    {
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=iso=8859-1'."\r\n" ;
        $headers .= 'From: propiedadsantiaguera.com <info@propiedadsantiaguera.com>'."\r\n";
        
        return mail($email, $template->get_subject(), $template->email_template($client_name),$headers);

    }
}
    
?>
