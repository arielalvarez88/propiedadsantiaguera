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
class Company_user extends User_base_class {
    
     
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

    
       public function get_type_text(){
        
      return "Empresa";
      
    }
    
    public function inscribe_property($property) {
        $this->user->save($property);
    }
    
    public function get_properties()
    {
        
       
        $properties = $this->user->property->get()->all;
        
        $agents = $this->get_agents();
        
        
        foreach ($agents as $agent)
        {
            $agent_properties = $agent->property->get()->all;
            $properties = array_merge($properties, $agent_properties);
        }
        
        
        return $properties;
        
    }

    //Override
    public function get_published_properties() {
        $own_published_properties = parent::get_published_properties();
        $agents = $this->get_agents();
        $agents_published_properties = array();
        
        foreach ($agents as $agent )
        {
            $agents_published_properties = array_merge($agents_published_properties,$agent->property->where("display_property", 1)->get()->all);
        }
        $all_published_properties = array_merge($agents_published_properties, $own_published_properties);
        return $all_published_properties;
        
    }
    
       public function get_number_of_properties(){
 
        $number_of_own_properties =  parent::get_number_of_properties();
        
        
        
        $number_of_agents_properties = 0;
        $agents = $this->get_agents();
        
        foreach ($agents as $agent)
            $number_of_agents_properties += $agent->get_number_of_properties ();
        
        
        
        return $number_of_own_properties + $number_of_agents_properties;
    }
    
    public function  get_number_of_posted_properties()
    {
        
        $number_of_own_posted_properties =  parent::get_number_of_posted_properties();
        $agents = $this->get_agents();
        $number_of_agents_posted_properties= 0;
        foreach($agents as $agent)
            $number_of_agents_posted_properties += $agent->get_number_of_posted_properties();
        
        return $number_of_own_posted_properties + $number_of_agents_posted_properties;
        
    }


}

?>
