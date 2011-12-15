
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__).'/Company_inscriber.php';


require_once dirname(__FILE__).'/Company_agent_inscriber.php';


require_once dirname(__FILE__).'/Particular_inscriber.php';

class User_editor_factory
{

    
    public static function get_instance($client_type,$base_inscriber_behaviour,$form_validator)
    {
   
            switch ($client_type)
            {
                case Environment_vars::$maps['texts_to_id']['user_types']['Empresa']:
                 
                     return new Company_editor($base_inscriber_behaviour,$form_validator);
                break;
            
                case  Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa']:
                   
                   return  new Company_agent_editor($base_inscriber_behaviour, $form_validator);
                break;
            
                default:
                   return  new Particular_Editor($base_inscriber_behaviour,$form_validator);
            }
    }
    
}

?>
