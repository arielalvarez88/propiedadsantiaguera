<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath('./application/libraries/User_factory.php');

class Miembros extends CI_Controller {

    public function index($section ='companies') {
        
        if($section != 'members' && $section != 'companies')
            redirect("/pagina_no_valida");
        
        
        $members_pager_view_variables = $this->get_members_info_for_memebers_pager_view($section);
        $members_pager_view_variables['section'] =  $section.'-';
        $members_pager_view_variables['title'] =  $section;
        $data['topRightSide'] = $this->load->view('blocks/members_header', $members_pager_view_variables,true);
        $data['bottomLeftSide'] = $this->load->view('blocks/members_pager', $members_pager_view_variables, true);
        $this->load->view('page', $data);
    }
    
    public function agentes()
    {
        $this->index('members');
    }
    
    
    public function inmobiliarias()
    {
        $this->index('companies');
    }
    
    private function get_members_info_for_memebers_pager_view($section)
    {
        $user_types = null;
        $variables = array();
        if($section == 'companies')
        {
            $user_types = array(Environment_vars::$maps['texts_to_id']['user_types']['Empresa']);
            $variables['thumbs_width'] = 142;
            $variables['thumbs_height'] = 107;
        }
        else
        {
            $user_types = array(Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa'], Environment_vars::$maps['texts_to_id']['user_types']['Agente Independiente']);
            $variables['thumbs_width'] = 107;
            $variables['thumbs_height'] = 121;
        }
            
        $members = new User();
        $members->where_in("type", $user_types)->order_by('RAND()')->get_iterated();
        
        $variables['members_array'] = array();
        foreach($members as $member)
        {
            $member = User_factory::get_user_from_object($member);
            $variables['members_array'][] = array("id" => $member->id, "name" => $member->name, "photo"=> $member->photo, "published_properties" => $member->get_number_of_posted_properties() );
        }
        
        return $variables;
    }
    
    

    public function ver($id=null) {

        if (!$id || !is_numeric($id))
            redirect("/pagina_no_valida");

        $user_to_view = new User();
        $user_to_view->where("id", $id)->get();
        $user_to_view = User_factory::get_user_from_object($user_to_view);
        
        

        if (!$user_to_view->id)
            redirect("/pagina_no_valida");


        $user_info['user_to_view'] = $user_to_view;
        $user_info['user_company'] = User_factory::get_user_from_object($user_to_view->get_company_object());

        $data['topLeftSide'] = $this->load->view('blocks/user_info', $user_info, true);
        $data['topRightSide'] = $this->load->view('blocks/advertising', '', true);
        
        $properties_pager_view_data = $this->get_properties_pager_view_variables($user_to_view, 'members-');
        $data['bottom'] = $this->load->view('blocks/properties_pager', $properties_pager_view_data, true);
        $this->load->view('page', $data);
    }
    
    private function get_properties_pager_view_variables($user,$section='members-')
    {
         
        $properties_pager_data['section'] = $section;
        
        
        
            
        
        
        $properties_pager_data['properties'] =  $user->get_published_properties();
        
        
        $properties_pager_data['properties_per_row'] = 3;
        $properties_pager_data['rows_per_page'] = 2;
        
        return $properties_pager_data;
    }
    

    private function delete($id=0) {
        $deleter = $this->get_logged_user_or_redirect_to_please_login();

        $user_to_delete = User_factory::get_user_from_id($id);

        if ($deleter->id == $user_to_delete->id) {
            $user_to_delete->delete();
            User_handler::loggout();
            redirect("/");
        } else {
            $user_to_delete->delete();
            User_handler::refresh_logged_user();
            redirect("/panel/agentes");
        }
    }

    public function give_posts() {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $agents = $user->get_agents();
      
        $agents_number =$agents->result_count();
          
        $user_posts_left = $user->posts_left;

        $posts_summatory = 0;


        for ($i = 1; $i <= $agents_number; $i++) {
            $field_name = "posts-to-agent-" . $i;
            $posts_summatory += $this->input->post($field_name);
        }
      

        if ($posts_summatory > $user_posts_left) {
            $response->success = false;
            $response->message = 'Usted ha excedido el limite de publicaciones disponibles, por favor comprar más publicaciones.';
            echo json_encode($response);
            return;
        } else {
            $user->posts_left -= $posts_summatory;
            $user->save();
            for ($i = 1; $i <= $agents_number; $i++) {
                $field_with_client_id_name = "agent-id-" . $i;
                $number_of_posts_field_name = "posts-to-agent-" . $i;
                $number_of_post_to_pass = $this->input->post($number_of_posts_field_name);
                $agent_id = $this->input->post($field_with_client_id_name);
                $agent = $agents->where("id", $agent_id)->get();
                
                
                $agent->posts_left += $number_of_post_to_pass;
                $agent->save();
                
            }
            $response->success= true;
                echo json_encode($response);
        }
    }

    private function can_delete_member($id=0) {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $is_himself = $user->id == $id;
        $is_his_agent = $user->has_agent($id);
        $can_delete = $is_himself || $is_his_agent;


        return $can_delete;
    }

    public function confirmacion_eliminar($id=0) {

        if ($this->can_delete_member($id))
            $this->delete($id);
        else
            redirect("/pagina_no_valida");
    }

    public function eliminar($id=0) {


        if (!$this->can_delete_member($id))
            redirect("/pagina_no_valida");

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $is_himself = $user->id == $id;

        $agent = new User($id);


        $data['message'] = $is_himself ? "Está seguro que desea eliminar su cuenta?" : "Está seguro que desea eleminar al agente " . $agent->name;
        $data['yes_href'] = "/miembros/confirmacion_eliminar/" . $id;
        $data['no_href'] = "/panel/cuenta";
        $blocks['topLeftSide'] = $this->load->view("blocks/are_you_sure", $data, true);
        $this->load->view('page', $blocks);
    }

}

?>
