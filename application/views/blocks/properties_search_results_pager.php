<?php if($filtered_properties):?>

<div>
    <?php foreach ($filtered_properties as $property):?>
    <div class="properties-search-results-pager-property">
        <img src="<?php echo $property->principal_photo?>" alt="foto-de-la-propiedad"/>
        <div>
            <h2><?php echo $property->title;?></h2>
            <ul>
                <li>Tipo: <?php echo Environment_vars::$maps['property_type_to_name'][$property->type];?></li>
                <li>Habitaciones: <?php echo $property->livingrooms;?></li>
                <li>Ba&ntilde;os: <?php echo $property->bathrooms;?></li>
                <li>Pisos: <?php echo $property->stories;?></li>
                <li>Cocinas: <?php echo $property->kitchens;?></li>
            </ul>
            <ul>
                <li>Salas: <?php echo $property->bathrooms;;?></li>
                <li>Parqueos: <?php echo $property->parkings;?></li>
                <li>Terreno: <?php echo $property->terrain;?> Mt2</li>
                <li>Construcci&oacute;n: <?php echo $property->construction;?> Mt2</li>
            </ul>
            <div>
                <a class="green-button" href="/propiedades/ver/<?php echo $property->id;?>">Ver M&aacute;s Detalles</a>
            </div>
        </div>
    </div>
    
    <?php endforeach;?>
</div>

<?php endif;?>