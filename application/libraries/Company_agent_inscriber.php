<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Company_agent_inscriber implements IUser_inscriber {

    public $base_behaviour;
    public $validator;
    private $validation_type;
    
    public function __construct($base_behaviour, $validator) {
        $this->base_behaviour = $base_behaviour;
        $this->validator = $validator;
        
       $this->validation_type = "signupClient";
    }
    
    public function save_address($user_object, $user_info_getter) {
        $this->base_behaviour->save_address($user_object, $user_info_getter);
    }

    public function save_cels($user_object, $user_info_getter) {
        $this->base_behaviour->save_cels($user_object, $user_info_getter);
    }

    public function save_company($new_user_object,$inscriber_user_object) {
        
        if($inscriber_user_object)
                $new_user_object->company = $inscriber_user_object->id;
    }

    public function save_description($user_object, $user_info_getter) {
        $this->base_behaviour->save_description($user_object, $user_info_getter);
    }

    public function save_email($user_object, $user_info_getter) {
        $this->base_behaviour->save_email($user_object, $user_info_getter);
    }

    public function save_fax($user_object, $user_info_getter) {
        $this->base_behaviour->save_fax($user_object, $user_info_getter);
    }

    public function save_lastname($user_object, $user_info_getter) {
        $this->base_behaviour->save_lastname($user_object, $user_info_getter);
    }

    public function save_name($user_object, $user_info_getter) {
        $this->base_behaviour->save_name($user_object, $user_info_getter);
    }

    public function save_password($user_object, $user_info_getter) {
        $this->base_behaviour->save_password($user_object, $user_info_getter);
    }

    public function save_photo($user_object, $user_info_getter) {
        $this->base_behaviour->save_photo($user_object, $user_info_getter);
    }

    public function save_rnc($user_object, $user_info_getter) {
        $this->base_behaviour->save_rnc($user_object, $user_info_getter);
    }

    public function save_tel($user_object, $user_info_getter) {
        $this->base_behaviour->save_tel($user_object, $user_info_getter);
    }

    public function save_website($user_object, $user_info_getter) {
        $this->base_behaviour->save_website($user_object, $user_info_getter);
    }

    public function validate_info($user_info_getter,$inscriber_user_type) {
       
     
        if($this->validator->run($this->validation_type) == false)
        {            
                throw new Validation_not_passed_exception (validation_errors());
                
        }
            
     
        return $this->base_behaviour->validate_info($user_info_getter,$inscriber_user_type);
    }

    public function validate_photos($user_info_getter) {
 
        return $this->base_behaviour->validate_photos($user_info_getter);
    }

    public function save_type($user_object, $user_info_getter) {
        $this->base_behaviour->save_type($user_object, $user_info_getter);
    }
    
     public function save_inscription_date($user_object, $user_info_getter) {
         $this->base_behaviour->save_inscription_date($user_object, $user_info_getter);
     }
     public function save_usa_tel($user_object, $user_info_getter) {
        $this->base_behaviour->save_usa_tel($user_object, $user_info_getter);
    }
      public function save_bbpin($user_object, $user_info_getter) {
        $this->base_behaviour->save_bbpin($user_object, $user_info_getter);
    }

}

?>
