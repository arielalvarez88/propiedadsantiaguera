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
            'field' => 'signup-client-name',
            'label' => 'nombre',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-client-lastname',
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
    ),
    'property' => array(
        array(
            'field' => 'property-type',
            'label' => 'tipo de propiedad',
            'rules' => 'required'),
        array(
            'field' => 'property-sector',
            'label' => 'sector',
            'rules' => 'required')
        ),
        array(
            'field' => 'property-status',
            'label' => 'Vender/Alquilar',
            'rules' => 'required'
        ),
        array(
            'field' => 'property-terrain',
            'label' => 'terreno',
            'rules' => 'numeric'),
    array(
            'field' => 'property-construction',
            'label' => 'construccion',
            'rules' => 'numeric'),
    array(
            'field' => 'property-stories',
            'label' => 'niveles',
            'rules' => 'numeric'),
    array(
            'field' => 'property-bedrooms',
            'label' => 'habitaciones',
            'rules' => 'numeric'),
    array(
            'field' => 'property-bathrooms',
            'label' => 'baños',
            'rules' => 'numeric'),
    array(
            'field' => 'property-livinroom',
            'label' => 'salas',
            'rules' => 'numeric'),
    array(
            'field' => 'property-kitchens',
            'label' => 'cocinas',
            'rules' => 'numeric'),
    array(
            'field' => 'property-parkings',
            'label' => 'parqueos',
            'rules' => 'numeric'),
    
    
    
            
);
?>
