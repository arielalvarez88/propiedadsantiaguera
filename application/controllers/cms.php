<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cms
 *
 * @author ariel
 */

require_once realpath("./application/libraries/YoutubeVideoUploadHelper.php");
class Cms extends CI_Controller{
    //put your code here
    
    public function __construct() {
        
        
        parent::__construct();
        
        $user = $this->get_logged_user_or_redirect_to_please_login();
        if(! ($user instanceof Admin_user))
            redirect("/pagina_no_valida");
            
    }
    
    
    public function index(){
        $blocks['top'] = $this->load->view("blocks/cms_index",'',true);
        $this->load->view('page',$blocks);
    }
    
    public function crear_articulos($messages=array()){
                
        
        $articles_template_messages = is_array($messages) ? $messages : '';
        $blocks['top'] = $this->load->view("blocks/articles_template",$articles_template_messages,true);
        $this->load->view('page',$blocks);
    }
    
    
    public function validate_article(){
        
        
        if($this->form_validation->run("articles") == false)
        {
            $this->crear_articulos(array("error_messages" => validation_errors()));
            return;
        }
        
          try{
            $image_path =  File_handler::save_photos(array("photo"), "/images/articlesPhotos/");
        }  catch (Exception $exception)
        {
            
            $this->crear_articulos(array("error_messages" => $exception->getMessage()));
            return;
        }
        
        $article = new Article();
        $article->title = $this->input->post("title");
        $article->subtitle = $this->input->post("subtitle");
        
        
       if($this->input->post("display_in_front_page")) 
               $article->display_in_front_page = 1;
       
        
        $article->author = $this->input->post("author");
        $article->photo = $image_path["photo"];        
        $article->body = $this->input->post("body");
        
        $article->preview_title = $this->input->post("preview-title");
        $article->preview = $this->input->post("preview");
        
        
        
     
        
        $article->save();
        
        $this->crear_articulos(array("info_messages" => "Su articulo se agrego con exito."));
        
    }
    
    public function crear_videos($messages=array()){
        
        
        
      $blocks['top'] = $this->load->view("blocks/video_title",$messages,true);
            $this->load->view("page",$blocks);
    
                       
        
    }
    
    
    public function validate_video()
    {
        
           if($this->form_validation->run("cms_video_validation") == false)
        {
               
               $messages['error_messages'] = validation_errors();
          $this->crear_videos($messages);
          
          return;
            
           
        }
           $filtered_post = $this->input->post();
           
           $cms_video =  new Cms_video();
           $cms_video->title = $filtered_post['video-title'];
           $cms_video->description = $filtered_post['video-description'];
           
 
           $cms_video->save();
           
           $video_id = $cms_video->id;
           
           $this->subir_videos($video_id);
    }
    
    public function subir_videos($video_id, $message=array()){
        
    try {
        $video_helper = new YoutubeVideoUploadHelper(Environment_vars::$youtube['username'], Environment_vars::$youtube['password'], Environment_vars::$google_api['developer_id']);
    }
    catch(Exception  $e){
                        $this->subir_videos($video_id,array("error_messages" => "Este servicio está temporalmente desahabilitado."));
                        return;
    }
        
             
        $video_description = "Subido para el público de propiedad santiaguera.";
                  
       $cms_video = new Cms_video($video_id);
        $form_variables = $video_helper->get_form_variables($cms_video->title, $cms_video->description,base_url()."cms/save_video/".$video_id);
        
        $form_variables['message'] = "Seleccione un video para subir";
     
        
        if(is_array($message))
            $form_variables = array_merge($form_variables,$message);
      
        
        $blocks['top'] = $this->load->view("blocks/upload_video",$form_variables,true);
        $this->load->view('page',$blocks);
    }
 
    
          public function save_video($video_id)
          {
              $filtered_get = $this->input->get();
              $youtube_helper = new YoutubeVideoUploadHelper(Environment_vars::$youtube['username'], Environment_vars::$youtube['password'], Environment_vars::$google_api['developer_id']);
              $cms_video = new Cms_video($video_id);                    
              try{
                        $youtube_helper->handle_upload_response($filtered_get);
                    }
                    catch (Exception $error)
                    {
                        $cms_video->delete();
                        $this->subir_videos($video_title,array("error_messages" => $error->getMessage()));
                        
                        return;
                    }
                    
                    
                    $cms_video->url = $youtube_helper->get_video_flash_url();
                    $cms_video->thumbnail = $youtube_helper->get_video_thumbnail();
                    $cms_video->youtube_id = $youtube_helper->get_video_youtube_id();
                    
                    $cms_video->save();
                    $this->crear_videos(array("info_messages"=>"Su video fue subido satisfactoriamente."));
                    

          }
    
    public function editar_articulos(){
        
        $articles = new Article();
        $articles->get()->all;
        
        $articles_pager_view_variables['articles'] = $articles;
        $articles_pager_view_variables['delete_permission'] = true;
        $articles_pager_view_variables['edit_link'] = true;
        $articles_pager_view_variables['section'] = 'edit-article-';
        
        
        $blocks['top'] = $this->load->view("blocks/articles_thumbs_pager",$articles_pager_view_variables,true);
        $this->load->view('page',$blocks);
    }
    
        
    
    
    
}

?>
