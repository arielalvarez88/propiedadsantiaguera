<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
    'signupCompany' => array(
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
    
    'signupClient' => array(
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
    ),
   'edit_client' => array(
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
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        ),
        array(
            'field' => 'signup-password-confirmation',
            'label' => 'la confirmación de contraseña',
            'rules' => 'matches[signup-password]'
        )
    ),
       'edit_company' => array(
       array(
            'field' => 'signup-company-name',
            'label' => 'nombre de la compañía',
            'rules' => 'required|max_length[20]'
        ),
        array(
            'field' => 'signup-password-confirmation',
            'label' => 'la confirmación de contraseña',
            'rules' => 'matches[signup-password]'
        ),
        array(
            'field' => 'signup-email',
            'label' => 'email',
            'rules' => 'required|max_length[30]|valid_email'
        )
    ),
    "property_common" =>array(
        array(
            'field' => 'property-title',
            'label' => 'título',
            'rules' => 'required|max_length[41]'
        ),
        array(
            'field' => 'property-type',
            'label' => 'tipo',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'property-province',
            'label' => 'provincia',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'property-neighborhood',
            'label' => 'sector',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'property-address',
            'label' => 'dirección',
            'rules' => 'required'
        )

    ),
    
    "property_sell" => array(
        array(
            'field' => 'property-sell-price-dr',
            'label' => 'Precio de Venta $RD',
            'rules' => 'required|numeric|max_length[9]')
    ),
    "property_rent" => array(
        array(
            'field' => 'property-rent-price-dr',
            'label' => 'Precio de Alquiler $RD',
            'rules' => 'required|numeric|max_length[9]')
    ),
    "property_sell_rent" => array(
        array(
            'field' => 'property-rent-price-dr',
            'label' => 'Precio de Alquiler $RD',
            'rules' => 'required|numeric|max_length[9]'),
        array(
            'field' => 'property-sell-price-dr',
            'label' => 'Precio de Venta $RD',
            'rules' => 'required|numeric|max_length[9]')
    ),
    "property_house" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bedrooms',
            'label' => 'Habitaciones',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_apartment" => array(      
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),   
        array(
            'field' => 'property-bedrooms',
            'label' => 'Habitaciones',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_lot" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]')           
    ),
    
    "property_penthouse" => array(    
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bedrooms',
            'label' => 'Habitaciones',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_mall" => array(

        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
  
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]')
 
        
    ),
    "property_building" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bedrooms',
            'label' => 'Habitaciones',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_warehouse" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),    
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_office" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]')
        
    ),
    "property_land" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),       
    ),
    "property_construction_project" => array(
        array(
            'field' => 'property-terrain',
            'label' => 'Terreno',
            'rules' => 'required|numeric|max_length[6]'),
        array(
            'field' => 'property-construction',
            'label' => 'Construcción',
            'rules' => 'required|numeric|max_length[4]'),
        array(
            'field' => 'property-stories',
            'label' => 'Niveles',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bedrooms',
            'label' => 'Habitaciones',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-bathrooms',
            'label' => 'Baños',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-livingrooms',
            'label' => 'Salas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-kitchens',
            'label' => 'Cocinas',
            'rules' => 'required|numeric|max_length[2]'),
        array(
            'field' => 'property-parkings',
            'label' => 'Parqueos',
            'rules' => 'required|numeric|max_length[2]'),
        
    )
);
?>
