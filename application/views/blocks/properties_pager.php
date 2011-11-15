<?php $section  = isset($section )? $section.'-' : '';?>
<?php $is_front_page = $section=="" || $section=="front-" ? true : false;?>
<?php $title = $is_front_page? 'Propiedades más visitadas' : 'Mis propiedades';?>
<div id="<?php echo $section;?>properties-pager-container">
<div id="properties-pager">
    
    <h2 id="properties-pager-header"><?php echo $title;?></h2>
    
        
    <div id="properties-pager-properties-container">
            <div  class="properties-pager-property ">
                <img class="properties-pager-property-screenshot" alt="property-photo" src="/images/common/propertyThumb.png"/>
                <h2 class="properties-pager-property-title">Titulo de la casa</h2>
                <p class="properties-pager-info">
                    <span class="properties-pager-proerty-sector">Cerros de gurabo</span>
                    <br/>
                    Precio:<span class="properties-pager-property-price">RD$ 10,000,000</span>
                </p>
                <p class="properties-pager-desc">
                    Excelente Complejo Residencial Cerrado<br/>
                    en la Urb. El Despertar.
                </p>
            </div>
        
        
        <div class="properties-pager-property last" >
            <img class="properties-pager-property-screenshot" alt="property-photo" src="/images/common/propertyThumb.png"/>
                <h2 class="properties-pager-property-title">Titulo de la casa</h2>
                <p class="properties-pager-info">
                    <span class="properties-pager-proerty-sector">Cerros de gurabo</span>
                    <br/>
                    Precio:<span class="properties-pager-property-price">RD$ 10,000,000</span>
                </p>
                <p class="properties-pager-desc">
                    Excelente Complejo Residencial Cerrado<br/>
                    en la Urb. El Despertar.
                </p>
            </div>
        
        <?php if(!$is_front_page): ?>
         
            <div  class="properties-pager-property properties-pager-last-property">
                <img class="properties-pager-property-screenshot" alt="property-photo" src="/images/common/propertyThumb.png"/>
                <h2 class="properties-pager-property-title">Titulo de la casa</h2>
                <p class="properties-pager-info">
                    <span class="properties-pager-property-sector">Cerros de gurabo</span>
                    Precio:<span class="properties-pager-property-price">RD$ 10,000,000</span>
                </p>
                <p class="properties-pager-desc">
                    Excelente Complejo Residencial Cerrado<br/>
                    en la Urb. El Despertar.
                </p>
            </div>
        
        
        <div class="properties-pager-property">
            <img class="properties-pager-property-screenshot" alt="property-photo" src="/images/common/propertyThumb.png"/>
                <h2 class="properties-pager-property-title">Titulo de la casa</h2>
                <p class="properties-pager-info">
                    <span class="properties-pager-proerty-sector">Cerros de gurabo</span>
                    Precio:<span class="properties-pager-property-price">RD$ 10,000,000</span>
                </p>
                <p class="properties-pager-desc">
                    Excelente Complejo Residencial Cerrado<br/>
                    en la Urb. El Despertar.
                </p>
            </div>
        <?php endif;?>
        
    </div>
    
</div>
</div>