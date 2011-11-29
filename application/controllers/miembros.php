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
    
    public function ver($id=null)
    {
        
        if(!$id || !is_numeric($id))
            redirect ("/pagina_no_valida");
        
        $user_to_view = new User();
        $user_to_view->where("id", $id)->get();
        
         if(!$user_to_view->id)
            redirect ("/pagina_no_valida");
        
        
         $user_info['user_to_view'] = $user_to_view;
         
        $data['topLeftSide'] = $this->load->view('blocks/user_info',$user_info,true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $properties_pager_data['section'] = 'agents';
        $properties_pager_data['properties'] = $user_to_view->property->where("display_property",1)->get()->all;
        
        $data['bottomLeftSide'] = $this->load->view('blocks/properties_pager',$properties_pager_data,true);
        $this->load->view('page',$data);
    }
}
?>
