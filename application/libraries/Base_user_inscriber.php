<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__) . "/IUser_inscriber.php";
require_once dirname(__FILE__) . "/Already_existing_user_exception.php";


class Base_user_inscriber implements IUser_inscriber {

    private $validator;
    public $validation_type;
    protected $inscriber_base_behavior;
    public $user_photo_path;
    
    
    
    public function __construct($validator) {
        $this->validator = $validator;
        $this->validation_type = "user_signup_common";
    }

    public function validate_info($user_info_getter,$inscriber_user_type) {
        
        $email_already_exist = User::email_exists($user_info_getter->get_email());
        if($email_already_exist)
            throw new Already_existing_user_exception();
        
        
        
        if($this->validator->run($this->validation_type) == false)
        {            
                throw new Validation_not_passed_exception (validation_errors());
                
        }
        
        return true;
        
    }

    
    
    public function validate_photos($user_info_getter) {

        
        if (!File_handler::file_to_upload_exits("signup-photo"))
        {
                return true;
        }
           

        try {

            $upload_path =  Environment_vars::$environment_vars['user_photos_dir_path'];
            
            $user_photo_path_in_array = File_handler::save_photos(array("signup-photo"), $upload_path);
        } catch (Exception $error) {
       
            throw new Invalid_photos_exception($error->getMessage());
        }
        

        
        $this->user_photo_path = isset($user_photo_path_in_array['signup-photo']) ? $user_photo_path_in_array['signup-photo'] : '';
        
        
    }

    public function save_name($user_object,$user_info_getter) {
        
      
             
        $user_object->name = $user_info_getter->get_name();
        
        
    }
    
    public function save_address($user_object, $user_info_getter) {
        $user_object->address = $user_info_getter->get_address();
    }

    public function save_cels($user_object, $user_info_getter) {
        $user_object->cel = $user_info_getter->get_cel();
        $user_object->cel2 = $user_info_getter->get_cel2();
    }

   public function save_company($new_user_object,$inscriber_user_object) {
        
    }

    public function save_description($user_object, $user_info_getter) {
        $user_object->description = $user_info_getter->get_description();
    }

    public function save_email($user_object, $user_info_getter) {
        $user_object->email = $user_info_getter->get_email();
    }

    public function save_fax($user_object, $user_info_getter) {
        
        $user_object->fax = $user_info_getter->get_fax();
        
    }

    public function save_lastname($user_object, $user_info_getter) {
      
        
        
    }

    public function save_password($user_object, $user_info_getter) {
        $password = $user_info_getter->get_password();
        if(!empty ($password))
            $user_object->password = $password;
    }

    public function save_photo($user_object, $user_info_getter) {
         
       
        if(!$this->user_photo_path)
        {
            $user_type = $user_info_getter->get_type();
            $user_type_is_company = $user_type == Environment_vars::$maps['texts_to_id']["user_types"]["Empresa"] || $user_type == Environment_vars::$maps['texts_to_id']["user_types_requesters"]["Empresa"];
            $this->user_photo_path =  $user_type_is_company? Environment_vars::$paths['default_company_photo'] : Environment_vars::$paths['default_agent_photo'];             
        }
        
        $user_object->photo = $this->user_photo_path;
    }

    public function save_rnc($user_object, $user_info_getter) {
        $user_object->rnc = $user_info_getter->get_rnc();
    }

    public function save_tel($user_object, $user_info_getter) {
        $user_object->tel = $user_info_getter->get_tel();
    }

    public function save_website($user_object, $user_info_getter) {
       
        $user_object->website = $user_info_getter->get_website();
    }

    public function save_type($user_object, $user_info_getter) {
        
        $user_object->type = $user_info_getter->get_type();
        
    }

    public function save_inscription_date($user_object, $user_info_getter) {
        date_default_timezone_set("America/La_Paz");
        $date = date('Y-m-d H:i:s');
        $user_object->registration_date = $date;
    }
    
    
    
}

?>
