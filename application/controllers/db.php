<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Db extends CI_Controller
{
    function index()
    {
      $this->load->library('user_handler');
      
      $user = User_handler::loginAndSaveInCookies('arielalvarez88@hotmail.com', 'infest88');
      User_handler::saveInSession($user);
      
      

    }
}
?>
