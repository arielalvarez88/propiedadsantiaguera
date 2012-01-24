<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IProperty_info_getter
 *
 * @author ariel
 */
interface IProperty_info_getter {
    public function get_id();
    public function get_type();
    public function get_title();
    public function get_province();
    public function get_neighborhood();
    public function get_condition();
    public function get_address();
    public function get_terrain();
    public function get_construction();
    public function get_stories();
    public function get_bedrooms();
    public function get_bathrooms();
    public function get_livingrooms();
    public function get_kitchens();
    public function get_parkings();
    public function get_sell_price_us();
    public function get_sell_price_dr();
    public function get_rent_price_us();
    public function get_rent_price_dr();
    public function get_description();
    public function get_features_for_reppopulate_form();
    public function get_features_object_array();
    public function get_close_places_for_reppopulate_form();
    public function get_close_places_object_array();
    public function get_photos();
    public function get_coordenates();
    
     
     
     }

?>
