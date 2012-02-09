<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Articulos extends CI_Controller{
    public function index(){
        
    }
    
    public function ver($id){
        
        if(!$id)
            redirect("/pagina_no_valida");
        
        $article = new Article($id);
        
        if(!$article->id)
                redirect("/pagina_no_valida");
                
          $article_viewer_view_variables["article"] = $article;
          
        $blocks["topLeftSide"] = $this->load->view("blocks/article_viewer",$article_viewer_view_variables,true);
        
        $random_articles = new Article();        
        $random_articles->where("id !=", $id)->get()->all;
        
        $related_articles_view_parameters['articles'] = $random_articles;
        
        $blocks["topRightSide"] = $this->load->view("blocks/google_adsense_W336_H280",'',true);
        $blocks["topRightSide"] .= $this->load->view("blocks/related_articles",$related_articles_view_parameters,true);
        $blocks["topRightSide"] .= $this->load->view("blocks/google_adsense_W336_H280",'',true);
        
        
        
        
        $this->load->view("page",$blocks);
        
                        
    }
    
        private function get_articles_form_reppopulate_variables($article){
        
        
        $view_variables['title'] = $article->title;
        $view_variables['body'] = $article->body;
        $view_variables['preview'] = $article->preview;
        $view_variables['photo'] = $article->photo;
        $view_variables['edit'] = $article->edit;
        
        return $view_variables;
    }
    
      public function editar($article_id){
        
        $articles_template_reppopilate_forms_variables = $this->get_articles_form_reppopulate_variables($article_id);        
        $blocks['top'] = $this->load->view("blocks/articles_template",$articles_template_reppopilate_forms_variables,true);
        $this->load->view('page',$blocks);
    }
    
     public function eliminar($id=0){
        
         $user = $this->get_logged_user_or_redirect_to_please_login();
         if(!$user instanceof Admin_user)
             redirect("/pagina_no_valida");
         
         $articles = new Article($id);
         $articles->delete();
         redirect("/cms/editar_articulos");
    }
    
}
?>
