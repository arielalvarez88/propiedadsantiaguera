<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of agregar_video
 *
 * @author ariel
 */
require_once realpath("./application/libraries/YoutubeVideoUploadHelper.php");

class Agregar_video extends CI_Controller {

    public function desea($property_id) {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $property = $user->property->where("id", $property_id)->get();
        $property_belongs_to_user = $user->property->where("id", $property_id)->get()->id;

        if (!$property_belongs_to_user)
            redirect("/pagina_no_valida");

        $are_you_sure_view_variables['message'] = '¿Desea agregar un video para la propiedad : "' . $property->title . '" ?';
        $are_you_sure_view_variables['yes_href'] = "/agregar_video/propiedad/" . $property_id;
        $are_you_sure_view_variables ['no_href'] = "/propiedades/ver/" . $property_id;
        $upload_video_form_variables['yes_target'] = '_blank';

        $blocks["top"] = $this->load->view("blocks/are_you_sure", $are_you_sure_view_variables,true);
        $this->load->view("page", $blocks);
    }

    public function propiedad($property_id) {

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $property = $user->property->where("id", $property_id)->get();
        $property_belongs_to_user = $user->property->where("id", $property_id)->get()->id;

        if (!$property_belongs_to_user)
            redirect("/pagina_no_valida");

        $youtube_helper = new YoutubeVideoUploadHelper(Environment_vars::$youtube['username'], Environment_vars::$youtube['password'], Environment_vars::$google_api['developer_id'], "Propiedom", $user->name);
        $upload_video_form_variables = $youtube_helper->get_form_variables($property->title,$property->description,base_url() . "/agregar_video/youtube_upload_response/" . $property->id);
        $upload_video_form_variables['message'] = 'Por favor seleccione un video para agregarselo a la propiedad de título: "' . $property->title . '":';

        $blocks["top"] = $this->load->view("blocks/upload_video", $upload_video_form_variables,true);

        $this->load->view("page", $blocks);
    }

    public function youtube_upload_response($property_id) {

        $user = $this->get_logged_user_or_redirect_to_please_login();

        $filtered_get = $this->input->get();        
        $youtube_helper = new YoutubeVideoUploadHelper(Environment_vars::$youtube['username'], Environment_vars::$youtube['password'], Environment_vars::$google_api['developer_id'], "Propiedom", $user->name);
        
        try {
            $youtube_helper->handle_upload_response($filtered_get);
        } catch (Exception $e_uploading) {
            
            
            $blocks["top"] = $this->load->view("blocks/errors",array("errors" => "Lo sentimos, se produjo un error al subir el video de su propidad."),true);
            $this->load->view("page",$blocks);
            return;
        }
        
        $property = $user->property->where("id",$property_id)->get();
        $flash_video_url = $youtube_helper->get_video_flash_url();
        
                
        if(!$property || !$property->id)
                redirect("/pagina_no_valida");
        
        $property->video = $flash_video_url;
        $property->save();
        redirect("/propiedades/ver/".$property_id);

        
        
    }

}

?>
