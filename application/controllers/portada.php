<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author ariel
 */
require_once realpath("./application/libraries/User_factory.php");
class Portada extends CI_Controller {
    public function index()
    {
        $this->output->cache(180);
        $data['header'] = $this->load->view('blocks/header','',true);        
        $data['topLeftSide'] = $this->load->view('blocks/frontPageSlideShow','',true);
        $data['topLeftSide'].= $this->load->view('blocks/basic_filter','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);        
        $data['topRightSide'] .= $this->load->view('blocks/tired_message','',true);
        $menuTiposDePropiedadData['sectionName'] = 'portada';
        
        
        $property = new Property(1001);
        
        $property_of_the_week_view_variables['property'] = $property;
        
        $data['bottomLeftSide'] = $this->load->view('blocks/properties_of_the_week',$property_of_the_week_view_variables,true);
        
        $propertieS_pager_view_variables = $this->get_random_porperties_for_properties_pager_View();
        
        
        $data['bottomRightSide'] = $this->load->view('blocks/properties_pager',$propertieS_pager_view_variables,true);
        $data['bottom'] = $this->load->view('blocks/front_page_banner','',true);
        $data['bottom'] .= $this->load->view('blocks/companies_finder','',true);
        
        
        $articles = new Article();
        
        $articles->where("display_in_front_page",1)->limit(3)->get()->all;        
        $articles_thumbs_pager['articles']  = $articles;
        
        $data['bottom'] .= $this->load->view('blocks/articles_thumbs_pager',$articles_thumbs_pager,true);
        $data['bottom'] .= $this->load->view('blocks/tools_center','',true);
        
        $this->load->view('page',$data);
    }
    
    private function get_random_porperties_for_properties_pager_View()
    {
        
        $properties = new Property();
        $properties =      $properties->where('display_property', 1)->order_by('RAND()')->get()->all;
        $variables['properties'] = $properties;
        $variables['section'] = 'front-';
        $variables['properties_per_row'] = 2;
         $variables['rows_per_page'] = 1;
        
        return $variables;
        
        
    }
    
    
    
   
}

?>
