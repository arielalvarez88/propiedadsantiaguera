<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/User_factory.php");
class Centro_de_herramientas extends CI_Controller {
    public function index()
    {     
        $random_video = new Cms_video();
        $random_video->order_by('RAND()')->limit(1)->get();
        
        $tools_center_video_variables['cms_video']  = $random_video;
        $blocks['topLeftSide'] = $this->load->view('blocks/tools_center_video',$tools_center_video_variables,true); 
        
        $cms_documents = new Cms_document();
        $cms_documents->get_iterated();
        $cms_documents_pager_view_variables['cms_documents'] = $cms_documents;
        
        
        
        $tools_center_tabs_view_variables['cms_documents_pager_view'] = $this->load->view("blocks/cms_documents_pager",$cms_documents_pager_view_variables, true);
        $blocks['topLeftSide'] .= $this->load->view("blocks/tools_center_tabs",$tools_center_tabs_view_variables, true);
        
        $blocks['topRightSide'] = $this->load->view('blocks/interests_calculator','',true); 
        
        
        $tutorial_video_server = $this->get_tutorial_video_pager_variables();
        $blocks['topRightSide'] .= $this->load->view('blocks/tutorial_video_pager',$tutorial_video_server,true); 
        $this->load->view('page',$blocks);
        
    }
       
    
    public function get_tutorial_video_pager_variables(){
        
        $videos = new Cms_video();
        $videos_array = $videos->limit(4)->get()->all;
        $variables['cms_videos']  = $videos_array;
        return $variables;
        
    }
}



?>
