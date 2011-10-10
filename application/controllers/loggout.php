<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class loggout extends CI_Controller
{
    public function index()
    {
        User_handler::loggout();
        redirect('/');
    }
}
?>
