<?php 
$property = isset($property) ? $property : null;
?>
<div id="property-ubication-gmap">
    <h2 id="property-ubication-gmap-title">Localizaci&oacute;n</h2>
    <div id="property-ubication-gmap-map"></div>
    <input type="hidden" value="<?php echo $property->coordenates;?>" id="property-ubication-gmap-coordenate"/>
    
</div>