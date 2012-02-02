<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of overlay_calculator
 *
 * @author ariel
 */
class Overlay_calculator extends CI_Controller{
    //put your code here
    
    public function get_view($dr_price = '', $us_price = '')
    {
        $overlay_view_data['dr_price'] = $dr_price;
        $overlay_view_data['us_price'] = $us_price;
        
        $this->load->view("blocks/overlay_property_calculator",$overlay_view_data);
    }
}

?>
