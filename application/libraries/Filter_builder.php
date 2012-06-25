<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/Greater_or_equal_than_filter.php';
require_once dirname(__FILE__) . '/Less_or_equal_than_filter.php';
require_once dirname(__FILE__) . '/Equal_to_filter.php';
require_once dirname(__FILE__) . '/Where_in_filter.php';
require_once dirname(__FILE__) . '/Null_filter.php';


class Filter_builder {

    public static function build_property_min_price_filter($post, $property_object, $breadcrumb) {



        $condition_paramater_is_set = isset($post['condition']);

        $field_name = "";
        $value = isset($post['minprice']) ? $post['minprice'] : null;
        
     
        if(!$value)
            return;

        if (!$condition_paramater_is_set) {
            $field_name = 'sell_price_dr';
        }
        else
            $field_name = $post['condition'] == 'rent' ? 'rent_price_dr' : 'sell_price_dr';

        
       
        $filter = new Greater_or_equal_than_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    
    public static function build_property_posted_filter($property_object)
    {
        $field_name = "display_property";
        $value = 1;
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function order_by($filtered_get,$property_object,$breadcrumb='')
    {
        $value = isset($filtered_get['orderBy'])? $filtered_get['orderBy'] : '';
        $condition = isset($filtered_get["condition"]) ? $filtered_get["condition"] : Environment_vars::$maps["property_conditions"]["sell"];
        switch($value)
        {
            case "price_asc":
                if($condition == Environment_vars::$maps["property_conditions"]["rent"])
                {
                    
                    $property_object->order_by("rent_price_dr ASC");
                    $property_object->order_by("sell_price_dr ASC");
                    
                }
                else
                {
                    $property_object->order_by("sell_price_dr ASC");
                    $property_object->order_by("rent_price_dr ASC");
                    
                }
                
            
                    
            break;
        
        case "price_desc":
               if($condition == Environment_vars::$maps["property_conditions"]["rent"])
                {
                    $property_object->order_by("rent_price_dr DESC");
                    $property_object->order_by("sell_price_dr DESC");
                    
                }
                else
                {
                    $property_object->order_by("sell_price_dr DESC");
                    $property_object->order_by("rent_price_dr DESC");
                    
                }
            break;
        
        case "province_asc":
                $property_object->include_related("province", array("name"))->order_by("provinces.name ASC");
         break;
     case "province_desc":
                $property_object->include_related("province", array("name"))->order_by("provinces.name DESC");
         break;
        }
        
        
        
        
    }
    
    public static function build_property_max_price_filter($post, $property_object,$breadcrumb='') {

        $price_limit = isset($post['nopricelimit']) ? false : true;

        if (!$price_limit)
            return;

        $value = isset($post['maxprice'])? $post['maxprice'] : null;
          if(!$value)
            return; 
        
        $condition_paramater_is_set = isset($post['condition']);
        $field_name = '';

        if (!$condition_paramater_is_set) {
            $field_name = "sell_price_dr";
        } else {
            $field_name = $post['condition'] == 'rent' ? 'rent_price_dr' : 'sell_price_dr';
        }


      
        $filter = new Less_or_equal_than_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_type_filter($post, $property_object,$breadcrumb='') {

        $type_filter_activated = isset($post['type']);
        if (!$type_filter_activated)
            return;

        $field_name = 'type';
        $value = isset($post['type']) ? $post['type'] : null;
        if(!$value)
            return;
        
        if($breadcrumb)
            $breadcrumb->add_to_section(Environment_vars::$maps['ids_to_text']['property_types'][$value],'?type='.$value,"Buscar");
        $filter = new Equal_to_filter($field_name, $value);
        
        
        $filter->add_filter($property_object);
    }

    public static function build_property_condition_filter($post, $property_object, $breadcrumb) {

        $condition_filter_activated = isset($post['condition']);
        if (!$condition_filter_activated)
            return;


        $field_name = 'condition';
        $value = isset($post['condition']) ? $post['condition'] : null;
        if(!$value)
            return;
        
        if($value == Environment_vars::$maps['property_conditions']['sell'])
        {
            $filter = new Where_in_filter($field_name, array(Environment_vars::$maps['property_conditions']['sell/rent'], Environment_vars::$maps['property_conditions']['sell']));
            $filter->add_filter($property_object);              
            
        }
        
        elseif($value == Environment_vars::$maps['property_conditions']['rent'])
        {
            $filter = new Where_in_filter($field_name, array(Environment_vars::$maps['property_conditions']['sell/rent'], Environment_vars::$maps['property_conditions']['rent']));
            $filter->add_filter($property_object);              
        }
        
        else
       {
            $filter = new Where_in_filter($field_name, array(Environment_vars::$maps['property_conditions']['sell/rent'], Environment_vars::$maps['property_conditions']['sell']));
            $filter->add_filter($property_object);              
            
       }
        
   
    }

    public static function build_property_neighborhood_filter($post, $property_object,$breadcrumb='') {

        $neighborhood_filter_activated = isset($post['neighborhood']);
        if (!$neighborhood_filter_activated)
            return;

        $property_object->include_related("neighborhood", array("id"));
        $field_name = "neighborhoods.id";
        $value = $post['neighborhood'];
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_reference_filter($post, $property_object,$breadcrumb='') {

        $reference_filter_activated = isset($post['ref-number']);
        if (!$reference_filter_activated)
            return;

        $field_name = 'id';
        $value = isset($post['ref-number'])? $post['ref-number'] : null;
        if(!$value)
            return;
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    
    public static function build_property_province_filter($post, $property_object,$breadcrumb='') {

        $province_filter_activated = isset($post['province']);
        if (!$province_filter_activated)
            return;
        
        
        
        $property_object->include_related("province", array("id"));
        $field_name = "provinces.id";
        $value = $post['province'];
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    public static function applyFilters($filtered_get, $properties_filters_container, $breadcrumb=''){
            
            Filter_builder::build_property_type_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_province_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_neighborhood_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_posted_filter($properties_filters_container, $breadcrumb);
            Filter_builder::build_property_max_price_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_min_price_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_condition_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_bedrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_bathrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_parkings_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_kitchens_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_livingrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_stories_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_terrain_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_construction_filter($filtered_get, $properties_filters_container, $breadcrumb);            
            Filter_builder::order_by($filtered_get, $properties_filters_container);
            return $properties_filters_container;
        
    }
    
    
    public static function build_property_bathrooms_filter($post, $property_object,$breadcrumb='') {

        $bathrooms_filter_activated = isset($post['bathrooms']);
        if (!$bathrooms_filter_activated)
            return;

        $field_name = 'bathrooms';
        $value = $post['bathrooms'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    
    public static function build_property_bedrooms_filter($post, $property_object,$breadcrumb='') {

        $bedrooms_filter_activated = isset($post['bedrooms']);
        if (!$bedrooms_filter_activated)
            return;

        $field_name = 'bedrooms';
        $value = $post['bedrooms'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
     public static function build_property_parkings_filter($post, $property_object,$breadcrumb='') {

        $parkings_filter_activated = isset($post['parkings']);
        if (!$parkings_filter_activated )
            return;

        $field_name = 'parkings';
        $value = $post['parkings'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    
      public static function build_property_kitchens_filter($post, $property_object,$breadcrumb='') {

        $kitchens_filter_activated = isset($post['kitchens']);
        if (!$kitchens_filter_activated)
            return;

        $field_name = 'kitchens';
        $value = $post['kitchens'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    public static function build_property_livingrooms_filter($post, $property_object,$breadcrumb='') {

        $livingrooms_filter_activated = isset($post['livingrooms']);
        if (!$livingrooms_filter_activated)
            return;

        $field_name = 'livingrooms';
        $value = $post['livingrooms'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    public static function build_property_stories_filter($post, $property_object,$breadcrumb='') {

        $stories_filter_activated = isset($post['stories']);
        if (!$stories_filter_activated)
            return;

        $field_name = 'stories';
        $value = $post['stories'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    
    public static function build_property_terrain_filter($post, $property_object,$breadcrumb='') {

        $terrain_filter_activated = isset($post['terrain']);
        if (!$terrain_filter_activated )
            return;

        $field_name = 'terrain';
        $value = $post['terrain'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    
    public static function build_property_construction_filter($post, $property_object,$breadcrumb='') {

        $construction_filter_activated = isset($post['construction']);
        if (!$construction_filter_activated )
            return;

        $field_name = 'construction';
        $value = $post['construction'];
        
        if(!$value)
            return;
        
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }
    

}

?>
