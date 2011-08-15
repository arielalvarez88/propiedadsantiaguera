<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
    'signupEmpresa'=>array(
        array(
            'field' => 'signup-empresa',
            'label' => 'nombre',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-clave',
            'label' => 'contraseña',
            'rules' => 'required'
        ),
        array(
            'field' => 'signup-confirmar-clave',
            'label' => 'la confirmación de contraseña',
            'rules' => 'required|matches[signup-clave]'
          
        ),
        array(
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        )
    ),
    
    'signupParticular'=>array(
        array(
            'field' => 'signup-nombre',
            'label' => 'nombre',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-apellido',
            'label' => 'apellido',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-clave',
            'label' => 'contraseña',
            'rules' => 'required'
        ),
        array(
            'field' => 'signup-confirmar-clave',
            'label' => 'la confirmación de contraseña',
            'rules' => 'required|matches[signup-clave]'
          
        ),
        array(
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        )
    )
            
);
?>
