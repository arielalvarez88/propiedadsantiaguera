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
        return utf8_decode('Notificación de contacto a su propiedad');
    }
    
    public function email_template($client_name)
    {
        
        $propiedom_page = base_url();
        $propiedom_logo = base_url().'images/common/logo.png';
        $politics_url = $propiedom_page.'politicas';
        $terms_url = $propiedom_page.'terminos';
         date_default_timezone_set("America/La_Paz");
        $date = date("j/n/Y g:s A");
        $html = <<<EOD
        <div style="background-color:#76bc3b; padding:40px; width:500px; height: 625px; text-align:center;">
            <div style="background-color: white; padding:30px; width:400px; height: 550px; position: relative; margin-right: auto; margin-left: auto;">
                <a style="border:none; text-decoration: none;" href={$propiedom_page}><img src="{$propiedom_logo}" alt="logo" style="border:none; text-decoration: none;"/></a>
                <div style="text-align:left;">
                    <h2 style="background-color:76bb3a;">Notificaci&oacute;n de Contacto</h2>
                    <p>La siguiente persona le ha enviado un mensaje a trav&eacute;s de su propiedad <span style="font-weight:bold;">"{$this->property_name}" </span> <br/> No. de Referencia <span style="font-weight:bold;">#{$this->property_id}</span></p>
                     
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
            <p color: white;>&#169; 2012 Propiedom - <a style="text-decoration: none;" href="{$politics_url}"> Política de seguridad </a>- <a style="text-decoration: none;" href="{$terms_url}"> Términos de uso </a> </p>
        </div>
EOD;
        return $html;
    }
    
    
}
?>