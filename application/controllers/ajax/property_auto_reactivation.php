<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of property_auto_reactivation
 *
 * @author ariel
 */
class property_auto_reactivation extends CI_Controller{
    
    public function index()
    {
        $post = $this->input->post();
                
        
        if( !isset($post['data-property-id']) || !intval($post['data-property-id']))
        {
            $response->success = false;
            $response->message = "Parámetros inválidos";
            
        }

        
        $property_id = intval($post['data-property-id']);
        
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $property =  $user->property->where("display_property",1)->where("id",$property_id)->get();
        
        if(!$property->id)
        {
            $response->success = false;
            $response->message = "Esta propiedad no se encuentra registrada a su nombre";
              return false;
        }
            
        
        $property->auto_reactivation = isset($post["checked"]) ? 1 : 0;
        $property->save();
        
        
     }
    
}

?>
