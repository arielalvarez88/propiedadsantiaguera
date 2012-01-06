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
class cron_jobs extends CI_Controller {

    public function expire_properties($user, $password) {

        if ($user != 'admin' || $password != 'sle9her')
            return;

        $user = new User();
        $user->get_iterated();
        
        
        
        
        foreach ($user as $user) {
            $properties = $user->property->where("display_property", 1)->get();
            
           $user_expiring_property_objects_to_send_email = array();
           
            foreach ($properties as $property) {

                $now_in_timestamp = strtotime('now');
                $property_post_date_in_timestamp = strtotime($property->post_date);


                $seconds_since_property_post = $now_in_timestamp - $property_post_date_in_timestamp;


                $property_seconds_left = THIRTY_DAYS_IN_SECONDS - $seconds_since_property_post;


                if ($property_seconds_left <= FIVE_DAYS_IN_SECONDS && !$porperty->expiration_email_sent)
                {
                    $property->expiration_email_sent = 1;
                    $user_expiring_property_objects_to_send_email[] = $property;
                }
                    


                if ($property_seconds_left <=  0) {
                    $property->display_property = 0;
                    
                }
                
            }
            $properties->save();
            
            $this->send_expiring_property_notification_email($user, $user_expiring_property_objects_to_send_email);
            
        }
        


    }

    private function send_expiring_property_notification_email($user,$user_expiring_property_objects_to_send_email) {
        $emailer = new Mailer();
        
        $user_name_and_lastname = $user->name;
            $user_name_and_lastname .= $user->lastname ? $user->lastname : '';
        $template = new Expiring_property_notification_email_template($user_name_and_lastname, $user_expiring_property_objects_to_send_email);
        $emailer->send_email($template, $user_name_and_lastname, $user->email);
        
    }

}

?>
