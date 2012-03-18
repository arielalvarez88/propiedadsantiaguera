<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Directorio extends CI_Controller{
    
    
    
    public function index($section="propiedades", $view_variables = array())
    {
        
        $directory_panel_view_variables = $this->get_directory_panel_view_variables($section,$view_variables);
        
        $view_variables = array_merge($view_variables,$directory_panel_view_variables);
        
        $blocks['top'] = $this->load->view("blocks/directory_panel",$view_variables,true);
        
        $this->load->view("page",$blocks);
        
    }
    
    
    
     public function propiedades()
    {
         
        
        $this->index("propiedades");
        
    }
     
    public function empresas()
    {
        
        $this->index("empresas");
    }
    
    public function agentes()
    {
        
         $plain_users = new User();
        $plain_users->get();
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }
        
        $agents_results_views_variables['users'] = $functional_users;
        $view_variables['agents_results'] = $this->load->view("blocks/directory_users_pager",$agents_results_views_variables,true);
        $this->index("agentes",$view_variables);
        
    }
    
    public function buscar_agentes_por_nombre()
    {
        
         $plain_users = new User();
         $name = $this->input->post("name");
        $plain_users->like("name",$name)->get();
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }
        
        $agents_results_views_variables['users'] = $functional_users;
        
        $view_variables['agents_results'] = $this->load->view("blocks/directory_users_pager",$agents_results_views_variables,true);
        $view_variables['searched_agent_name'] = $name;
        $this->index("agentes",$view_variables);
        
    }
    
    
     public function buscar_agentes_por_inicial($letter='a')
    {
        
         $plain_users = new User();
         $name = $this->input->post("name");
        $plain_users->like("name",$letter,'after')->get();
        
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }
        
        $agents_results_views_variables['users'] = $functional_users;
        $view_variables['agents_results'] = $this->load->view("blocks/directory_users_pager",$agents_results_views_variables,true);
        $view_variables['selected_initial'] = $letter;
        $this->index("agentes",$view_variables);
        
    }
    
    
    public function get_directory_panel_view_variables($section="propiedades", $view_variables= array())
    {
        $view_variables['names_initials'] = $this->get_initial_letters($view_variables);
        $view_variables['section'] = $section;
        
        return $view_variables;
    }
    
    
      public function buscar_usuario_por_nombre($nombre='')
    {
        $users = new User();
        $nombre = $nombre ? $nombre : $this->input->post("nombre");
        
        $users->like("%".$nombre ."%")->get();
        $view_data['users'] = $users;
        $this->load_users_directory_results($view_data,true);
        
    }
    
    
    public function get_users_directory_begging_with_letter($letter,$return_as_string=false){
        
        $users = new User();
        $users->like("%".$letter)->get();
        $view_data['users'] = $users;
        $this->load_users_directory_results($view_data,$return_as_string);
        
    }
       
    
     public function get_all_agents_view()
    {
        
        if($agents==NULL){
            
            $agents=$this->get_agent("a");
            
            }
        
        $data["datos"]=$agents;      
        $data["abc"]=$this->abc();
         
        $blocks['top'] = $this->load->view("blocks/examen",$data,true);
        $this->load->view("page",$blocks);
        
    }

  
    public function get_initial_letters($view_variables = array())
    {
        $ar= array();
      
       
        foreach(range("A","Z") as $let)
        
            {
            
              
        
            $selected =$view_variables && isset($view_variables['selected_initial']) && $view_variables['selected_initial'] == $let? 'selected' : '';
            
            
            $ar[]="<a  class='directory-name-initialsletters ".$selected."' href='/directorio/buscar_agentes_por_inicial/".$let."'>".$let."</a>";
            
            }
        
         return $ar;
        
    }
    
    private function load_users_directory_results($view_variables,$return_as_string=false)
    {
        
        $this->load->view("blocks/directory_users_pager",$view_variables,$return_as_string);
    }

}



?>


