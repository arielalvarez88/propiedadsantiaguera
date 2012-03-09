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
        
        $province = new Province(31);
        var_dump($province->neighborhood->get()->all);
        echo "ola";
        $province = new Province(33);
                var_dump($province->neighborhood->get()->all);
       
        
    }
}

?>
