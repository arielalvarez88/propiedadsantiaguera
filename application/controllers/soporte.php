<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Soporte extends CI_Controller {
    public function index()
    {     
        
        $data['centerSection'] = $this->load->view('blocks/soporte_view','', true);
        $this->load->view('page',$data);
        
    }
       
}
?>
