<?php $section = isset($section) ? $section . '-' : ''; ?>
<?php $is_front_page = $section == "" || $section == "front-" ? true : false; ?>
<?php $title = $is_front_page ? 'Propiedades más visitadas' : 'Mis propiedades'; ?>
<?php $properties = isset($properties) ? $properties : null; ?>


<div id="<?php echo $section; ?>properties-pager-container">
    <div id="properties-pager">

        <h2 id="properties-pager-header"><?php echo $title; ?></h2>





        <div id="properties-pager-properties-container">


            <?php if ($is_front_page): ?>

                <div  class="properties-pager-property ">
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


                <div class="properties-pager-property last">
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


            <?php else: ?>

                <?php $i=1;?>            
                <?php foreach ($properties as $property): ?>
            
            <div  class="properties-pager-property <?php echo ($i%3==0) || ($i == count($properties))?  'last' : '';?>">
                <a class="no-decoration-anchor" href="/propiedades/ver/<?php echo $property->id;?>"><img class="properties-pager-property-screenshot" alt="property-photo" src="<?php echo $property->main_photo; ?>"/></a>
                        <a class="no-decoration-anchor" href="/propiedades/ver/<?php echo $property->id;?>"><h2 class="properties-pager-property-title"><?php echo $property->title; ?></h2></a>
                        <p class="properties-pager-info">
                            <span class="properties-pager-proerty-sector"><?php echo $property->neighbothood; ?></span>
                            <br/>
                            Precio:<span class="properties-pager-property-price"><?php echo $property->sell_price_dr; ?></span>
                        </p>
                        <p class="properties-pager-desc">
                            Excelente Complejo Residencial Cerrado<br/>
                            en la Urb. El Despertar.
                        </p>
                    </div>
                    <?php $i++;?>
                <?php endforeach; ?>

            <?php endif; ?>





        </div>

    </div>
</div>