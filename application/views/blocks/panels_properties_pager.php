
<?php
$section = $section ? $section : null;

$properties = $properties ? $properties : array();

$five_days_in_seconds = 60 * 60 * 24 * 5;

$image_helper = new Image_helper();
$i = 1;
?> 


<div id="panels-properties-pager-container" class="optional-view">
<?php if($properties):?>
    <h1>Resultados de la b&uacute;squeda</h1>
    <?php else:?>
        <h1>No existen propiedades en esta categor&iacute;a.</h1>
    <?php endif;?>
    
    <form id="panels-properties-pager" action="<?php base_url();?>/propiedades/guardar_cambios_publicar/" method="post">
        <input type="hidden" name="properties-matched-count" value="<?php echo count($properties); ?>" />
        <?php foreach ($properties as $property): ?>


            <?php $property_posted_time_in_seconds = strtotime(NOW()) - strtotime($property->post_date); ?>

            
            <div class="panels-properties-pager-property <?php echo $i % 2 == 0 ? "even" : "odd" ?>">
                <h2 class="panels-properties-pager-property-title"><a class="no-decoration-anchor  panels-properties-pager-property-info-title-link" href="<?php base_url();?>/propiedades/ver/<?php echo $property->id; ?>"><?php echo $property->title; ?></a></h2>            

                <img src="<?php echo $image_helper->resize($property->main_photo, 194, 125); ?>" alt="foto-de-la-propiedad"/>

                <div class="panels-properties-pager-property-info">



                    <div class="panels-properties-pager-property-info-buttons">


                        <?php if ($section == 'published'): ?>
                            <?php
                            $now_in_timestamp = strtotime('now');
                            $property_posted_time_in_seconds = strtotime($property->post_date);
                            $property_seconds_posted = $now_in_timestamp - $property_posted_time_in_seconds;
                            $property_expiriration_date_in_timestamp = $property_posted_time_in_seconds + THIRTY_ONE_DAYS_IN_SECONDS;
                            $property_seconds_left = $property_expiriration_date_in_timestamp - ($property_posted_time_in_seconds + $property_seconds_posted);
                            $property_days_left = floor($property_seconds_left / (60 * 60 * 24));
                            
                            
                            $reactivate_property_message = $property_days_left < 5 && !$property->auto_reactivation;
                            ?>
                        <p >Tiempo Restante: <?php echo $property_days_left; ?> d&iacute;as</p>
                        

                            <div>
                                <a href="<?php base_url();?>/propiedades/ver/<?php echo $property->id; ?>" class="no-decoration-anchor">Detalles</a> 
                                <input class="panels-properties-pager-property-info-buttons-reactivation" data-message-selector="#panels-properties-pager-property-info-buttons-reactivate-message-<?php echo $property->id; ?>" data-property-id="<?php echo $property->id ?>" id="panels-properties-pager-property-info-buttons-reactivation-<?php echo $property->id; ?>" name="panels-properties-pager-property-info-buttons-ractivation-<?php echo $property->id; ?>" type="checkbox"<?php echo $property->auto_reactivation ? 'checked="checked"' : ''; ?> />

                                <label for="panels-properties-pager-property-info-buttons-reactivation">Auto reactivaci&oacute;n </label>
                            </div>
                            <p>Visitas: <?php echo $property->visits; ?></p>
                            <p>N&uacute;mero de referencia: <?php echo $property->id; ?></p>
                            <?php if ($reactivate_property_message): ?>
                                <p class="red-text panels-properties-pager-property-info-buttons-reactivate-message" id="panels-properties-pager-property-info-buttons-reactivate-message-<?php echo $property->id; ?>">Reactivar propiedad lo antes posibles</p>
                            <?php endif; ?>


                        <?php else: ?>
                            <div>
                                <lable for="panels-properties-pager-property-info-buttons-publish">Publicar</lable>
                                <input name="publish-property-<?php echo $property->id; ?>" id="panels-properties-pager-property-info-buttons-publish" type="checkbox" <?php echo $property->display_property ? 'checked="checked" disabled="disabled"' : ""; ?>/>


                            </div>

                            <a href="<?php base_url();?>/propiedades/editar_propiedades/<?php echo $property->id; ?>" class="no-decoration-anchor">Editar</a> 
                            <a href="<?php base_url();?>/propiedades/eliminar/<?php echo $property->id; ?>" class="no-decoration-anchor">Eliminar</a> 
                            <p id="panels-properties-pager-property-info-buttons-days-left">N&uacute;mero de referencia: <?php echo $property->id; ?></p>

                        <?php endif; ?>



                    </div>                                                            
                </div>

            </div>


            <?php $i++; ?>
        <?php endforeach; ?>


        <?php if ($section == 'created'): ?>
            <input class="form-send-button" id="panels-properties-pager-submit-button" type="image" src="<?php base_url();?>/images/panelsPropertiesPager/submitButton.png"/>
        <?php endif; ?>
    </form>

</div>