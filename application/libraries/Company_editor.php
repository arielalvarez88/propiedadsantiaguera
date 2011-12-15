<?php


require_once dirname(__FILE__)."/Company_inscriber.php";
class Company_editor extends Company_inscriber{
    

    public $validator;
    private $validation_type;
    private $inscriber_base_behavior;
    
    public function __construct($inscriber_base_behavior, $validator) {
        parent::__construct($inscriber_base_behavior, $validator);
        $this->validator = $validator;
        $this->validation_type = "edit_company";
        $this->inscriber_base_behavior = $inscriber_base_behavior;
        
    }
    
    //Overrided
   public function validate_info($user_info_getter, $inscriber_user_type) {
       return $this->validator->run($this->validation_type);
   } 
    
   
}


?>
