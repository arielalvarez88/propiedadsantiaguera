<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
    'signupCompany'=>array(
        array(
            'field' => 'signup-company-name',
            'label' => 'nombre de la compañía',
            'rules' => 'required|max_length[20]'
        ), array(
            'field' => 'signup-password',
            'label' => 'contraseña',
            'rules' => 'required'
        ),
        array(
            'field' => 'signup-password-confirmation',
            'label' => 'la confirmación de contraseña',
            'rules' => 'required|matches[signup-password]'
          
        ),
        array(
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        )
    ),
    
    'signupClient'=>array(
        array(
            'field' => 'signup-name',
            'label' => 'nombre',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-lastname',
            'label' => 'apellido',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-password',
            'label' => 'contraseña',
            'rules' => 'required'
        ),
        array(
            'field' => 'signup-password-confirmation',
            'label' => 'la confirmación de contraseña',
            'rules' => 'required|matches[signup-password]'
          
        ),
        array(
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        )
    )
            
);
?>
