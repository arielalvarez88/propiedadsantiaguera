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
        
        $all_close_places = Environment_vars::$maps['ids_to_text']["property_close_places"];
        $property_close_places = array();
         foreach ($all_close_places as $id => $name) {
            if (isset($this->post[$name])) {
                $reppopulate_variable_name = str_replace("-", "_", $name);
                $property_close_places[$reppopulate_variable_name]= "checked";
            }
        }
        return $property_close_places;
        
    }
    
    
    public function get_close_places_object_array(){
        
        $all_close_places = Environment_vars::$maps['ids_to_text']["property_close_places"];
       
        $new_property_close_places = new Property_close_place();
        
        
        $close_places_on = 0;
         foreach ($all_close_places as $id => $input_name) {
             
                
             
            if (isset($this->post[$input_name])) {
                
                
                $new_property_close_places->or_where("id", $id);
                $close_places_on ++;
            }
        }
        
        if($close_places_on > 0)
            return $new_property_close_places->get()->all;
        
        return array();
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
    
    public function get_maintenance() {
        
        return $this->post["property-maintenance"];
    }
    
     public function get_floor() {
        
        return $this->post["property-floor"];
    }

    public function get_features_for_reppopulate_form() {


        $property_features = array();
        
        $all_features = Environment_vars::$maps['ids_to_text']["property_feature"];
        foreach ($all_features as $id => $name)
        {
            if(isset($this->post[$name]))
            {
                $reppopulate_variable_name = str_replace("-", "_", $name);
                $property_features[$reppopulate_variable_name] = "checked";
            }
        }
        
        return $property_features;

        
    }
    
    public function get_features_object_array() {

        $features = new Property_feature();
        
        $features_on = 0;
        foreach (Environment_vars::$maps['ids_to_text']["property_feature"] as $id => $name)
        {
        
        
            if(isset($this->post[$name]))
            {
                $features->or_where("id", $id);
                $features_on++;
            }
        }
        
    
        
        if($features_on > 0)
            return $features->get()->all;
        
        else
            return array();
    }

    public function get_kitchens() {
        return $this->post['property-kitchens'];
    }

    

    public function get_parkings() {
        return $this->post["property-parkings"];
    }

    public function get_photos() {
        
        $photos_inputs_names = array();
        
        for ($i = 1; $i <= PHOTOS_PER_PROPERTY; $i++) {                        
            $photos_inputs_names[] = "property-photo-" . $i;
        }
        $photos_inputs_names[] = "property-main-photo";
        
        return $photos_inputs_names;
    
    }

    public function get_province() {
        return $this->post["property-province"];
    }

    public function get_rent_price_dr() {
         
        return $this->post["property-rent-price-dr"];
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
          
          if(isset($this->post['property-id']))
            return $this->post['property-id'];
          
          return false;
        
    }

}

?>
