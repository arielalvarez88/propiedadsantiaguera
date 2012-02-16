<?php if($filtered_properties):?>


<?php
$condition = isset($condition)? $condition : "sell";
$properties_in_a_page= isset($properties_in_a_page) ? $properties_in_a_page : 10;
$i=0;
$number_of_properties = count($filtered_properties);
$number_of_pages = ceil($number_of_properties/$properties_in_a_page);
$number_of_visible_numbers_in_pager = isset($number_of_visible_numbers_in_pager) ? $number_of_visible_numbers_in_pager : 5;
$order_by_default_value = isset($order_by_default_value) ? $order_by_default_value : "price_desc";
        
?>

<div id="properties-search-results-pager">
    
    <div id="properties-search-results-pager-order-by">
        <span id="properties-search-results-pager-order-by-header">Resultados(<?php echo $number_of_properties;?>)</span>
        
                <select id="properties-search-results-pager-order-by-options" data-name="orderBy">
                <option value="" >Por fecha</option>
                <option value="price_desc" <?php echo $order_by_default_value == "price_desc" ? 'selected="selected"' : '';?>>Precio Mayor a menor</option>
                <option value="price_asc" <?php echo $order_by_default_value == "price_asc" ? 'selected="selected"' : '';?>>Precio Menor a Mayor</option>
                <option value="province_asc" <?php echo $order_by_default_value == "province_asc" ? 'selected="selected"' : '';?>>Provincia de la A a la Z</option>
                <option value="province_desc" <?php echo $order_by_default_value == "province_desc" ? 'selected="selected"' : '';?>>Provincia de la Z a la A</option>
                
            </select>
            <span id="properties-search-results-pager-order-by-order-text">Ordenar por:</span>

        
    </div>
    
    <div id="properties-search-results-pager-next-previous">
        
        <p id="properties-search-results-pager-current-page-display" ></p>
        <p id="properties-search-results-pager-next" class="next-pager-button"><span>Siguiente</span> <img alt="flecha-anterior" src="<?php base_url();?>/images/common/nextPagerButtonArrow.png"/></p>
        <p id="properties-search-results-pager-previous"  class="previous-pager-button"><img alt="flecha-anterior" src="<?php base_url();?>/images/common/previousPagerButtonArrow.png"/><span>Anterior</span></p>
        
    </div>
    <?php if(!$filtered_properties):?>
        
                <p class="info-messages">No hubo resultados</p>
    <?php endif;?>
    
    <div id="properties-search-results-pager-results-container">
        
    
        
        
    <?php foreach ($filtered_properties as $property):?>
        
        <?php if($i % $properties_in_a_page== 0):?>
            <div class="properties-search-results-pager-page">                    
        <?php endif;?>
        
    <div class="properties-search-results-pager-property">
        <img class="properties-search-results-pager-property-photo" src="<?php echo $property->main_photo?>" alt="foto-de-la-propiedad"/>
        <div class="properties-search-results-pager-property-info">
            <div class="properties-search-results-pager-property-title">
                <h2><?php echo $property->title;?></h2><img class="item-corner" src="<?php base_url();?>/images/propertiesSearchResults/headerUnion.png" alt="esquina-diagonal"/><h2 class="price">RD$ <?php echo $condition == "rent"? Numerizer::numerize($property->rent_price_dr):Numerizer::numerize($property->sell_price_dr);?></h2><img class="item-corner" src="<?php base_url();?>/images/common/grayCorner.png" alt="esquina-diagonal"/>
            </div>
            
            <div class="properties-search-results-pager-property-info-feautures">
                
                <ul>
                    <li>Tipo: <?php echo Environment_vars::$maps['id_to_html']['property_types'][$property->type];?></li>
                    
                    <?php $fernatured = $property->property_feature->where("id",Environment_vars::$maps['texts_to_id']['property_features']['fernatured'])->count();?>                                
                    <li>Amueblada: <?php echo $fernatured ? 'Si' : 'No'; ?></li>            
                    
                    <?php if($property->livingrooms):?>
                        <li>Habitaciones: <?php echo $property->livingrooms;?></li>
                    <?php endif;?>
                        
                        <?php if($property->bathrooms):?>
                    <li>Ba&ntilde;os: <?php echo $property->bathrooms;?></li>
                    <?php endif;?>
                    
                    <?php if($property->stories):?>
                    <li>Pisos: <?php echo $property->stories;?></li>
                    <?php endif;?>
                    
                  
            </ul>
            <img class="properties-search-results-pager-property-divisor" src="<?php base_url();?>/images/common/diagonalDivisor.png" alt="divisor-diagonal"/>
            <ul>
                  <?php if($property->kitchens):?>
                    <li>Cocinas: <?php echo $property->kitchens;?></li>
                    <?php endif;?>
                    
                <?php if($property->bathrooms):?>
                <li>Salas: <?php echo $property->bathrooms;?></li>
                <?php endif;?>
                
                <?php if($property->parkings):?>
                <li>Parqueos: <?php echo $property->parkings;?></li>
                <?php endif;?>
                
                <?php if($property->terrain):?>
                <li>Terreno: <?php echo $property->terrain;?> Mt2</li>
                <?php endif;?>
                
                
                <?php if($property->construction):?>
                <li>Construcci&oacute;n: <?php echo $property->construction;?> Mt2</li>
                <?php endif;?>
            </ul>
            </div>
            
            <p class="properties-search-results-pager-bottom">
                <a class="green-button properties-search-results-pager-details" href="<?php base_url();?>/propiedades/ver/<?php echo $property->id;?>">Ver Detalles</a>
                <label class="properties-search-results-pager-property-ref-number"> <span class="green-text">No. de referencia:</span> <?php echo $property->id;?></label>
            </p>
                
                

        </div>
        
<!--        <div class="properties-search-results-pager-divisor">
            
        </div>-->
    </div>
    
        <?php $i++;?>
        <?php if($i % $properties_in_a_page == 0 || $i == $number_of_properties):?>
            </div>
        <?php endif;?>
        
        
    <?php endforeach;?>
        
        
        

        
        
        
        
        
    
    </div>
    
    <div id="properties-search-results-pager-container">
        <p id="properties-search-results-pager-container-header">P&aacute;ginas </p>
        
        
        <a  href="#javascript"  class="no-decoration-anchor" id="properties-search-results-pager-previous-group"><<</a>
        <div id="properties-search-results-pager-pages">
            <?php for($i=1; $i <= $number_of_pages; $i++):?>

                <?php echo ($i-1) % $number_of_visible_numbers_in_pager == 0? '<div>' : '';?> 
                    <?php echo '<a class="no-decoration-anchor ajax-pager-page-number" href="#javascript"> ' .$i . '</a>';?>
                 <?php echo $i % $number_of_visible_numbers_in_pager == 0 || $i == $number_of_pages? '</div>' : '';?> 
            <?php endfor;?>
        </div>
    <a class="no-decoration-anchor"  href="#javascript" id="properties-search-results-pager-next-group">>></a>
    
    </div>
    
    
    
</div>

<?php endif;?>