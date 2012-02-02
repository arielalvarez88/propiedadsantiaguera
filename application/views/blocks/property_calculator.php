<?php

$property = isset($property) ? $property : null;
$property_us_price = $property->sell_price_us;
$property_dr_price = $property->sell_price_dr;


?>


<?php if($property->condition == Environment_vars::$maps['texts_to_id']['property_conditions']['Venta']):?>
<a class="no-decoration-anchor" href="/overlay_calculator/get_view<?php echo $property_dr_price? '/'.$property_dr_price : '';?><?php echo $property_us_price ? '/'.$property_us_price : '';?>" id="property-calculator-container">
    <div id="property-calculator">
        <p>Calcula las cuotas mensuales</p>
        <span></span>
    </div>
    
</a>
<?php endif;?>