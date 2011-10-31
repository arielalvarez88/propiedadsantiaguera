<?php 

class view_loader extends CI_Controller
{
    public function please_login()
    {
        $blocks['topLeftSide'] = $this->load->view('blocks/please_login', '', true);
            $this->load->view('page', $blocks);
    }
}

?>
