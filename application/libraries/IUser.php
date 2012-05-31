<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IUser
 *
 * @author ariel
 */
interface  IUser {
    public function delete();
    public function inscribe_property($property);    
    public function get_properties();
    public function get_published_properties();
    public function get_number_of_properties();
    public function    get_number_of_posted_properties();
    public function get_type_text();     
    public function get_property($property_id);
    public function get_photo();
}

?>
