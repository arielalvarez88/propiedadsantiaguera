<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


require_once dirname(__FILE__).'/IUser_info_getter.php';

class User_info_getter_from_object implements IUser_info_getter
{
    
    private $user_object;
    public function __construct($user_object = null)
    {
        $this->user_object = $user_object? $user_object : new stdClass();
    }
    
    
    public function get_name(){
         return $this->user_object->name;
     }
     
    public function get_lastname(){
      
    }
    
    public function get_email(){
        return $this->user_object->email;
    }
    
    
    public function get_website(){
        return $this->user_object->website;
    }
    public function get_description(){
        return $this->user_object->description;
    }
    
    public function get_photo(){
        return $this->user_object->photo;
    }
    
    public function get_tel(){
        return $this->user_object->tel;
    }
    public function get_cel(){
        return $this->user_object->cel;
    }
    
    public function get_cel2(){
        return $this->user_object->cel2;
    }
    
    public function get_fax(){
        return $this->user_object->fax;
    }
    public function get_rnc(){
        return $this->user_object->rnc;
    }
    public function get_address(){
        return $this->user_object->address;
    }
    
       public function get_type(){
        return $this->user_object->type;
    }
    
    public function get_usa_tel() {
        return $this->user_object->usa_tel;
    }

    public function get_id() {
          return $this->user_object->id;
    }
}
?>
