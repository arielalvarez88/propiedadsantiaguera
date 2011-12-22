<?php
$dr_sell_price = isset($dr_sell_price) ? $dr_sell_price : null;
$us_sell_price = isset($us_sell_price) ? $us_sell_price : null;
$dr_rent_price = isset($dr_rent_price) ? $dr_rent_price : null;
$us_rent_price = isset($us_rent_price) ? $us_rent_price : null;
?>

<div id="price-currency">
    
    <?php if($dr_sell_price):?>
        <h1 class="dr-price-field">Venta: RD$ <?php echo $dr_sell_price;?></h1>
    <?php endif;?>
        
        <?php if($dr_rent_price):?>
        <h1 class="dr-price-field">Alquiler: RD$ <?php echo $dr_rent_price;?></h1>
    <?php endif;?>
        
        <?php if($us_sell_price):?>
        <h1 class="us-price-field">Venta: US$ <?php echo $us_sell_price;?></h1>
    <?php endif;?>
        
        <?php if($us_rent_price):?>
        <h1 class="us-price-field">Alquiler: US$ <?php echo $us_rent_price;?></h1>
    <?php endif;?>
        
    <select>
        <option value="dr">Precio en pesos</option>
        <option value="us">Precio en dolares</option>
    </select>
    
    
</div>