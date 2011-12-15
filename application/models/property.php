<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Property extends DataMapper
{

    var $has_one = array('property_type');
    var $has_many = array('property_close_place', 'property_feature',"file",'user');
    
    
}
?>
