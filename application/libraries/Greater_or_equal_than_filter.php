<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require dirname(__FILE__).'/IFilter.php';

Class Greater_or_equal_than_filter implements IFilter{
    
    public $field_name;
    public $value;
    
    public function __construct($field_name, $value) {
        $this->field_name = $field_name;
        $this->value = $value;
    }
    
    public function add_filter($property_object) {
        $property_object->where($this->field_name." >= ", $this->value);
    }
   
}
?>