<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company_user
 *
 * @author ariel
 */
require_once realpath("./application/libraries/User_base_class.php");
require_once realpath("./application/libraries/IUser.php");
class Company_user extends User_base_class implements IUser{
    
     
     public function __construct(User $user)
    {
            parent::__construct($user);
            $this->user =$user;
    }
    
  

    public function delete() {
        $agents = $this->user->get_agents();
        foreach ($agents as $agent)
        {
            $agent->delete();
        }
        $this->user->delete();
        
    }

    public function inscribe_property($property) {
        $this->user->save($property);
    }
}

?>
