<?php


require_once dirname(__FILE__)."/IUser_inscriber.php";
class Company_inscriber implements IUser_inscriber{
    

    private $validator;
    private $validation_type;
    private $base_behavior;
    
    public function __construct($base_behavior, $validator) {
        $this->validator = $validator;
        $this->validation_type = "signupCompany";
        $this->base_behavior = $base_behavior;
        
    }
    
    
    
    public function validate_info($user_info_getter,$inscriber_user_type)
    {        
         if($this->validator->run($this->validation_type) == false) 
             throw new Validation_not_passed_exception(validation_errors ());
         
         return $this->base_behavior->validate_info($user_info_getter,$inscriber_user_type);
    }
    
    public function validate_photos() {
        $this->base_behavior->validate_photos();
    }
    
    public function save_name($user_object, $user_info_getter) {
        
        $user_object->name = $user_info_getter->get_name();
    }

    public function save_address($user_object, $user_info_getter) {
                $this->base_behavior->save_address($user_object, $user_info_getter);
    }

    public function save_cels($user_object, $user_info_getter) {
        $this->base_behavior->save_cels($user_object, $user_info_getter);
    }

    public function save_company($new_user_object,$inscriber_user_object) {
        
        
    }

    public function save_description($user_object, $user_info_getter) {
        $this->base_behavior->save_description($user_object, $user_info_getter);
    }

    public function save_email($user_object, $user_info_getter) {
        $this->base_behavior->save_email($user_object, $user_info_getter);
    }

    public function save_fax($user_object, $user_info_getter) {
        $this->base_behavior->save_fax($user_object, $user_info_getter);
    }

    public function save_lastname($user_object, $user_info_getter) {
        
    }

    public function save_password($user_object, $user_info_getter) {
        $this->base_behavior->save_password($user_object, $user_info_getter);
    }

    public function save_photo($user_object, $user_info_getter) {
        $this->base_behavior->save_photo($user_object, $user_info_getter);
    }

    public function save_rnc($user_object, $user_info_getter) {
        $this->base_behavior->save_rnc($user_object, $user_info_getter);
    }

    public function save_tel($user_object, $user_info_getter) {
        $this->base_behavior->save_tel($user_object, $user_info_getter);
    }

    public function save_website($user_object, $user_info_getter) {
        $this->base_behavior->save_website($user_object, $user_info_getter);
    }

    public function save_type($user_object, $user_info_getter) {
        $this->base_behavior->save_type($user_object, $user_info_getter);
    }
    
        public function save_inscription_date($user_object, $user_info_getter) {
         $this->base_behavior->save_inscription_date($user_object, $user_info_getter);
     }
}


?>
