<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_base_class
 *
 * @author ariel
 */
abstract class User_base_class {
    protected $user;
    public function __construct($user) {
        $this->user = $user;
    }
    
public function __call($name, $arguments) {
         
    
    return call_user_func_array(array($this->user,$name), $arguments);
    
    }
    
    public function __set($name, $value) {
        $this->user->$name = $value;
    }
    
    public function __get($name) {
        return $this->user->$name;
    }
    
        public function get_number_of_properties()
    {
        return $this->user->properties->get_paged()->paged->total_rows;
    }
    
    
    
    public function get_number_of_posted_properties()
    {
        return count($this->user->properties->where('display_property',1)->get()->all);
        
    }
    
    public function get_agents()
    {
        $agents = new User();
        $agents->where("company", $this->user->id)->get();
        if($agents->count() >= 1)
                return $agents;
        
        return false;
            
    }
    
     public function get_company_object()
    {
         if(!$this->user->company)
                 return false;

         
        $company = new User();
        $company->where("id", $this->user->company)->get();
        if($company->count() >= 1)
                return $company;
        
        return false;
    }
    
    public function has_agent($agent_id=0)
    {
        $agents = $this->user->get_agents();        
        if($agents->result_count() <= 0)
            return false;
        
        
        return $agents->where("id", $agent_id)->where("company",$this->user->id)->count() >= 1;
    }
    
    
    public function can_create_property()
    {
        return $this->user->get_number_of_properties() <= $this->user->posts_left * 3;
    }
    
    public static function email_exists($email='')
    {
        if(!$email)
            return false;
        
        $possible_user = new User();
        $possible_user->where("email",$email)->get();
        
        $if_user_exists = $possible_user->id;
        return (bool) $if_user_exists;
        
    }
    
}

?>
