<?php
require_once 'Iemail_template.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Expiring_property_notification_email_template implements Iemail_template
{
    public $username;
    public $properties;
    
    
    public function __construct($username='',$properties=array())
    {
        $this->username = $username;
        $this->properties = $properties;
    }
    
    public function get_subject()
    {
        return 'Notificación de vencimiento de propiedad';
    }
    
    public function email_template($client_name)
    {
        $text = <<<EOD
        Estimado Sr@ {$this->username}: \n\n
        
        Las siguientes publicaciones vencen en los próximos 5 días:
EOD;
        
        foreach ($this->properties as $property)
        {
            echo $property->name;
            $text .= <<<EOD
            Título: "{$property->title}" \n
            No. de Referencia: {$property->id} \n\n
             
EOD;
        }
        
        $text .= <<<EOD
        Por favor, considere activar la opción de “AUTO REACTIVACION” para cada propiedad en la sección de propiedades de su panel, para que las propiedades permanezcan publicadas. En caso de que necesite más publicaciones para reactivar o agregar más propiedades, no dude en comprar las necesarias.\n\n
        

        ¿Necesita algún tipo de ayuda? Puede contactarnos en soporte@propiedom.com, o al teléfono 809-582-2690.
EOD;
        return $text;
    }
    
}
?>

