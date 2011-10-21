
<ul class="property-form-description-column optional-view" id="property-form-description-column4">
    
    <?php if(!(strpos($status, "sell") === false)):?>
           <li>
                <label for="property-form-description-sell-price-us">Precio de Venta $US:</label> 
                <input type="text" name="property-sell-price-us" id="property-form-description-sell-price-us" <?php echo isset($repopulate['property_sell_price_us'])? 'value="'.$repopulate['property_sell_price_us'].'"' : ''?>/>
            </li>

            <li>
                <label for="property-form-description-sell-price-dr">Precio de Venta $RD:</label> 
                <input type="text" name="property-sell-price-dr" id="property-form-description-sell-price-dr" <?php echo  isset($repopulate['property_sell_price_dr'])? 'value="'.$repopulate['property_sell_price_dr'].'"' : ''?>/>
            </li>
            
     <?php endif;?>            

      <?php if(!(strpos($status, "rent") === false)):?>
            <li>
                <label for="property-form-description-rent-price-us">Precio de Alquiler $US:</label> 
                <input type="text" name="property-rent-price-us" id="property-form-description-rent-price-us" <?php echo isset($repopulate['property_rent_price_us']) ? 'value="'.$repopulate['property_rent_price_us'].'"' : ''?>/>
            </li>
            
            

            <li>
                <label for="property-form-description-rent-price-dr">Precio de Alquiler $RD:</label> 
                <input type="text" name="property-rent-price-dr" id="property-form-description-rent-price-dr" <?php echo isset( $repopulate['property_rent_price_dr'])? 'value="'.$repopulate['property_rent_price_dr'].'"' : ''?>/>
            </li>
            
      <?php endif;?>
            
           
</ul>