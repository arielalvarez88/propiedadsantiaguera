<?php

class Panel extends CI_Controller {

    public function propiedades($subsection = 'publicadas', $messages = array()) {

        $messages = $messages ? $messages : $this->session->userdata("messages");

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $panel_view = array();

        
                $section_info['user'] = $user;
                $section_info['subsession'] = $user;
                $section_info['messages'] = $messages;
                $section_info['pager'] = empty($subsection) || $subsection == 'publicadas' ? $this->get_user_published_properties_pager() : $this->get_user_created_properties_pager();
                
                $panel_view['topLeftSide'] = $this->load->view('blocks/panels_properties_header', $section_info, true);
                $panel_view['topRightSide'] = $this->load->view('blocks/user_properties_counter', $section_info, true);                           
                $panel_view['bottomLeftSide'] = $this->load->view('blocks/panels_properties_tabs', $section_info, true);
                
               

                $this->load->view('page', $panel_view);
    }
    
    
    public function cuenta()
    {
         $user = $this->get_logged_user_or_redirect_to_please_login();
         $view_variables['user'] = $user;
         $image_helper = new Image_helper();
         $user_photo_thumb =  $image_helper->get_user_photo_thumb_version($user->photo);
         
         $view_variables['user_photo_thumb'] = $user_photo_thumb;
         
         $user_is_company_agent = $user instanceof Company_agent_user;
         
         $account_panel_view ['top'] = $this->load->view("blocks/posts_left_message",$view_variables,true);
         
         if($user_is_company_agent)
         {
             $view_variables['section'] = "company-agent-panel-account-";
             $account_panel_view ['topLeftSide'] = $this->load->view("blocks/user_presentation_card",$view_variables,true);
             $account_panel_view ['topRightSide'] = $this->load->view("blocks/offers",$view_variables,true);
         }
         else
         {
             
             $view_variables['section'] = "panel-account-";
             $account_panel_view ['topLeftSide'] = $this->load->view("blocks/panels_account",$view_variables,true);
             $account_panel_view ['topRightSide'] = $this->load->view("blocks/offers",$view_variables,true);
             $account_panel_view ['bottom'] = $this->load->view("blocks/user_presentation_card",$view_variables,true);
         }
             
         
         
         
         
         
         
         $this->load->view("page",$account_panel_view);
    }
    
    public function agentes()
    {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        
        $user_is_company = $user->type == Environment_vars::$maps['texts_to_id']['user_types']['Empresa'];
        
        if(!$user_is_company)
            redirect ("pagina_no_valida");
        
        $agents['agents'] = $user->get_agents();
        $user_property_counter_variables['user']  = $user;
        
        $blocks['topLeftSide'] = $this->load->view('blocks/panels_agents_header',$agents,true);
        $blocks['topRightSide'] = $this->load->view('blocks/user_properties_counter',$user_property_counter_variables,true);
        $blocks['bottomLeftSide'] = $this->load->view('blocks/agents_pager',$user_property_counter_variables,true);
                
        $this->load->view('page',$blocks);        
    }
    
    public function pass_posts_overlay()
    {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        
        $give_posts_overlay_data['posts_left'] = $user->posts_left;
        $give_posts_overlay_data['agents'] = $user->get_agents();
        $this->load->view('blocks/give_posts_to_agents_overlay',$give_posts_overlay_data);
    }
    
    
    
     public function get_user_published_properties_pager($print='') {

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $properties_pager_info['properties'] = $user->property->where('display_property', 1)->get_iterated();
        $properties_pager_info['section'] = "published";
        $return_in_string_instead_of_printing = $print ? false : true;

        return $this->load->view('blocks/panels_properties_pager', $properties_pager_info, $return_in_string_instead_of_printing);
    }

    public function get_user_created_properties_pager($print='') {

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $properties_pager_info['properties'] = $user->property->get_iterated();
        $properties_pager_info['section'] = "created";
        $return_in_string_instead_of_printing = $print ? false : true;
        return $this->load->view('blocks/panels_properties_pager', $properties_pager_info, $return_in_string_instead_of_printing);
    }

}
?>

        
