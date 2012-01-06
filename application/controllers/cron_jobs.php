<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of expire_properties
 *
 * @author ariel
 */
require_once realpath('./application/libraries/mailer.php');
require_once realpath('./application/libraries/expiring_property_notification_email_template.php');

class cron_jobs extends CI_Controller {

    public function expire_properties($user, $password) {

        if ($user != 'admin' || $password != 'sle9her')
            return;

        $user = new User();
        $user->get_iterated();



        foreach ($user as $user) {
            $properties = $user->property->where("display_property", 1)->get();
            
            $user_expiring_property_objects_to_send_email = array();
            $user_expired_properties_for_reactivation = 0;

            foreach ($properties as $property) {


                $now_in_timestamp = strtotime('now');
                $property_post_date_in_timestamp = strtotime($property->post_date);


                $seconds_since_property_post = $now_in_timestamp - $property_post_date_in_timestamp;


                $property_seconds_left = THIRTY_DAYS_IN_SECONDS - $seconds_since_property_post;

                
                
                if ($property_seconds_left <= FIVE_DAYS_IN_SECONDS && !$property->expiration_email_sent) {
                    $property->expiration_email_sent = 1;
                    $user_expiring_property_objects_to_send_email[] = $property;
                    
                }



                if ($property_seconds_left <= 0) {

                    if ($property->auto_reactivation)
                        $user_expired_properties_for_reactivation++;
                    else
                        $property->display_property = 0;
                }


                $property->save();
            }

  

            $properties->where('auto_reactivation', 1)->get_iterated();

            if ($user_expired_properties_for_reactivation <= $user->posts_left) {
                foreach ($properties as $property) {

                    $property->posted_date = NOW();
                    $property->expiration_email_sent = 0;
                    $property->save();
                }
            } else {
                foreach ($properties as $property) {

                    $property->display_property = 0;
                    $property->save();
                }
            }




            if($user_expiring_property_objects_to_send_email)
                $this->send_expiring_property_notification_email($user, $user_expiring_property_objects_to_send_email);
        }
    }

    private function send_expiring_property_notification_email($user, $user_expiring_property_objects_to_send_email) {
        $emailer = new Mailer();

        $user_name_and_lastname = $user->name;
        $user_name_and_lastname .= $user->lastname ? $user->lastname : '';
        $template = new Expiring_property_notification_email_template($user_name_and_lastname, $user_expiring_property_objects_to_send_email);
        $emailer->send_email($template, $user_name_and_lastname, $user->email);
    }

}

?>
