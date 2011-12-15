<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class Herramientas extends CI_Controller
{
    public function index()
    {
        $blocks['top'] = $this->load->view("blocks/tools",'',true);
        $this->load->view("page",$blocks);
    }
}


?>
