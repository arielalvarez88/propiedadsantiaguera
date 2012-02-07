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
    
    public function crear_videos(){
                
        $blocks['top'] = $this->load->view("blocks/articles_template",'',true);
        $this->load->view('page',$blocks);
    }
    

    
          
    
    public function editar_articulo(){
        
        $articles = new Article();
        $articles->get()->all;
        
        $articles_pager_view_variables['articles'] = $articles;
        $articles_pager_view_variables['edit_link'] = true;
        $articles_pager_view_variables['section'] = 'edit-article-';
        
        
        $blocks['top'] = $this->load->view("blocks/articles_thumbs_pager",$articles_pager_view_variables,true);
        $this->load->view('page',$blocks);
    }
    
        
    
    
    
}

?>
