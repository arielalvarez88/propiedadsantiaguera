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
class cron_jobs extends CI_Controller{
    public function expire_properties($user,$password)
    {
        
        file_put_contents(realpath('./debug').'/runned_by_cron3', 'se corrio por cron');
        
        if($user != 'admin' || $password != 'sle9her')
            return;
        
        $properties = new Property();
        $properties->where("display_property",1)->get_iterated();
        foreach($properties as $property)
        {
            
            $now_in_timestamp = strtotime('now');
            $property_in_timestamp = strtotime($property->post_date);
            
            $thirty_days_in_seconds = 1 * 60 * 60 * 24 * 30;
            $five_hours_inseconds = 1 * 60 * 60 * 5;
            $seconds_since_property_post = $now_in_timestamp - $property_in_timestamp;
            
            if($seconds_since_property_post >= $five_hours_inseconds)
            {
                $property->display_property = 0;
                $property->save();
            }
            
        }
            
    }
}

?>
