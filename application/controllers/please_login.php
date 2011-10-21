<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Please_login extends CI_Controller
{

    public function index(){
        $blocks['topLeftSide'] = $this->load->view('blocks/please_login', '', true);
        $this->load->view('page', $blocks);
    }

}

?>
