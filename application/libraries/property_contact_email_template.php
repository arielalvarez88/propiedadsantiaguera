<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Property_contact_email_template  implements Iemail_template
{
    
    public $property_id;
    public $property_name;
    public $contactor_name;
    public $contactor_email;
    public $contactors_number;
    public $contactors_message;
    public function __construct($property_id,$property_name,$contactors_name,$contactors_email,$contactors_number,$contactors_message)
    {
        $this->property_id = $property_id;
        $this->property_name = $property_name;
        $this->contactors_name = $contactors_name;
        $this->contactors_email = $contactors_email; 
        $this->contactors_number = $contactors_number; 
        $this->contactors_message = $contactors_message;
        
        
    }
    
    public function get_subject()
    {
        return 'Solicitud de cambio de password';
    }
    
    public function email_template($client_name)
    {
        
        
        $propiedom_logo = base_url().'images/common/logo.png';
        
         date_default_timezone_set("America/La_Paz");
        $date = date("j/n/Y g:s A");
        $html = <<<EOD
        <div style="background-color:#76bc3b; padding:40px; width:500px; height: 625px; text-align:center;">
            <div style="background-color: white; padding:30px; width:375px; height: 391px; position: relative; margin-right: auto; margin-left: auto;">
                <img src="{$propiedom_logo}" alt="logo"/>
                <div style="text-align:center;">
                    <h2 style="background-color:76bb3a;">Notificaci&oacute;n de Contacto</h2>
                    <p>La siguiente persona le ha enviadoun mensaje a trav&eacute;s de su propiedad <span style="font-weight:bold;">"{$this->property_name}" </span> No. de Referencia <span style="font-weight:bold;">#{$this->property_id}</span></p>
                     
                     <p>
                        <span style="font-weight:bold;">{$this->contactors_name}</span>
                            <br/>
                            {$this->contactors_email}
                                <br/>
                                {$this->contactors_number}
                            
                    </p>
                    

                    <p>
                        <span style="font-weight:bold;">Comentario:</span>
                        <br/>
                         {$this->contactors_message}
                        <br/>
                        {$date}
                    </p>

                        
                </div>
                
            </div>
            <p color: white;>&#169; 2012 Propiedom - Política de seguridad - Términos de uso</p>
        </div>
EOD;
        return $html;
    }
    
    
}
?>