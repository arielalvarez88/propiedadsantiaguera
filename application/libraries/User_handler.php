<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

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

    public static function login($email, $clave) {


        $userObject = new Usuario();
        $userObject->where(array("email"=>$email, "clave" => $clave))->get();
        if (isset($userObject->id) && $userObject->id != 0) {
            
            self::createCI();
            $CI = self::$CIObject;
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
    }
    
    public static function loginAndSaveInCookies($email, $clave) {
        
        $user = self::login($email, $clave);
    
        if (!$user)
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
        
          echo 'tamo aqui';
        var_dump($userId);
        return;
        if(!$userId)
            return false;
            
        $user = new Usuario();
        
        $user->get_user_id($userId);
      
        if($user)
            return $user;
        
        return false;
    }

}

?>
