<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Base_user_editor implements IUser_inscriber
{
    
public function save_address($user_object, $user_info_getter) {
        
    }
public function save_cel($user_object, $user_info_getter) {
        
    }
public function save_company($user_object, $user_info_getter) {
        
    }
public function save_description($user_object, $user_info_getter) {
        
    }
public function save_email($user_object, $user_info_getter) {
        
    }
public function save_fax($user_object, $user_info_getter) {
        
    }
public function save_lastname($user_object, $user_info_getter) {
        
    }
public function save_name($user_object, $user_info_getter) {
        
    }
public function save_password($user_object, $user_info_getter) {
        
    }
public function save_photo($user_object, $user_info_getter) {
        
    }
public function save_rnc($user_object, $user_info_getter) {
        
    }
public function save_tel($user_object, $user_info_getter) {
        
    }
public function save_website($user_object, $user_info_getter) {
        
    }
public function validate_info() {
    
    $email_already_exists = User::email_exists($this->input->post('signup-email'));
        
    }
public function validate_photos() {
        
    }
}
?>
