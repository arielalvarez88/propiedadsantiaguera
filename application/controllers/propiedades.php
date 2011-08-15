<?php
class Propiedades extends CI_Controller
{
    public function index()
    {
        $data['topLeftSide'] = $this->load->view('blocks/propiedades','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $data['topRightSide'] .= $this->load->view('blocks/subscribe','',true);
        $menuTiposDePropiedadData['sectionName'] = 'propiedades';
        $data['topLeftSide'] .= $this->load->view('blocks/menuTiposDePropiedad',$menuTiposDePropiedadData,true);
        $this->load->view('page',$data);
    }
    
    public function ver($id=null)
    {
        if(!($id && is_numeric($id) && $id >= 1))
            echo 'error';
        
        $propiedadObject['propiedad'] = 'prueba';
        $data['topLeftSide'] =$this->load->view('blocks/propiedadViewer',$propiedadObject,true);
        $data['topRightSide'] =$this->load->view('blocks/userViewer',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/monedaPrecio',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/pdfConverter',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/sharePropertyWithAFriend',$propiedadObject,true);
        $data['bottomLeftSide'] =$this->load->view('blocks/propertyInfo',$propiedadObject,true);
        $data['bottomLeftSide'] .= $this->load->view('blocks/propertyUbicationGmap',$propiedadObject,true);

        $data['bottomRightSide'] =$this->load->view('blocks/solicitudDeInformacion',$propiedadObject,true);
        
        
        $this->load->view('page',$data);
            
    }
}
?>
