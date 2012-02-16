<?php

$property_photos_paths= isset($property_photos_paths) ? $property_photos_paths : null;

?>
<div id="propiedad-viewer">
    <div id="propiedad-viewer-top">
        <div id="propiedad-viewer-header">
            <h2> <?php echo $property->title; ?> </h2>
            <?php $province_text =   array_search($property->province, Environment_vars::$maps['texts_to_id']['provinces']);?>
            <span id="propiedad-viewer-sector"><?php echo $province_text;?>, <?php echo array_search($property->neighborhood, Environment_vars::$maps['texts_to_id']['property_neighborhoods'][$province_text]); ?></span>
        </div>


        <p id="propiedad-viewer-ref"><img src="<?php base_url();?>/images/footer/footerSectionIcon1.png"/> REF: <?php echo $property->id; ?></p>


    </div>


    <div id="propiedad-viewer-images-side">
        
        
        <div id="propiedad-viewer-slideshow">

    
      <?php if($property->video):?>
              <div id="property-viewer-video">
                    <iframe class="video" width="449" height="254" src="<?php echo $property->video;?>&wmode=opaque" frameborder="0" allowfullscreen ></iframe>
            </div>
            <?php endif;?>
            
            <?php $i = 0; ?>
            <?php foreach ($property_photos_paths as $property_photo_path): ?>
                <div <?php echo $i > 0 ? 'class="hidden"' : ''; ?>>
                    <img  class="propiedad-viewer-slide" src="<?php echo $property_photo_path['thumb']; ?>" alt="imagen-propiedad"/>                            
                    <a href="<?php echo $property_photo_path['image']; ?>" rel="property-gallery" class="property-slideshow no-decoration-anchor">
                        <img src="<?php base_url();?>/images/common/searchIcon.png" alt="buscar-lupa"/>
                        <span>Ampliar im&aacute;gen</span>
                    </a>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
            
           

            
        </div>

        <div id="propiedad-viewer-detalles-side">
            <h2>Detalles</h2>
            <h3 id="propiedad-viewer-detalles-tipo"></h3>
            <ul id="propiedad-viewer-detalles">
                <li class="propiedad-viewer-detalle"><span>Tipo:</span> <?php echo $property_type; ?></li>
                
                <?php $fernatured = $property->property_feature->where("id",Environment_vars::$maps['texts_to_id']['property_feature']['fernatured'])->count();?>
                
                

                    <li class="propiedad-viewer-detalle"><span>Amueblada:</span> <?php echo $fernatured ? 'Si' : 'No'; ?></li>            
                
                
                <?php if($property->bedrooms):?>
                    <li class="propiedad-viewer-detalle"><span>Habitaciones:</span> <?php echo $property->bedrooms; ?></li>            
                <?php endif;?>
                    
                <?php if($property->bathrooms):?>
                    <li class="propiedad-viewer-detalle"><span>Ba&ntilde;os:</span> <?php echo $property->bathrooms; ?></li>
                <?php endif;?>
                    
                <?php if($property->stories):?>
                    <li class="propiedad-viewer-detalle"><span>Niveles:</span> <?php echo $property->stories; ?></li>
                <?php endif;?>
                    
                <?php if($property->kitchens):?>
                    <li class="propiedad-viewer-detalle"><span>Cocinas:</span> <?php echo $property->kitchens;?></li>
                <?php endif;?>
                
                <?php if($property->livingrooms):?>
                <li class="propiedad-viewer-detalle"><span>Salas:</span> <?php echo $property->livingrooms;?></li>
                <?php endif;?>
                
                <?php if($property->parkings):?>
                <li class="propiedad-viewer-detalle"><span>Parqueos:</span> <?php echo $property->parkings; ?></li>
                <?php endif;?>
                
                <?php if($property->terrain):?>
                    <li class="propiedad-viewer-detalle"><span>Terreno:</span> <?php echo $property->terrain;?> Mt2.</li>
                <?php endif;?>
                
                                <?php if($property->construction):?>
                <li class="propiedad-viewer-detalle"><span>Construcci&oacute;n:</span> <?php echo $property->construction;?> Mt2.</li>
                <?php endif;?>
                
                
                

            </ul>

        </div>
    </div>






    <div id="propiedad-viewer-pagers">
        
        
        
        
        <div id="propiedad-viewer-pagers-pager">
            <img  id="propiedad-viewer-previous-pager" src="<?php base_url();?>/images/propiedadesViewer/previousPager.png" class="propiedad-viewer-pager-selector"/>
            <div id="propiedad-viewer-slidesshow-pager">

                <?php foreach ($property_photos_pagers_groups as $property_photos_pagers_group): ?>
                    <ul>
                        <?php foreach ($property_photos_pagers_group as $property_pager_photo): ?>
                                                
                            <li><a><?php echo $property_pager_photo; ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>

            </div>
            
                
            <img  id="propiedad-viewer-next-pager" src="<?php base_url();?>/images/propiedadesViewer/nextPager.png" class="propiedad-viewer-pager-selector"/>
  
        </div>
    </div>





</div>
