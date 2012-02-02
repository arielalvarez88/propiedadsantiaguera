<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_user
 *
 * @author ariel
 */

require_once realpath("./application/libraries/User_base_class.php");
class Admin_user extends User_base_class{
    public function __construct($user) {
        parent::__construct($user);
    }
    
}

?>
