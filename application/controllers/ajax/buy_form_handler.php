<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once realpath('./application/libraries/User_inscriber_factory.php');
require_once realpath('./application/libraries/User_editor_factory.php');



require_once realpath('./application/libraries/Base_user_inscriber.php');



require_once realpath('./application/libraries/Company_inscriber.php');
require_once realpath('./application/libraries/Company_editor.php');
require_once realpath('./application/libraries/Company_agent_inscriber.php');
require_once realpath('./application/libraries/Company_agent_editor.php');
require_once realpath('./application/libraries/Particular_inscriber.php');
require_once realpath('./application/libraries/Particular_editor.php');

require_once realpath('./application/libraries/Validation_not_passed_exception.php');
require_once realpath('./application/libraries/Invalid_photos_exception.php');
require_once realpath('./application/libraries/User_info_getter_from_object.php');
require_once realpath('./application/libraries/User_info_getter_from_post.php');


class Buy_form_handler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('password_reset_template.php');
        $this->load->library('password_reset_success_template.php');
    }


    
    public function validate_user_info($ajax = false, $upgrading_user =false, $save= false) {
        
        $logged_user = User_handler::getLoggedUser();

        $logged_user_type = $logged_user ? $logged_user->type : Environment_vars::$maps['texts_to_id']['user_types']['Particular'];


        $client_type = $this->input->post('signup-client-type');


        $validationType = '';

        $user_handler = '';
        $user_handler_base_behaviour = new Base_user_inscriber($this->form_validation);


        if ($upgrading_user) {
            $user_handler = User_editor_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        } else {
            $user_handler = User_inscriber_factory::get_instance($client_type, $user_handler_base_behaviour, $this->form_validation);
        }


        $response['message'] = '';
        try {

            $user_info_getter = new User_info_getter_from_post($this->input->post());

            $user_handler->validate_info($user_info_getter, $logged_user_type);

            $user_handler->validate_photos();
            
            $response['success'] = true;
            
        } catch (Validation_not_passed_exception $validation_exception) {
            $response ['message'] .= $validation_exception->getMessage() . "\n";
            $response['success'] = false;
            
            
        } catch (Invalid_photos_exception $photos_exception) {

            $response ['message'] .= $photos_exception->getMessage() . "\n";
            $response['success'] = false;
        } catch (Already_existing_user_exception $already_existing_exception) {

            $response ['message'] .= $already_existing_exception->getMessage() . "\n";
            $response['success'] = false;
        }

        
        if($ajax)
            echo json_encode ($response);
            
       if($save)
           $this->save_user($user_handler, $upgrading_user);
       
        
            
    }
    
       public function process_buy()
    {
           
           $filtered_post = $this->input->post();
           
           $plan_id = isset($filtered_post['plan-id']) ? $filtered_post['plan-id'] : null;
           
           $plan = new Plan($plan_id);


           
           if(!$plan->id)
           {
               $response->success = false;
               $response->message = "Se produjo un error, Por favor inténtelo mas tarde.";
               echo json_encode($response);
               return;
           }
           
                      
                              
           $factor = isset($filtered_post['plan-factor']) ? $filtered_post['plan-factor'] : 0;
           
            $posts_to_ad = $plan->number_of_posts * $factor;
            
            
            $user = User_handler::getLoggedUser();
            $user->posts_left += $posts_to_ad;
            
            
            
            $user->save();
            
            User_handler::refresh_logged_user();
            
           $response->success= true;
           echo json_encode($response);
                    
            
    }
    
    
    private function save_user($user_handler, $upgrading_user=false) {


        $user = new User();
        
        $inscriber = User_handler::getLoggedUser();
        $user_info_getter = new User_info_getter_from_post($this->input->post());

        if ($upgrading_user) {
            $user = $user->where("id", $user_info_getter->get_id())->get();
        }
  
        $user_handler->save_name($user, $user_info_getter);


        $user_handler->save_company($user, $inscriber);
        $user_handler->save_type($user, $user_info_getter);
        $user_handler->save_email($user, $user_info_getter);

        $user_handler->save_password($user, $user_info_getter);
        $user_handler->save_website($user, $user_info_getter);
        $user_handler->save_tel($user, $user_info_getter);

        $user_handler->save_cels($user, $user_info_getter);
        
        $user_handler->save_fax($user, $user_info_getter);

        $user_handler->save_photo($user, $user_info_getter);
        
        
        $user_handler->save_address($user, $user_info_getter);
        $user_handler->save_description($user, $user_info_getter);
        $user_handler->save_inscription_date($user, $user_info_getter);

        $user->save();

        $company_is_adding_or_editing_agent = ($user_handler instanceof Company_agent_inscriber || $user_handler instanceof Company_agent_editor) && ($inscriber && $inscriber instanceof Company_user);
                User_handler::loginAndSaveInCookies($user->email, $user->password);
                
          $this->process_buy();

    }
    

    
    
    public function register_user($edit=null){
        
        
            $this->validate_user_info (false, $edit, true);
        
        
                
    }
    
    

}
?>
