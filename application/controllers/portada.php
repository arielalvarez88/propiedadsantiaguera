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
class Portada extends CI_Controller {
    public function index()
    {
     
        
        $data['header'] = $this->load->view('blocks/header','',true);        
        $data['topLeftSide'] = $this->load->view('blocks/frontPageSlideShow','',true);
        $data['topLeftSide'].= $this->load->view('blocks/basic_filter','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);        
        $data['topRightSide'] .= $this->load->view('blocks/tired_message','',true);
        $menuTiposDePropiedadData['sectionName'] = 'portada';
        $data['bottomLeftSide'] = $this->load->view('blocks/properties_of_the_week','',true);
        $data['bottomRightSide'] = $this->load->view('blocks/propiedadesMasVisitadas','',true);
        $data['bottom'] = $this->load->view('blocks/front_page_banner','',true);
        $data['bottom'] .= $this->load->view('blocks/popular_neighborhoods','',true);
        $data['bottom'] .= $this->load->view('blocks/buy_blueprints_link','',true);
        $data['bottom'] .= $this->load->view('blocks/tools_center','',true);
        


        $this->load->view('page',$data);
    }
    
   
}

?>
