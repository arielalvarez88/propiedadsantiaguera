<?php

    $selected_property_neighborhood =  isset($selected_property_neighborhood) ? $selected_property_neighborhood : null;
        
        $selected_property_type = isset($selected_property_type) ? $selected_property_type : null;
        
        $selected_property_ref_number = isset($selected_property_ref_number) ? $selected_property_ref_number : null;
        
        $selected_property_condition = isset($selected_property_condition) ? $selected_property_condition : null;
        
        $selected_property_province =  isset($selected_property_province) ? $selected_property_province : null;
        
        $section = isset($section) ? $section : null;


?>
<div id="<?php echo $section;?>basic-filter-container">
    

<form id="basic-filter" accept-charset="UTF-8">
    <h2>B&uacute;squeda de propiedades <a id="basic-filter-search-by-ref-number" href="/ajax/view_loader/blocks/overlay_search_ref_number">Buscar por # de referencia</a></h2>
    <div id="basic-filter-top">
        <div id="basic-filter-top-left-size">
            
            

            <?php $i=0;?>
            <?php $provinces = array();?>
            <?php $neigborhoods_selects = array();?>
            <?php foreach(Environment_vars::$maps['texts_to_id']['property_neighborhoods'] as $province => $neighborhoods):?>
                
                <?php $class = $i==0? 'filter-neigborhoods' : 'filter-neigborhoods hidden';?>
                <?php $provinces[$province] =  Environment_vars::$maps['texts_to_id']['provinces'][$province]; ?>
                <?php $neighborhoods_input_name = $i == 0 ? "neighborhood" : null;?>
                <?php $neigborhoods_selects[] = Html_helper::get_select_from_key_value($neighborhoods, array("id" => "basic-filter-neighborhood-for-province-".Environment_vars::$maps['texts_to_id']['provinces'][$province], "name" => $neighborhoods_input_name, "class" => $class, "data-province"=> Environment_vars::$maps['texts_to_id']['provinces'][$province]), "Sector", $selected_property_neighborhood);?>
            
                <?php $i++;?>
            <?php endforeach;?>
            
            
            <?php echo Html_helper::get_select_from_key_value($provinces, array("id" => "basic-filter-province", "name" => "province"), "Provincia", $selected_property_province);?>
            <?php echo implode("",$neigborhoods_selects)?>

        </div>

        <div id="basic-filter-top-right-size">
            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_conditions_for_filter'], array("id" => "basic-filter-condition", "name" => "condition"), "Condición", $selected_property_condition); ?>
            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_types'], array("id" => "basic-filter-sector", "name" => "type"), "Tipo de vivienda", $selected_property_type); ?>

<!--            <input type="text" name="ref-number" data-null-value="Número de referencia" value="<?php echo $selected_property_ref_number? $selected_property_ref_number : 'Número de referencia';?>" id="basic-filter-reference-number"/>-->

        </div>
    </div>






    <div id="basic-filter-bottom">

        <div id="basic-filter-bottom-left-size">
            <p id="basic-filter-price-slider-header">Precios:</p> 
            <div id="basic-filter-price-slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">

            </div>


            <p id="basic-filter-price-slider-display"><span id="basic-filter-price-slider-min-display">$1,000,000</span> <span id="basic-filter-price-slider-max-display">Más de $100,000,000</span></p>

        </div>

        <div id="basic-filter-bottom-right-size">
            
               
            <input id="basic-filter-search-button" type="image" src="<?php base_url();?>/images/basic_filter/filter_search_button.png" class="input-button"/>

                        <a href="<?php base_url();?>/ajax/view_loader/forms/advanced_filter" id="basic-filter-advanced-filter-link" >B&uacute;squeda Avanzada</a>
        </div>




    </div>

</form>
    
    </div>