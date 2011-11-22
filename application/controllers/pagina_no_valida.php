<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pagina_no_valida extends CI_Controller
{

    public function index(){
        
        
        $blocks['topLeftSide'] = $this->load->view('blocks/pagina_no_valida_view', '', true);
        $this->load->view('page', $blocks);
    }

}

?>
