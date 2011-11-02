<?php
$lowercase_property_type = Environment_vars::$maps['property_type_to_name'][$property->id];
$type = ucwords($lowercase_property_type);
?>
<div id="propiedad-viewer">
    <div id="propiedad-viewer-top">
        <div id="propiedad-viewer-header">
            <h2> <?php echo $property->title; ?> </h2>
            <span id="propiedad-viewer-sector"><?php echo $property->sector; ?></span>
        </div>


        <p id="propiedad-viewer-ref"><img src="/images/footer/footerSectionIcon1.png"/> REF: <?php echo $property->id; ?></p>


    </div>


    <div id="propiedad-viewer-images-side">
        <div id="propiedad-viewer-slideshow">
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>
            <img class="propiedad-viewer-slide" src="/images/centerSectionItem2Icon_1.png"/>

        </div>

        <div id="propiedad-viewer-detalles-side">
            <h2>Detalles</h2>
            <h3 id="propiedad-viewer-detalles-tipo"></h3>
            <ul id="propiedad-viewer-detalles">
                <li class="propiedad-viewer-detalle"><span>Tipo:</span> <?php echo $type; ?></li>
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
            <img id="propiedad-viewer-previous-pager" src="/images/propiedadesViewer/previousPager.png" class="propiedad-viewer-pager-selector"/>
            <div id="propiedad-viewer-slidesshow-pager">
                <ul>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                </ul>

                <ul>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                    <li><a><img class="propiedad-viewer-slideshow-selector" src="/images/centerSectionItem2Icon_1.png"/></a></li>
                </ul>

            </div>
            <img id="propiedad-viewer-next-pager" src="/images/propiedadesViewer/nextPager.png" class="propiedad-viewer-pager-selector"/>
        </div>
    </div>





</div>
