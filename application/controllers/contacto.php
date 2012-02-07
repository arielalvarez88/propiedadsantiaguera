<?php 
require_once realpath("./application/libraries/User_factory.php");
require_once realpath("./application/libraries/Contact_email_template.php");
class contacto extends CI_Controller
{
    public function index($messages = array())
    {
        
        
        $blocks['topLeftSide'] = $this->load->view('blocks/contact', $messages, true);
            $this->load->view('page', $blocks);
    }
    
    
    public function send_email()
    {
        $mailer = new Mailer();
        
        
        
        $contact_message_template = new Contact_email_template($this->input->post("name"), $this->input->post("user-type"),$this->input->post("email"),$this->input->post("company"),$this->input->post("message"));        
        
        
        
        if($mailer->send_email($contact_message_template, '', $this->input->post("email"))) 
            $this->index(array("info_messages" => "Su email fue enviado con éxito."));
        
        else
            $this->index(array("error_messages" => "Su email no pude se enviado, por favor intentelo más tarde."));
        
        
    }
}

?>
