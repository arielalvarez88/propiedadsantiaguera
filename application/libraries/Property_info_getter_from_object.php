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

require_once realpath("./application/libraries/IProperty_info_getter.php");

class Property_info_getter_from_object implements IProperty_info_getter {

    public $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function get_id() {
        return $this->property->id;
        
    }
    
    public function get_address() {
        return $this->property->address;
        
    }

    public function get_bathrooms() {
        return $this->property->bathrooms;
    }

    public function get_bedrooms() {
        return $this->property->bedrooms;
    }

     public function get_features_for_reppopulate_form() {


        $property_features = $this->property->property_features->get_iterated();
        
        $form_variables =array();
        $all_features_id_to_name = Environment_vars::$maps['ids_to_text']["property_feature"];
        foreach ($property_features as $property_feature)
        {
            $reppopulate_variable_name = str_replace("-" , "_" , $all_features_id_to_name[$property_feature->id]);
            
            $form_variables[$reppopulate_variable_name] = "checked";
        }
        
        return $form_variables;

        
    }

    
    public function get_close_places_object_array(){
        
        return $this->property->property_close_place->get()->all;
    }
    

    public function get_condition() {
        return $this->property->condition;
    }

    public function get_construction() {
        return $this->property->construction;
    }

    public function get_description() {
        return $this->property->description;
    }
    

    public function get_kitchens() {
                return $this->property->kitchens;
    }

    public function get_linvingrooms() {
        return $this->property->livingrooms;
    }

    public function get_parkings() {
        return $this->property->parkings;
    }

    public function get_photos() {
        
        
        
        return $this->property->file->where("type", Environment_vars::$maps['file_type_to_id']['photo'])->get()->all;
        
        
        
    }

    public function get_province() {
        return $this->property->province;
    }

    public function get_rent_price_dr() {
        return $this->property->rent_price_dr;
    }

    public function get_rent_price_us() {
        return $this->property->rent_price_us;
    }

    public function get_sector() {
        return $this->property->sector;
    }

    public function get_sell_price_dr() {
        return $this->property->sell_price_dr;
    }

    public function get_sell_price_us() {
        return $this->property->sell_price_us;
    }

    public function get_stories() {
                return $this->property->stories;
    }

    public function get_terrain() {
                return $this->property->terrain;
    }

    public function get_title() {
                return $this->property->title;
    }

    public function get_type() {
                return $this->property->type;
    }

    public function get_close_places_for_reppopulate_form() {
        
        $property_close_places = $this->property->property_close_place->get();
        
        $form_variables =array();
        $all_features_id_to_name = Environment_vars::$maps['ids_to_text']["property_feature"];
        foreach ($property_close_places as $property_close_place)
        {
            $reppopulate_variable_name = str_replace("-" , "_" , $all_features_id_to_name[$property_close_place->id]);
            $form_variables[$reppopulate_variable_name] = "checked";
        }
        
        return $form_variables;

    }

    public function get_features_object_array() {
        return $this->property->property_features->get()->all;
    }

    public function get_neighborhood() {
        return $this->property->neighborhood;
    }

    public function get_coordenates() {
        return $this->property->coordenates;
    }

     public function get_livingrooms() {
        return $this->property->livingrooms;
    }

}

?>
