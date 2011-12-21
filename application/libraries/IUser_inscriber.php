<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

interface IUser_inscriber
{
    public function validate_info($user_info_getter,$inscriber_user_type);
    public function validate_photos();
    public function save_name($user_object,$user_info_getter);
    public function save_photo($user_object,$user_info_getter);
    public function save_type($user_object,$user_info_getter);
    public function save_rnc($user_object,$user_info_getter);
    public function save_email($user_object,$user_info_getter);
    public function save_website($user_object,$user_info_getter);
    public function save_company($new_user_object,$inscriber_user_object);
    public function save_password($user_object,$user_info_getter);
    public function save_lastname($user_object,$user_info_getter);
    public function save_tel($user_object,$user_info_getter);
    public function save_cels($user_object,$user_info_getter);
    public function save_fax($user_object,$user_info_getter);
    public function save_address($user_object,$user_info_getter);
    public function save_description($user_object,$user_info_getter);
    public function save_inscription_date($user_object,$user_info_getter);
    
}
?>
