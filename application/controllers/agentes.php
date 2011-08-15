<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Agentes extends CI_Controller
{
    public function index()
    {
        $data['topLeftSide'] =  $this->load->view('blocks/basicFilter','',true);
        $data['topRightSide'] =  $this->load->view('blocks/agentesHeader','',true);
        $data['bottomLeftSide'] =  $this->load->view('blocks/agentesPager','',true);
        $this->load->view('page',$data);
    }
    
    public function ver($id)
    {
        $data['topLeftSide'] = $this->load->view('blocks/userInfo','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $data['topRightSide'] .= $this->load->view('blocks/subscribe','',true);
        $data['bottomLeftSide'] = $this->load->view('blocks/userPropertiesHeader','',true);
        $data['bottomLeftSide'] .= $this->load->view('blocks/userPropertiesPager','',true);
        
        $this->load->view('page',$data);
    }
}
?>
