<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

interface IProperty_inscriber
{
     public function save_id($property_object, $property_info_getter);
    public function save_type($property_object, $property_info_getter);
    public function save_title($property_object, $property_info_getter);
    public function save_province($property_object, $property_info_getter);
    public function save_neighborhood($property_object, $property_info_getter);
    public function save_condition($property_object, $property_info_getter);
    public function save_address($property_object, $property_info_getter);
    public function save_terrain($property_object, $property_info_getter);
    public function save_construction($property_object, $property_info_getter);
    public function save_stories($property_object, $property_info_getter);
    public function save_bedrooms($property_object, $property_info_getter);
    public function save_bathrooms($property_object, $property_info_getter);
    public function save_livingrooms($property_object, $property_info_getter);
    public function save_kitchens($property_object, $property_info_getter);
    public function save_parkings($property_object, $property_info_getter);
    public function save_sell_price_us($property_object, $property_info_getter);
    public function save_sell_price_dr($property_object, $property_info_getter);
    public function save_rent_price_us($property_object, $property_info_getter);
    public function save_rent_price_dr($property_object, $property_info_getter);
    public function save_description($property_object, $property_info_getter);
    
    public function save_photos($property_object,$properties_photos_filenames);
    public function save_coordenates($property_object, $property_info_getter);
}
?>
