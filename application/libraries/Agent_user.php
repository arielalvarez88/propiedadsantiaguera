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
require_once  realpath("./application/libraries/IUser.php");
require_once realpath("./application/libraries/User_base_class.php");

class Agent_user extends User_base_class {
    public $user;
    
    
     
     public function __construct(User $user)
    {
            parent::__construct($user);
            $this->user =$user;
    }
    
   

     public function get_type_text(){
        
      return "Agente";
      
    }

    public function delete() {
         $this->user->delete();
    }

    public function get_properties() {
        return $this->user->property->get()->all;
    }

    public function inscribe_property($property) {
         $this->user->save($property);
    }
}

?>
