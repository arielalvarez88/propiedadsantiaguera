<?php
$dr_price = isset($dr_price) ? $dr_price : '';
$us_price = isset($us_price) ? $us_price : '';

?>


<div id="overlay-property-calculator-container" class="overlay-container">
    
<h1 class="overlay-header">Calculadora de cuotas para pr&eacute;stamo Hipotecario</h1>
<div id="overlay-property-calculator" class="overlay-body">
    
    
    <table>
        <tr>
            <th>
                
            </th>
            <th>
                Peso
            </th>
            
            <th>
                Dollar
            </th>
        </tr>
        
        <tr>
            <td>
                Monto a Financiar
            </td>
            <td>
                <input id="overlay-property-calculator-dr" type="text" name="amount-dr" value="<?php echo $dr_price;?>"/>
            </td>
            
            <td>
                <input id="overlay-property-calculator-us" type="text" name="amount-us" value="<?php echo $us_price;?>"/>
            </td>
        </tr>
        
         <tr>
            <td>
                <span>Tasa de Inter&eacute;s (mensual)</span> 
            </td>
            <td>
                <input type="text" id="overlay-property-calculator-interest" name="interest"/>
            </td>
            <td>
            </td>
            
        </tr>
        
         <tr>
            <td>
                <span>A&ntilde;os de financiamiento<br/> </span> 
            </td>
            <td>
                <input type="text" id="overlay-property-calculator-years" name="years"/>
            </td>
            <td>
                <span id="overlay-property-calculator-moths" class="red-text"></span>
            </td>
            
        </tr>
        
        
        
    </table>
    
    
    
    <p id="overlay-property-calculator-calculate-button-container"><a id="overlay-property-calculator-calculate-button" class="green-button" href="">Calcular</a></p>
    <p id="overlay-property-calculator-results-cotainer">
        <span id="overlay-property-calculator-montly-pay-title">Pago Mensual</span>
        <span>RD$</span> <span id="overlay-property-calculator-rd-display"> </span>
        <span>US$</span> <span id="overlay-property-calculator-us-display"> </span>
    
    </p>
    
    
    
</div>
    </div>