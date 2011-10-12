<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class mailer
{
    public function send_email($template, $client_name, $email, $token)
    {
        mail($email, $template->get_subject(), $template->email_template($client_name),$headers);

    }
}
    
?>
