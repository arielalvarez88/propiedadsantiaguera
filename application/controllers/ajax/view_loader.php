<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class View_loader extends CI_Controller{
        
    private function get_view($view_name)
    {
        $view_data = $this->input->post();
        $this->load->view($view_name, $view_data);
    }
    
    function _remap($view_or_folder_name, $other_view_name_components = array())
    {
        $view_name_pieces = array();
        $view_name_pieces []= $view_or_folder_name;
        $view_name_pieces = array_merge($view_name_pieces, $other_view_name_components);
        $view_name = implode('/',$view_name_pieces);
        
        $this->get_view($view_name);
            
    }
    
}
?>
