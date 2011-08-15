<?php

class Signup extends CI_Controller {

    function index() {

        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }

    private function error() {

        $repopulateForm['nombre'] = $this->input->post('signup-nombre');
        $repopulateForm['apellido'] = $this->input->post('signup-apellido');
        $repopulateForm['empresa'] = $this->input->post('signup-empresa');
        $repopulateForm['email'] = $this->input->post('signup-email');
        $repopulateForm['telefono'] = $this->input->post('signup-telefono');
        $repopulateForm['celular'] = $this->input->post('signup-celular');
        $repopulateForm['website'] = $this->input->post('signup-website');
        $repopulateForm['descripcion'] = $this->input->post('descripcion');
        $repopulateForm['tipoCliente'] = $this->input->post('signup-tipo-cliente');
       
       
        $repopulateForm['errores'] = validation_errors();

        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_informacion_general', $repopulateForm, true);
        
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }

    function validate() {
    
       
        $tipoCliente = $this->input->post('signup-tipo-cliente');

        $validationType = $tipoCliente == 'empresa'? 'signupEmpresa' : 'signupParticular'; 
        
        if ($this->form_validation->run($validationType) == false)
        {            
            $this->error();
        }
            
        else
            $this->saveUser();
    }
    
    private function saveUser()
    {
        $newUser = new Usuario();
        $userInfo = $this->input->post();


        $newUser->nombre = isset($userInfo['signup-nombre']) && $userInfo['signup-nombre']? $userInfo['signup-nombre'] : $userInfo['signup-empresa'];
        $newUser->apellido = $userInfo['signup-apellido'];
        $newUser->email = $userInfo['signup-email'];
        $newUser->clave = $userInfo['signup-clave'];
        $newUser->telefono = $userInfo['signup-telefono'];
        $newUser->celular = $userInfo['signup-celular'];
        $newUser->website = $userInfo['signup-website'];
        $newUser->descripcion = $userInfo['signup-descripcion'];
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->clave);
        redirect('/portada');

        
    }

    function __construct() {
         parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url'); 
       
    }

}
?>
