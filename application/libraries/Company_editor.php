<?php


require_once dirname(__FILE__)."/Company_inscriber.php";
class Company_editor extends Company_inscriber{
    

    public $validator;
    private $validation_type;
    public $base_behavior;
    
    public function __construct($base_behavior, $validator) {
        parent::__construct($base_behavior, $validator);
        $this->validator = $validator;
        $this->validation_type = "edit_company";
        $this->base_behavior = $base_behavior;
        
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
      
            
            if($this->base_behavior->user_photo_path)
            {
                parent::save_photo ($user_object, $user_info_getter);
                
            }
                
    }
}


?>
