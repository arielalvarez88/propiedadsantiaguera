<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParticularUser
 *
 * @author ariel
 */
require_once realpath("./application/libraries/IUser.php");
require_once realpath("./application/libraries/User_base_class.php");

class Particular_user extends User_base_class implements IUser{
    public $user;
     
     public function __construct(User $user)
    {
            parent::__construct($user);
            $this->user =$user;
    }
    

    public function delete(){
        $this->user->delete();
    }

    public function inscribe_property($property) {
        
    }
}

?>
