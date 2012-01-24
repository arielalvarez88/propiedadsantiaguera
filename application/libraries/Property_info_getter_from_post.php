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

class Property_info_getter_from_post implements IProperty_info_getter {

    public $post;

    public function __construct($post) {
        $this->post = $post;
    }

    public function get_address() {
        return $this->post['property-address'];
        
    }

    public function get_bathrooms() {
        return $this->post['property-bathrooms'];
    }

    public function get_bedrooms() {
        return $this->post['property-bedrooms'];
    }

    public function get_close_places_for_reppopulate_form() {

        
         $all_close_places = Environment_vars::$maps['ids_to_text']["property_close_places_to_name"];
        $property_close_places = array();
         foreach ($all_close_places as $id => $name) {
            if (isset($this->post[$name])) {
                $property_close_places[$name] = "checked";
            }
        }
        return $property_close_places;
    }
    
    
    public function get_close_places_object_array(){
        
        $all_close_places = Environment_vars::$maps['ids_to_text']["property_close_places_to_name"];
        $new_property_close_places = new Property_close_place();
         foreach ($all_close_places as $key => $value) {
            if (isset($this->post[$key])) {
                $new_property_close_places->or_where("id", Environment_vars::$maps["property_close_places"][$key]);
            }
        }
        
        
        return $new_property_close_places->get()->all;
    }

    public function get_condition() {
        return $this->post['property-condition'];
    }

    public function get_construction() {
        return $this->post['property-construction'];
    }

    public function get_description() {
        return $this->post['property-description'];
    }

    public function get_features_for_reppopulate_form() {


        $property_features = array();
        
        $all_features = Environment_vars::$maps['ids_to_text']["property_feature_to_name"];
        foreach ($all_features as $id => $name)
        {
            if(isset($this->post[$name]))
            {
                $property_features[$name] = "checked";
            }
        }
        
        return $property_features;

        
    }
    
    public function get_features_object_array() {

        $features = new Property_feature();
        foreach (Environment_vars::$maps['ids_to_text']["property_feature_to_name"] as $id => $name)
        {
            if(isset($this->post[$name]))
            {
                $features->or_where("id", $id);
            }
        }
        
        return $features->get()->all;
    }

    public function get_kitchens() {
        return $this->post['property-kitchens'];
    }

    

    public function get_parkings() {
        return $this->post["property-parkings"];
    }

    public function get_photos() {
        
        $photos_inputs_names = array();
        
        for ($i = 1; $i <= 15; $i++) {                        
            $photos_inputs_names[] = "property-photo-" . $i;
        }
        $photos_inputs_names[] = "property-main-photo";
        
        return $photos_inputs_names;
    
    }

    public function get_province() {
        return $this->post["property-province"];
    }

    public function get_rent_price_dr() {
        return $this->post["property-sell-price-us"];
    }

    public function get_rent_price_us() {
        return $this->post["property-rent-price-us"];
    }

    public function get_neighborhood() {
        
        return $this->post["property-neighborhood"];
    }

    public function get_sell_price_dr() {
        return $this->post["property-sell-price-dr"];
    }

    public function get_sell_price_us() {
        return $this->post["property-sell-price-us"];
    }

    public function get_stories() {
        return $this->post["property-stories"];
    }

    public function get_terrain() {
        return $this->post["property-terrain"];
    }

    public function get_title() {
        return $this->post["property-title"];
    }

    public function get_type() {
        return $this->post["property-type"];
    }
    
     public function get_coordenates() {
        return $this->post["property-coordenates"];
    }

    public function get_livingrooms() {
        return $this->post['property-livingrooms'];
        
    }
    
      public function get_id() {
        
        
    }

}

?>
