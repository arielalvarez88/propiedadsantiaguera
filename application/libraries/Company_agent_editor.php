<?php


require_once dirname(__FILE__)."/Company_agent_inscriber.php";
require_once dirname(__FILE__)."/Validation_not_passed_exception.php";
class Company_agent_editor extends Company_agent_inscriber{
    

    public $validator;
    private $validation_type;
    private $inscriber_base_behavior;
    
    public function __construct($inscriber_base_behavior, $validator) {
 
        parent::__construct($inscriber_base_behavior, $validator);
        $this->validator = $validator;
        $this->validation_type = "edit_client";
        $this->inscriber_base_behavior = $inscriber_base_behavior;
        
    }
    
    //Overrided
   public function validate_info($user_info_getter, $inscriber_user_type) {
      
       if($this->validator->run($this->validation_type))
               return true;
       else
        throw new Validation_not_passed_exception();
  } 
    
   //Overrided
  public function save_photo($user_object, $user_info_getter) {
            if($this->base_behaviour->user_photo_path)
                parent::save_photo ($user_object, $user_info_getter);
    }
   
}


?>
