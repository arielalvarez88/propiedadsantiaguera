<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Property extends DataMapper {

    var $has_one = array('property_type', 'user', 'province', 'neighborhood');
    var $has_many = array('property_close_place', 'property_feature', "file");
    private $condition_name;

    public function get_condition_name() {

        
        $this->initialize_condition_name();

        return $this->condition_name;
    }
    
    
    public function initialize_condition_name()
    {
        if (empty($this->condition_name)) {
            switch ($this->condition) {
                case 1:
                    $this->condition_name = "Venta";
                    break;

                case 2:
                    $this->condition_name = "Alquiler";
                    break;
                case 3:
                    $this->condition_name = "Venta/Alquiler";
                    break;
            }
        }
    }
    public function get_prices(){
        $this->initialize_condition_name();
        
        
        $prices = array();
        
        $prices["dr"] = array("Sell" => $this->sell_price_dr, "Rent" => $this->rent_price_dr, "Maintenance" => $this->maintenance);
        $prices["us"] = array("Sell" => $this->sell_price_us, "Rent" => $this->rent_price_us, "Maintenance" => $this->maintenance);
        return $prices;
    }

}

?>
