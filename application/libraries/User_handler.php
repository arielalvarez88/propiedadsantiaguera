<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class User_handler {

    private static $CIObject;

    public static function saveInSession($userObject) {

       
        if ($userObject) {
            $CI = self::$CIObject;
            $CI->session-> set_userdata(array("user" => $userObject));
            return true;
        }


        return false;
    }
    
    private static function createCI()
    {
        if(!isset(self::$CIObject))
                self::$CIObject = & get_instance();
    }

    public static function login($email, $password) {


        $userObject = new User();
        $userObject->where('email', $email);
        $userObject->where('password', $password);
        $userObject->get();
        
        
        if (isset($userObject) && $userObject->id != 0) {
            
            self::createCI();
            $CI = self::$CIObject;
            
            $userObject = User_factory::get_user_from_object($userObject);
            
            self::saveInSession($userObject);
            
  
            return $userObject;
        }

   

        return false;
    }

    public static function loggout()
    {
        self::createCI();
        self::$CIObject->session->set_userdata('user','');
        self::$CIObject->input->set_cookie('user');
        redirect("/");
        
    }
    
    public static function loginAndSaveInCookies($email, $password) {
    
        $user = self::login($email, $password);
   
        if (!$user || !$user->id)
            return false;
        
    self::createCI();
     
   
        $CIHelper = self::$CIObject;
            
        $cookie = array(
            'name' => 'user',
            'value' => $user->id,
            'expire' => '2592000',
            'path' => '/',
          
        );


        $CIHelper->input->set_cookie($cookie);

        return $user;
    }

    public static function getLoggedUser() {
        self::createCI();
        $user = self::$CIObject->session->userdata('user');
        
        
        if($user)
            return $user;
        
        $userId = self::$CIObject->input->cookie('user',true);

                      
       
        if(!$userId)
            return false;
            
        $user = new User();
        
        $user->where('id =', $userId)->get();
        
        if($user->id)
            return $user;
        
        return false;
    }

}

?>
