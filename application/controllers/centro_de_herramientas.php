<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class Centro_de_herramientas extends CI_Controller {
    public function index()
    {     
        $blocks['topLeftSide'] = $this->load->view('blocks/interests_calculator','',true); 
        
        $this->load->view('page',$blocks);
        
    }
       
}

?>
