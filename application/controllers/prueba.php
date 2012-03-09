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
        
        $provinces = new Province(31);
        $neighborhoods = $provinces->neighborhood->get();
        foreach($neighborhoods as $neighborhood)
        {
            echo $neighborhood->id;
            echo '<br/>';
        }
        $province = new Province(33);
                $neighborhoods = $provinces->neighborhood->get();
        foreach($neighborhoods as $neighborhood)
        {
            echo $neighborhood->id;
            echo '<br/>';
        }
    }
}

?>
