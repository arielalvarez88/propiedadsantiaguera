<?php

class Signup extends CI_Controller {

    function index() {

        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $clientType['clientType'] = 'client';
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_informacion_general.php', $clientType, true);
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);        
        $this->load->view('page.php', $data);
    }

    private function error() {

        $repopulateForm['name'] = $this->input->post('signup-name');
        $repopulateForm['lastname'] = $this->input->post('signup-lastname');
        $repopulateForm['company'] = $this->input->post('signup-company');
        $repopulateForm['email'] = $this->input->post('signup-email');
        $repopulateForm['tel'] = $this->input->post('signup-tel');
        $repopulateForm['cel'] = $this->input->post('signup-cel');
        $repopulateForm['website'] = $this->input->post('signup-website');
        $repopulateForm['description'] = $this->input->post('description');
        $repopulateForm['clientType'] = $this->input->post('signup-client-type');
        $repopulateForm['errores'] = validation_errors();
        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_informacion_general', $repopulateForm, true);
        
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }

    function validate() {
    
       
        $clientType = $this->input->post('signup-client-type');

        $validationType = $clientType == 'client'? 'signupClient' : 'signupCompany'; 
        
        if ($this->form_validation->run($validationType) == false)
            $this->error();
        
        else
            $this->saveUser();
    }
    
    private function saveUser()
    {
        $newUser = new User();
        $userInfo = $this->input->post();


        $newUser->name = isset($userInfo['signup-client-name'])? $userInfo['signup-cleint-name'] : $userInfo['signup-company-name'];        
        if(isset($userInfo['signup-apellido']))
            $newUser->lastname = $userInfo['signup-lastname'];       
        $newUser->email = $userInfo['signup-email'];
        $newUser->password = $userInfo['signup-password'];
        $newUser->tel = $userInfo['signup-tel'];
        $newUser->cel = $userInfo['signup-cel'];
        $newUser->fax = $userInfo['signup-fax'];
        $newUser->website = $userInfo['signup-website'];        
        $newUser->rnc = $userInfo['signup-rnc'];
        $newUser->address = $userInfo['signup-adress'];
        $newUser->description = $userInfo['signup-description'];
        
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);
        redirect('/');

        
    }

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        
       
    }

}
?>
