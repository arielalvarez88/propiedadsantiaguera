<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Miembros extends CI_Controller
{
    public function index()
    {
        
        $data['topRightSide'] =  $this->load->view('blocks/members_header','',true);
        $data['bottomLeftSide'] =  $this->load->view('blocks/members_pager','',true);
        $this->load->view('page',$data);
    }
    
    public function ver($id)
    {
        $data['topLeftSide'] = $this->load->view('blocks/user_info','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $properties_pager_data['section'] = 'agents';
        $data['bottomLeftSide'] = $this->load->view('blocks/properties_pager',$properties_pager_data,true);
        $this->load->view('page',$data);
    }
}
?>
