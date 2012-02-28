<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class Neighborhood extends DataMapper
{

    
    var $has_many = array('province', 'property');
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    public function get_all()
    {
        return $this->get();
    }
    
}
?>
