<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Language_handler
{
    
    public static function change_langauge($language="spanish")
    {
        $CI_object = &get_instance();
        $CI_object->session->set_userdata("language",$language);
        
         $cookie = array(
            'name' => 'language',
            'value' => $language,
            'expire' => THIRTY_DAYS_IN_SECONDS,
            'path' => '/',
          
        );


        $CI_object->input->set_cookie($cookie);
    }
    
     public static function get_user_prefered_language()
    {
        $CI_object = &get_instance();
        
        
        
        $language_saved_in_session = $CI_object->session->userdata("language");
        
    
        $language_is_in_session = isset($language_saved_in_session) && $language_saved_in_session ? true : false;
        if($language_is_in_session)
            return $language_saved_in_session;
            
            $language_saved_in_cookies = $CI_object->input->cookie("language",true);
            $language_is_in_cookie= isset($language_saved_in_cookies) && $language_saved_in_cookies ? true : false;
            
            if($language_is_in_cookie)
                return $language_saved_in_cookies;
        
            $default_language = "spanish";
            return $default_language;
    }
    
    
}
?>
