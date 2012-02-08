<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/Iemail_template.php");

class Contact_email_template implements Iemail_template
{
    
    public $user_name;
    public $user_type;
    public $user_email;
    public $user_company;
    public $user_message;    
    
    
    public function __construct($user_name,$user_type,$user_email,$user_company,$user_message) {
        
        
        $this->user_name = $user_name;
        $this->user_type = $user_type;
        $this->user_email= $user_email;
        $this->user_company = $user_company;
        $this->user_message = $user_message;
     
    }
    
    public function email_template($client_name){
        $message = <<<EOD
        Mensaje de la sección de contacto: 
            <br/>
            <br/>
            <br/>
            Nombre del usuario: {$this->user_name}
                <br/>
                <br/>
           Tipo de usuario: {$this->user_type} 
               <br/>
               <br/>
            Email del usuario: {$this->user_email}
                   <br/>
               <br/>
            Compañia: {$this->user_company}
                   <br/>
               <br/>
            Mensaje del usuario: 
            <br/>
            <br/>
            {$this->user_message}
            
EOD;
            
            return $message;
    }
    
    public function get_subject(){
        return "Mensaje de la Sección de contactos";
    }
}
?>
