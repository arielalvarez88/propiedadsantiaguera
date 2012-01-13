<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__).'/IUser_info_getter.php';

class User_info_getter_from_post implements IUser_info_getter
{
    
    private $post_array;
    public function __construct($post_array=null)
    {
        $this->post_array = $post_array ? $post_array : array();
    }
     public function get_name(){
 
         return $this->post_array['signup-client-type'] == Environment_vars::$maps['texts_to_id']['user_types']['Empresa'] || $this->post_array['signup-client-type'] == Environment_vars::$maps['texts_to_id']['user_types_requesters']['Empresa']?  $this->post_array['signup-company-name'] : $this->post_array['signup-name'];         
     }
     
    public function get_lastname(){

    }
    
    public function get_email(){
        
        return  $this->post_array['signup-email']; 
    }
    
    public function get_password()
    {
        return  $this->post_array['signup-password']; 
    }
    
    public function get_website(){
        return  $this->post_array['signup-website']; 
    }
    public function get_description(){
        return  $this->post_array['signup-description']; 
    }
    
    public function get_photo(){
        
    }
    
    public function get_tel(){
        return  $this->post_array['signup-tel']; 
    }
    
    public function get_cel(){
        return  $this->post_array['signup-cel'];
    }
    
    public function get_cel2(){
        return  $this->post_array['signup-cel2'];
    }
    
    public function get_fax(){
        return  $this->post_array['signup-fax']; ;
    }
    public function get_rnc(){
        return  $this->post_array['signup-rnc']; ;
    }
    public function get_address(){
        return  $this->post_array['signup-address'];
    }
    public function get_type(){
      
        return  $this->post_array['signup-client-type'];
        
    }

    public function get_id() {        
        return isset($this->post_array['edit-client-id']) ? $this->post_array['edit-client-id'] : false;
    }
}
?>
