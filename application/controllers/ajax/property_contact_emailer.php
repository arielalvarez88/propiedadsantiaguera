<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/property_contact_email_template.php");
require_once realpath("./application/libraries/mailer.php");

class Property_contact_emailer extends CI_Controller
{
    public $validation_errors;
    
    public function __construct(){
        parent::__construct();
        $this->validation_errors = array();
    }
    
    public function index()
    {
        $filtered_post = $this->input->post();
        $mailer = new Mailer();
        
        if($this->form_validation->run("property-contact") == false)
        {
            $response->success = false;
            $response->message = validation_errors();
            echo json_encode($response);
            return;
            
        }
        
        
        
        $filtered_post['number'] = isset($filtered_post['number'])? $filtered_post['number'] : '';
        $filtered_post['message'] = isset($filtered_post['message'])? $filtered_post['message'] : '';
        $template = new Property_contact_email_template($filtered_post['property-id'], $filtered_post['property-title'], $filtered_post['name'], $filtered_post['email'], $filtered_post['number'], $filtered_post['message']);
        
        $success = $mailer->send_email($template, '', $filtered_post['owner-email']);
        
        if($success)
        {
            $response->success = true;
            $response->message = "Su mensaje y sus datos fueron enviados al dueño de esta propiedad.";
            echo json_encode($response);
        }
        else
        {
            $response->success = false;
            $response->message = "Ha ocurrido un error, porfavor inténtelo más tarde.";
            echo json_encode($response);
        }
            
                     
        
    }
           
}
?>
