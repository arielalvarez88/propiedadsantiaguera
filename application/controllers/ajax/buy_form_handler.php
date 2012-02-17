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

require_once realpath('./application/libraries/Welcome_email_template.php');
require_once realpath('./application/libraries/Bill_email_template.php');


class Buy_form_handler extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('password_reset_template.php');
        $this->load->library('password_reset_success_template.php');
    }


    public function validate_user_info_ajax($upgrading_user=false)
    {
       
        $this->validate_user_info(true, $upgrading_user);
    }           
    
    public function validate_user_info($ajax = false, $upgrading_user =false, $save= false) {
      
        $logged_user = User_handler::getLoggedUser();
        
        $already_an_user = $logged_user && !$logged_user instanceof IUser_requests_only;
        if($already_an_user)
        {
            $this->process_buy();
            return;
        }

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

            $user_handler->validate_photos($user_info_getter);
            
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
                        
        

            $post = $this->input->post();
        if(!isset($post['disccount-code']))
        {
            redirect("/");
        }                                       
    }                          
}
?>
