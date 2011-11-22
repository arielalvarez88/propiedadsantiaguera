<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Form_getter extends CI_Controller
{
    
    function index()
    {
        echo 'tamo en form_getter';
    }
    
    function passwordRecovery()
    {
        $this->load->view('forms/password_reset_form');
    }
    
    function signup_informacion_general($clientType)
    {   
        $viewData['clientType'] = $clientType;
        echo $this->load->view('forms/signup_informacion_general',$viewData,true);
    }
}
?>
