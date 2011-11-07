<?php 
$property_features = $property->property_feature->get();

?>

<div id="property-info">
    <h2 id="property-info-descripcion-title">Descripci&oacute;n</h2>
    <p id="property-info-descripcion">
        <?php echo $property->description;?>
    </p>
    <div id="property-info-caracteristicas">
        <h2 id="property-info-caracteristicas-tile">Caracter&iacute;sticas</h2>
        <ul id="property-info-caracteristicas-list">
            <?php foreach($property_features as $property_feature):?>
                <li><?php echo $property_feature->name;?></li>
            <?php endforeach;?>
        </ul>
    </div>   
</div>