<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath("./application/libraries/Filter_builder.php");
class Directorio extends CI_Controller{
    private $propertiesPerPage = 1;
    
    
    
    public function index($section="propiedades", $view_variables = array())
    {
        
        
        $this->agentes();
        
    }
    
    
    
    public function propiedades()
    {
        $pagination_number_page_candidate = $this->input->get("per_page");
        $page = isset($pagination_number_page_candidate) && intval($pagination_number_page_candidate) ?  intval($pagination_number_page_candidate) : 0;
        $view_variables_of_directory_panel['section'] = "propiedades";
        $blocks['top'] = $this->load->view("blocks/directory_panel",$view_variables_of_directory_panel,true);
        
        $view_variables_for_basic_filter = $this->get_basic_filter_view_values();                
        
        $blocks['topLeftSide'] = $this->load->view("blocks/basic_filter",$view_variables_for_basic_filter,true);
        
        $blocks['topRightSide'] = $this->load->view("blocks/properties_statistic","",true);
        
        
        $view_variables_for_directory_properties_search_result = $this->get_filtered_properties($page);
        

        $blocks["bottom"] = $this->load->view("blocks/directory_properties_search_result",$view_variables_for_directory_properties_search_result,true);
        

          $this->load->view("page",$blocks);
        
    }
    
    private function get_basic_filter_view_values()
    {
        
        $variables["section"] = "directory-";
        
        if($this->input->get("neighborhood"))
            $variables['selected_property_neighborhood']=  $this->input->get("neighborhood");
        
        if($this->input->get("type"))
            $variables['selected_property_type']=  $this->input->get("type");                
                
        
        if($this->input->get("condition"))
            $variables['selected_property_condition']=  $this->input->get("condition");
        
        if($this->input->get("province"))
            $variables['selected_property_province']=  $this->input->get("province");
        return $variables;        
    }
    
    private function get_filtered_properties($page)
    {
        $filtered_properties = new Property();
        $post = $this->input->post();
        
        Filter_builder::applyFilters($post, $filtered_properties);
        $properties_pagination_offset = ($this->propertiesPerPage * $page);
        $filtered_properties->get();        
        $get_parameters = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "?";
        
        $get_parameters = preg_replace("/&per_page=\d*/", "", $get_parameters);
        
        $config['base_url'] = base_url().'directorio/propiedades'.$get_parameters;        
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $filtered_properties->result_count();        
        
        $filtered_properties->limit($this->propertiesPerPage, $properties_pagination_offset)->get();
        $this->load->library("pagination");
        
        
        

        
        $config['per_page'] = $this->propertiesPerPage;
        $config['last_link'] = 'Ultima';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['first_link'] = 'Primera';
        $this->pagination->initialize($config);     
        
        
        
        
        
        
        
        
        $view_variables_for_directory_properties_search_results['properties'] = $filtered_properties;
        
        
        
        $view_variables_for_directory_properties_search_results["pagination"] = $this->pagination->create_links();
        
   
        
        return $view_variables_for_directory_properties_search_results;
           
    }
     
    public function empresas()
    {
        
                $view_variables_of_directory_panel['section'] = "empresas";
        $blocks['top'] = $this->load->view("blocks/directory_panel",$view_variables_of_directory_panel,true);
          $this->load->view("page",$blocks);
    }
    
    public function agentes()
    {

        $view_variables_of_directory_panel['section'] = "agentes";
        $blocks['top'] = $this->load->view("blocks/directory_panel",$view_variables_of_directory_panel,true);
        $view_variables_for_directory_users_pager = $this->get_view_variables_for_directory_users_pager();
        $view_variables_for_directory_user_search_filter = $this->get_view_variables_for_directory_agents_search_filter();
        $blocks["topLeftSide"] = $this->load->view("blocks/directory_user_search_filter",$view_variables_for_directory_user_search_filter,true);
        
        $blocks['bottom'] = $this->load->view("blocks/directory_users_pager",$view_variables_for_directory_users_pager,true);
       
        $this->load->view("page",$blocks);
        
    }
    
    private function get_view_variables_for_directory_users_pager()
    {
        $seach_user_by_initial = $this->input->get("inicial");
        $seach_user_by_name = $this->input->get("nombre");
        $view_variables = array();
        if($seach_user_by_name)
        {
            $view_variables['users'] = $this->search_agents_by_name($seach_user_by_name);
        }
        else if($seach_user_by_initial)
        {
            $view_variables['users'] = $this->search_agents_with_initial($seach_user_by_initial);
            
        }
        else
            $view_variables['users'] = $this->get_all_agents_as_seach_result();
        
        return $view_variables;
    }
    
    private function get_all_agents_as_seach_result()
    {
        $plain_users = new User();
        $plain_users->get();
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }
        
        return $functional_users;
    }
    
    private function get_matching_agents()
    {
        
    }
    
    public function search_agents_by_name($name='')
    {
        
         $plain_users = new User();        
        $plain_users->like("name",$name)->get();
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }
        
        return $functional_users;
        
    }
    
    
     private function search_agents_with_initial($initial='a')
    {
        
         $plain_users = new User();
         $name = $this->input->post("name");
        $plain_users->like("name",$initial,'after')->get();
        
        $functional_users = array();
        foreach($plain_users as $plain_user)
        {
            $functional_user = User_factory::get_user_from_object($plain_user);
            $functional_users[] = $functional_user; 
        }                
        return $functional_users;                
    }
    
    
    public function get_view_variables_for_directory_agents_search_filter()
    {
        $recived_letter_to_search = $this->input->get("inicial");
        $letter_to_search_agents_for = $recived_letter_to_search ? $recived_letter_to_search : '';
        
        
        $view_variables['names_initials'] = $this->get_initial_letters($letter_to_search_agents_for);
        
        $searched_agent_name = $this->input->get("nombre");
        
        if($searched_agent_name)
            $view_variables['searched_agent_name'] = $searched_agent_name;
        
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

  
    public function get_initial_letters($letter_to_search_agents_for='')
    {
        $ar= array();
      
       
        foreach(range("A","Z") as $let)
        
            {
            
              
        
            $selected = strtoupper($letter_to_search_agents_for)== $let? 'selected' : '';
            
            
            $ar[]="<a  class='directory-name-initialsletters ".$selected."' href='/directorio/agentes?inicial=".$let."'>".$let."</a>";
            
            }
        
         return $ar;
        
    }
    
    private function load_users_directory_results($view_variables,$return_as_string=false)
    {
        
        $this->load->view("blocks/directory_users_pager",$view_variables,$return_as_string);
    }

}



?>


