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

    public static function build_property_min_price_filter($post, $property_object) {



        $condition_paramater_is_set = isset($post['condition']);

        $field_name = "";
        $value = $post['minprice'];

        if (!$condition_paramater_is_set) {
            $field_name = 'sell_price_dr';
        }
        else
            $field_name = $post['condition'] == 'rent' ? 'rent_price_dr' : 'sell_price_dr';

        $filter = new Greater_or_equal_than_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_max_price_filter($post, $property_object) {

        $price_limit = isset($post['nopricelimit']) ? false : true;

        if (!$price_limit)
            return;

        $value = $post['maxprice'];
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

    public static function build_property_type_filter($post, $property_object) {

        $type_filter_activated = isset($post['type']);
        if (!$type_filter_activated)
            return;

        $field_name = 'type';
        $value = $post['type'];
        $filter = new Equal_to_filter($field_name, $value);
        
        
        $filter->add_filter($property_object);
    }

    public static function build_property_condition_filter($post, $property_object) {

        $condition_filter_activated = isset($post['condition']);
        if (!$condition_filter_activated)
            return;


        $field_name = 'condition';
        $value = $post['condition'];
        
        
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
            $property_object->or_where($field_name,Environment_vars::$maps['property_conditions']['rent']);
       }
        
   
    }

    public static function build_property_neighborhood_filter($post, $property_object) {

        $neighborhood_filter_activated = isset($post['neighborhood']);
        if (!$neighborhood_filter_activated)
            return;


        $field_name = 'neighborhood';


        $value = $post['neighborhood'];
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

    public static function build_property_reference_filter($post, $property_object) {

        $reference_filter_activated = isset($post['ref-number']);
        if (!$reference_filter_activated)
            return;

        $field_name = 'id';
        $value = $post['ref-number'];
        $filter = new Equal_to_filter($field_name, $value);
        $filter->add_filter($property_object);
    }

}

?>
