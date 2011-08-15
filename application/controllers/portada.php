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
        $data['topLeftSide'] = $this->load->view('blocks/basicFilter','',true);
        $data['topCenterSide'] = $this->load->view('blocks/frontPageSlideShow','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $data['topRightSide'] .= $this->load->view('blocks/subscribe','',true);
        $menuTiposDePropiedadData['sectionName'] = 'portada';
        $data['centerSection'] = $this->load->view('blocks/menuTiposDePropiedad',$menuTiposDePropiedadData,true);
        $data['bottomLeftSide'] = $this->load->view('blocks/propiedadesMasVisitadas','',true);
        $data['bottomRightSide'] = $this->load->view('blocks/propiedadesDeLaSemana','',true);
        
        
        
        
        $this->load->view('page',$data);
    }
    
   
}

?>
