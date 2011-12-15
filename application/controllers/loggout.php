<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class loggout extends CI_Controller
{
    public function index()
    {
        User_handler::loggout();
        redirect('/');
    }
}
?>
