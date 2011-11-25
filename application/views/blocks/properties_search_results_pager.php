<?php if($filtered_properties):?>


<?php
$condition = isset($condition)? $condition : "sell";
?>

<div id="properties-search-results-pager">
    <?php foreach ($filtered_properties as $property):?>
    <div class="properties-search-results-pager-property">
        <img class="properties-search-results-pager-property-photo" src="<?php echo $property->main_photo?>" alt="foto-de-la-propiedad"/>
        <div>
            <div class="properties-search-results-pager-property-title">
                <h2><?php echo $property->title;?></h2><img class="item-corner" src="/images/propertiesSearchResults/headerUnion.png" alt="esquina-diagonal"/><h2 class="price">$RD <?php echo $condition == "rent"? Numerizer::numerize($property->rent_price_dr):Numerizer::numerize($property->sell_price_dr);?></h2><img class="item-corner" src="/images/common/grayCorner.png" alt="esquina-diagonal"/>
            </div>
            
            <div>
                
                <ul>
                <li>Tipo: <?php echo Environment_vars::$maps['property_type_to_name'][$property->type];?></li>
                <li>Habitaciones: <?php echo $property->livingrooms;?></li>
                <li>Ba&ntilde;os: <?php echo $property->bathrooms;?></li>
                <li>Pisos: <?php echo $property->stories;?></li>
                <li>Cocinas: <?php echo $property->kitchens;?></li>
            </ul>
            <img class="properties-search-results-pager-property-divisor" src="/images/common/diagonalDivisor.png" alt="divisor-diagonal"/>
            <ul>
                <li>Salas: <?php echo $property->bathrooms;;?></li>
                <li>Parqueos: <?php echo $property->parkings;?></li>
                <li>Terreno: <?php echo $property->terrain;?> Mt2</li>
                <li>Construcci&oacute;n: <?php echo $property->construction;?> Mt2</li>
            </ul>
            </div>
            

                <a class="green-button properties-search-results-pager-details" href="/propiedades/ver/<?php echo $property->id;?>">Ver M&aacute;s Detalles</a>

        </div>
        
<!--        <div class="properties-search-results-pager-divisor">
            
        </div>-->
    </div>
    
    <?php endforeach;?>
</div>

<?php endif;?>