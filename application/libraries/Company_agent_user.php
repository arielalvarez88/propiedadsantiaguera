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

class Company_agent_user extends User_base_class {
    public $user;
    public $company;
    
    
         
     
     public function __construct($user)
    {
            parent::__construct($user);
            $this->user = $user;
    }
    

    
    public function get_company()
    {
        
      
        
        $this->company = $this->user->get_company_object();
        
        return $this->company;
        
    }
    
    public function get_type_text(){
        
      return "Agente";
      
    }
    
    
    public function delete(){
        
      $company = $this->get_company();
      
      
      $company->posts_left += $this->user->posts_left;
      
      $user_properties  = $this->get_properties();
      
      
      $company->save($user_properties);      
      $this->user->delete();
      
    }

     
    
    public function inscribe_property($property) {
        
        $this->user->save($property);
        $company =$this->get_company()->save($property);
        
    }

 

    
}

?>
