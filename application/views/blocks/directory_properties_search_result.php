<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$properties = isset($properties) ? $properties : null;
$image_helper = new Image_helper();

if(!$properties)
    die;
?>
<div id="directory_properties_search_result">
    
    <div>
        <h2 class="green-text">Resultados (<?php echo $properties->count();?>)</h2>
        <a class="green-button" href="/propiedades/agregar_propiedades">Crear propiedad</a>
        <a id="directory_properties_search_result_show_all" class="green-button" href="&properties_per_page=all">Ver todas</a>
    </div>

<table>
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Foto
            </th>
            <th>
                Tipo
            </th>
            <th>
                Condici&oacute;n
            </th>
            <th>
                Provincia
            </th>
            <th>
                Sector
            </th>
            <th>
                Precio
            </th>
            <th>
                Intermediario
            </th>
            <th>
                
            </th>
        </tr>
    
    </thead>
    
    <tbody>
        <?php $i=0; ?>
        <?php foreach($properties as $property):?>
        <tr <?php echo $i %2 ==0? 'style="bacground-color:#ccffcc;"' : '';?>>
            <td>
                <?php echo $property->id;?>
            </td>
            
            <td>
                <img alt="foto-de-la-propiedad" src="<?php $image_helper->resize($property->main_photo, 109, 82);?>"/>
            </td>
            
            <td>
                <?php echo $property->property_type->get()->name;?>
            </td>
            
            <td>
                <?php echo $property->get_condition_name();?>
            </td>
            
            <td>
                <?php echo $property->province->get()->name;?>
            </td>
            
            <td>
                <?php echo $property->neighborhood->get()->name;?>
            </td>
                        
            
            <td>
                
                <?php 
                
                    $prices = $property->get_prices();
                    
                    if($prices["dr"]["Sell"])
                        echo "Venta: RD$".$prices["dr"]["Sell"]."</br>";
                    else if($prices["us"]["Sell"])
                        echo "Venta: US$".$prices["us"]["Sell"]."</br>";
                    
                    if($prices["dr"]["Rent"])
                        echo "Renta: RD$".$prices["dr"]["Rent"]."</br>";
                    else if($prices["us"]["Rent"])
                        echo "Renta: US$".$prices["us"]["Rent"]."</br>";
                    
                    if($prices["dr"]["Maintenance"])
                        echo "Mantenimiento: RD$".$prices["dr"]["Maintenance"];
                    
                ?>
                
                
            </td>
            
            <td>
                <?php echo $property->user->get()->name;?>
            </td>
            
        </tr>
        
        <?php endforeach; ?>
    </tbody>
    
</table>
</div>