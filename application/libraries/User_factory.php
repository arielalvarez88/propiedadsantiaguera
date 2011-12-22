<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_factory
 *
 * @author ariel
 */
require_once realpath("./application/libraries/Company_agent_user.php");
require_once realpath("./application/libraries/Company_user.php");
require_once realpath("./application/libraries/Particular_user.php");
require_once realpath("./application/libraries/Agent_user.php");


require_once realpath("./application/libraries/Company_requester_user.php");
require_once realpath("./application/libraries/Particular_requester_user.php");
require_once realpath("./application/libraries/Agent_requester_user.php");


class User_factory {

    public static function get_user_from_object($user) {
 
        switch ($user->type) {
            case Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa']:                       
                return new Company_agent_user($user);
                break;
            case Environment_vars::$maps['texts_to_id']['user_types']['Agente Independiente']:
                return new Agent_user($user);
                break;
            case Environment_vars::$maps['texts_to_id']['user_types']['Particular']:
                return new Particular_user($user);
                break;
            case Environment_vars::$maps['texts_to_id']['user_types']['Empresa']:
                return new Company_user($user);
                break;
            

            case Environment_vars::$maps['texts_to_id']['user_types_requesters']['Agente Independiente']:
                return new Agent_requester_user($user);
                break;
            case Environment_vars::$maps['texts_to_id']['user_types_requesters']['Particular']:                
                return new Particular_requester_user($user);
                break;
            case Environment_vars::$maps['texts_to_id']['user_types_requesters']['Empresa']:
                return new Company_requester_user($user);
                break;
        
        }
    }

    public static function get_user_from_id($id) {
        $user = new User($id);
        
        return User_factory::get_user_from_object($user);
    }

}

?>
