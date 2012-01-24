<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Change_language extends CI_Controller
{
    public function set_language($language="spanish")
    {
        
        $language_is_available = array_search($language, Environment_vars::$available_languages);
        $language_to_load = '';
        if($language_is_available == false)
            $language_to_load ="spanish";
        else
            $language_to_load = $language;
        
        Language_handler::change_langauge($language_to_load);
        redirect($_SERVER['HTTP_REFERER']);
            
    }
}
?>
