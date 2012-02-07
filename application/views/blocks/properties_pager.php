<?php
$language = Language_handler::get_user_prefered_language();

$this->lang->load("front_properties_pager",$language);

?>
<?php $section = isset($section) ? $section : ''; ?>
<?php $is_front_page = $section == "" || $section == "front-" ? true : false; ?>
<?php $title = $is_front_page ? $this->lang->line("front_properties_pager_header") : 'Mis propiedades'; ?>
<?php $properties_per_row = isset($properties_per_row) ? $properties_per_row : 4; ?>
<?php $rows_per_page = isset($rows_per_page) ? $rows_per_page : 4; ?>

<?php $properties = isset($properties) ? $properties : array(); ?>
<?php $number_of_properties = count($properties); ?>





<div id="<?php echo $section; ?>properties-pager-container">
    <div id="properties-pager">

        <?php if($title):?>
        <h2 id="properties-pager-header"><?php echo $title; ?></h2>
        <?php endif;?>




        <div id="properties-pager-properties-container">

            


            <?php $i = 0; ?>           
            <?php $number_of_printed_rows = 0;?>
            <?php foreach ($properties as $property): ?>



                <?php if ($is_new_page = $number_of_printed_rows % $rows_per_page == 0  &&  ($i % $properties_per_row == 0 || $i == $number_of_properties) ): ?>
            
            
                   <div class="properties-pager-page">
                <?php endif; ?>


                    <?php if ($is_new_of_row = $i % $properties_per_row == 0): ?>
                        <div class="properties-pager-row">
                        <?php endif; ?>

                        <?php $i++; ?>
                        <?php $number_of_printed_rows = (int) ($i/$properties_per_row);?>
                            
                        <div  class="properties-pager-property <?php echo $i % $properties_per_row == 0 || $number_of_properties == 1 || $i == $number_of_properties ? 'last' : ''; ?>">
                            <a class="no-decoration-anchor" href="<?php base_url();?>/propiedades/ver/<?php echo $property->id; ?>"><img class="properties-pager-property-screenshot" alt="property-photo" src="<?php echo $property->main_photo; ?>"/></a>
                            <a class="no-decoration-anchor" href="<?php base_url();?>/propiedades/ver/<?php echo $property->id; ?>"><h2 class="properties-pager-property-title"><?php echo $property->title; ?></h2></a>
                            <p class="properties-pager-property-type">
                                <span class="bold"><?php echo capitalize(Environment_vars::$maps['ids_to_text']['property_types'][$property->type]); ?></span>

                            </p>
                            <p class="properties-pager-property-price">

                                <span class="bold">Precio de venta:</span> <span class="">RD$ <?php echo Numerizer::numerize($property->sell_price_dr); ?></span>

                            </p>
                            <img src="<?php base_url();?>/images/common/lightGreenItemCorner.png" class="itemCorner" alt="esquina-verde"/>  
                            <p>
                                <?php
                                
                                $province_name =  Environment_vars::$maps['ids_to_text']['provinces'][$property->province];
                                $neighborhood_name = '';
                                
                                if(isset(Environment_vars::$maps['texts_to_id']['property_neighborhoods'][$province_name]))
                                {
                                      $provinces_neighborhoods = Environment_vars::$maps['texts_to_id']['property_neighborhoods'][$province_name];
                                        $neighborhood_name = array_search($property->neighborhood, $provinces_neighborhoods);
                                }
                                      
                                ?>
                                <?php echo $province_name; ?> <?php echo $neighborhood_name ? ','.$neighborhood_name : '' ;?>
                            </p>
                        </div>


                    <?php if ($is_end_of_row = $i % $properties_per_row == 0 || $i == $number_of_properties): ?>
                        </div>
                    <?php endif;?>

                    <?php if ($is_last_of_page = ( $number_of_printed_rows % $rows_per_page  == 0 && $i%$properties_per_row == 0 )|| $i == $number_of_properties): ?>
                        </div>
                    <?php endif;?>

                    <?php endforeach; ?>





                </div>

        <div id="properties-pager-next-previous" >
            <p id="properties-pager-next-previous-numbers" ></p>

            
            <a id="properties-pager-next-previous-next-button" >Siguiente <span>></span> </a>
            
                        <a id="properties-pager-next-previous-previous-button"><span><</span> Anterior</a>
        </div>
            </div>
        </div>