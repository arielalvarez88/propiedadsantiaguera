<?php 

class contacto extends CI_Controller
{
    public function index()
    {
        $blocks['topLeftSide'] = $this->load->view('blocks/contact', '', true);
            $this->load->view('page', $blocks);
    }
}

?>
