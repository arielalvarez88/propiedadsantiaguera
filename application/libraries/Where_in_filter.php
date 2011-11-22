<?php

require_once dirname(__FILE__).'/IFilter.php';

Class Where_in_filter implements IFilter{
    
    public $field_name;
    public $values_array;
    
    public function __construct($field_name, $values_array) {
        $this->field_name = $field_name;
        $this->values_array = $values_array;
    }
    
    public function add_filter($property_object) {
        $property_object->where_in($this->field_name, $this->values_array);
    }
   
}
?>