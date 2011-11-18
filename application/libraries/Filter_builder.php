<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/Greater_or_equal_than_filter.php';
require_once dirname(__FILE__) . '/Less_or_equal_than_filter.php';
require_once dirname(__FILE__) . '/Equal_to_filter.php';

class Filter_builder {

    public static function build_property_min_price_filter($post, $property_object) {
        
        $value = $post['minprice'];
        
        $condition = $post['condition'];
        $field_name= "";
        if($condition == "sell")
        {
            $field_name =   "sell_price_dr";
        }
         else {
                $field_name =   "rent_price_dr";
        }
        
        
        
        $filter = new Less_or_equal_than_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_max_price_filter($post, $property_object) {

        $value = $post['maxprice'];
        $condition = $post['condition'];
        $field_name = "";
        
        if($condition == "sell")
        {
            $field_name =   "sell_price_dr";
        }
        else {
                $field_name =   "rent_price_dr";
        }
        
        
        
        $filter = new Greater_or_equal_than_filter($field_name, $value);
        $filter->add_filter($property_object);

    }

    public static function build_property_type_filter($post, $property_object) {
        $field_name = 'type';
        $value = $post['type'];
        $filter = new Equal_to_filter($field_name, $value);
        
        
        $filter->add_filter($property_object);
    }

    public static  function build_property_condition_filter($post, $property_object) {

        $field_name = 'condition';
        $value = $post['condition'];
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_sector_filter($post, $property_object) {
        
        
        $field_name = 'sector';
  
      
        $value = $post['sector'];
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_reference_filter($post, $property_object) {
        $field_name = 'id';
        $value = $post['ref-number'];
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

}

?>
