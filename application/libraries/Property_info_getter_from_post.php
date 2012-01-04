<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Property_info_getter_from_post
 *
 * @author ariel
 */

require_once realpath("./application/libraries/IProperterty_info_getter.php");

class Property_info_getter_from_post implements IProperty_info_getter{
    
    public $post;
    public function __construct($post)
    {
        $this->post = $post;
    }
    
public function get_address() {
        $post['property_address'] = '';
    }
public function get_bathrooms() {
        
    }
public function get_bedrooms() {
        
    }
public function get_close_places() {
        
    }
public function get_condition() {
        
    }
public function get_construction() {
        
    }
public function get_description() {
        
    }
public function get_features() {
        
    }
public function get_kitchens() {
        
    }
public function get_linvingrooms() {
        
    }
public function get_parkings() {
        
    }
public function get_photos() {
        
    }
public function get_province() {
        
    }
public function get_rent_price_dr() {
        
    }
public function get_rent_price_us() {
        
    }
public function get_sector() {
        
    }
public function get_sell_price_dr() {
        
    }
public function get_sell_price_us() {
        
    }
public function get_stories() {
        
    }
public function get_terrain() {
        
    }
public function get_title() {
        
    }
public function get_type() {
        
    }
}

?>
