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
                $panel_view['topLeftSide'] = $this->load->view('blocks/panels_property_section', $section_info, true);


        $this->load->view('page', $panel_view);
    }
    
    
    public function cuenta()
    {
         $user = $this->get_logged_user_or_redirect_to_please_login();
         $view_variables['user'] = $user;
         $account_panel_view ['topLeftSide']= $this->load->view("blocks/panels_account",$view_variables,true);
         $this->load->view("page",$account_panel_view);
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

        
