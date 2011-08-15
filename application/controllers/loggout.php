<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class loggout extends CI_Controller
{
    public function index($lastPage = false)
    {
        User_handler::loggout();
        if($lastPage)
            $lastPage = str_replace ('-', '/', $lastPage);
        else
            $lastPage = '/';
        
        redirect($lastePage);
    }
}
?>
