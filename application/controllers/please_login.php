<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Please_login extends CI_Controller
{

    public function index(){
        $user = User_handler::getLoggedUser();
        $user_is_logged = $user->id;
        if($user_is_logged)
            redirect (base_url());
        
        $blocks['topLeftSide'] = $this->load->view('blocks/please_login', '', true);
        $this->load->view('page', $blocks);
    }

}

?>
