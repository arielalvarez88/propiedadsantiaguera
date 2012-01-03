<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Compra extends CI_Controller {
    public function index()
    {     
        
        $data['centerSection'] = $this->load->view('forms/compra_form','', true);
        $this->load->view('page',$data);
        
    }
       
}
?>
