<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class Please_login extends CI_Controller
{

    public function index(){
        $user = User_handler::getLoggedUser();
        $user_is_logged = isset($user->id) && $user->id;
        if($user_is_logged)
            redirect (base_url());
        
        $blocks['topLeftSide'] = $this->load->view('blocks/please_login', '', true);
        $this->load->view('page', $blocks);
    }

}

?>
