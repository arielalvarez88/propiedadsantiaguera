<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Politicas extends CI_Controller {
    public function index($ajax=false)
    {     
        
       
            $data['centerSection'] = $this->load->view('blocks/politicas_view','', true);
        $this->load->view('page',$data);
        
        
        
    }
    
    public function ajax()
    {
           $section['section'] = "ajax-";
             $this->load->view('blocks/politicas_view',$section);
    }
       
}
?>
