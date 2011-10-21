<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prueba
 *
 * @author ariel
 */
class Prueba extends CI_Controller{
    //put your code here
    public function index(){
        
        $user= User_handler::getLoggedUser();
       
        
    }
}

?>
