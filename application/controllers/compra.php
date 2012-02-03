<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



require_once realpath('./application/libraries/User_info_getter_from_object.php');
require_once realpath('./application/libraries/User_info_getter_from_post.php');

class Compra extends CI_Controller {
    
    
    public function index()
    {     
        
        redirect(Environment_vars::$paths['https_base_site']."/compra/plan/".Environment_vars::$maps["texts_to_id"]['plans']['Basico']);
    }
    
    public function plan($plan_id=0){
        if(isset($_SERVER['HTTPS']) && !$_SERVER['HTTPS'] &&  Environment_vars::$environment != "production")
            redirect(Environment_vars::$paths['https_base_site']."/compra/plan/".$plan_id);
        
        $user = User_handler::getLoggedUser();
        $user_is_logged = $user;
        
        $plan_id = $plan_id ==0? Environment_vars::$maps["texts_to_id"]['plans']['Basico'] : $plan_id;
        $plan = new Plan($plan_id);
        
        if(!$plan->id)
                redirect("/pagina_no_valida");
        
        $buy_form_data['plan'] = $plan;
        $step_one_form_variables = '';
        
        $logged_and_completely_inscribed_user = $user_is_logged && !$user instanceof IUser_requests_only;
        $logged_and_is_requester_only_user = $user_is_logged && $user instanceof IUser_requests_only;
        
        if($logged_and_completely_inscribed_user)
            $buy_form_data['skip_step_one'] = true;
        else if($logged_and_is_requester_only_user)
        {
            
            $step_one_form_variables = $this->get_upgrade_parameters();
        }
            
        else
        {
            $step_one_form_variables['buy_format'] = true;
            
           $step_one_form_variables['section'] = 'buy-';
        }
            
        
        
        
        
        
        $buy_form_data['step_one_form'] = $this->load->view("forms/signup_form_content",$step_one_form_variables,true);
        
        $data['topLeftSide'] = $this->load->view('forms/compra_form',$buy_form_data, true);
        
        $this->load->view('page',$data);
    }

 
    
    private  function get_upgrade_parameters()
    {
        $user = User_handler::getLoggedUser();
        $form_data = $this->reppopulate_info();
        $form_data['upgrade'] = true;
        $form_data['edit_client_id'] = $user->id;                        
        $form_data['buy_format'] = true;
        $form_data['section'] = 'buy-';

        return $form_data;
    }
    
    
    private function reppopulate_info() {
        $repopulate_object = $this->get_logged_user_or_redirect_to_please_login();

        $repopulateForm = array();
        $user_info_getter = new User_info_getter_from_object($repopulate_object);

        $repopulateForm['companyName'] = $user_info_getter->get_name();


        $repopulateForm['clientName'] = $user_info_getter->get_name();
        



        $repopulateForm['email'] = $user_info_getter->get_email();
        $repopulateForm['tel'] = $user_info_getter->get_tel();
        $repopulateForm['address'] = $user_info_getter->get_address();
        $repopulateForm['description'] = $user_info_getter->get_description();

        $repopulateForm['cel'] = $user_info_getter->get_cel();
        $repopulateForm['cel2'] = $user_info_getter->get_cel2();
        $repopulateForm['fax'] = $user_info_getter->get_fax();
        $repopulateForm['website'] = $user_info_getter->get_website();
        $repopulateForm['description'] = $user_info_getter->get_description();

        
        $client_type_text = Environment_vars::$maps['ids_to_text']['user_types_requesters'][$user_info_getter->get_type()];
        $client_type_id = Environment_vars::$maps['texts_to_id']['requesters_user_to_active_user'][$client_type_text];        
        
        $repopulateForm['client_type'] = $client_type_id;


        return $repopulateForm;
    }
       
}
?>
