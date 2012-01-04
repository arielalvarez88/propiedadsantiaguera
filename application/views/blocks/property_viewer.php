
<div id="propiedad-viewer">
    <div id="propiedad-viewer-top">
        <div id="propiedad-viewer-header">
            <h2> <?php echo $property->title; ?> </h2>
            <span id="propiedad-viewer-sector"><?php echo array_search($property->province, Environment_vars::$maps['texts_to_id']['provinces']); ?>, <?php echo array_search($property->neighborhood, Environment_vars::$maps['texts_to_id']['property_neighborhoods']); ?></span>
        </div>


        <p id="propiedad-viewer-ref"><img src="/images/footer/footerSectionIcon1.png"/> REF: <?php echo $property->id; ?></p>


    </div>


    <div id="propiedad-viewer-images-side">
        <div id="propiedad-viewer-slideshow">

            <?php $i = 0; ?>
            <?php foreach ($property_photos_paths as $property_photo_path): ?>
                <div <?php echo $i > 0 ? 'class="hidden"' : ''; ?>>
                    <img  class="propiedad-viewer-slide" src="<?php echo $property_photo_path['thumb']; ?>" alt="imagen-propiedad"/>                            
                    <a href="<?php echo $property_photo_path['image']; ?>" rel="property-gallery" class="property-slideshow no-decoration-anchor">
                        <img src="/images/common/searchIcon.png" alt="buscar-lupa"/>
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
                <li class="propiedad-viewer-detalle"><span>Habitaciones:</span> <?php echo $property->bedrooms; ?></li>            
                <li class="propiedad-viewer-detalle"><span>Ba&ntilde;os:</span> <?php echo $property->bathrooms; ?></li>
                <li class="propiedad-viewer-detalle"><span>Pisos:</span> <?php echo $property->stories; ?></li>
                <li class="propiedad-viewer-detalle"><span>Cocinas:</span> <?php echo $property->kitchens; ?></li>
                <li class="propiedad-viewer-detalle"><span>Salas:</span> <?php echo $property->livingrooms; ?></li>
                <li class="propiedad-viewer-detalle"><span>Parqueos:</span> <?php echo $property->parkings; ?></li>
                <li class="propiedad-viewer-detalle"><span>Terreno:</span> <?php echo $property->terrain; ?> Mt2.</li>
                <li class="propiedad-viewer-detalle"><span>Construcci&oacute;n:</span> <?php echo $property->construction; ?> Mt2.</li>

            </ul>


        </div>
    </div>






    <div id="propiedad-viewer-pagers">


        <div id="propiedad-viewer-pagers-pager">
            <img class="hidden" id="propiedad-viewer-previous-pager" src="/images/propiedadesViewer/previousPager.png" class="propiedad-viewer-pager-selector"/>
            <div id="propiedad-viewer-slidesshow-pager">


                <?php foreach ($property_photos_pagers_groups as $property_photos_pagers_group): ?>
                    <ul>
                        <?php foreach ($property_photos_pagers_group as $property_pager_photo): ?>
                            <li><a><?php echo $property_pager_photo; ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>

            </div>
            <img class="hidden" id="propiedad-viewer-next-pager" src="/images/propiedadesViewer/nextPager.png" class="propiedad-viewer-pager-selector"/>
        </div>
    </div>





</div>
