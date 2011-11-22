<?php

    $selected_property_neighborhood =  isset($selected_property_neighborhood) ? $selected_property_neighborhood : null;
        
        $selected_property_type = isset($selected_property_type) ? $selected_property_type : null;
        
        $selected_property_ref_number = isset($selected_property_ref_number) ? $selected_property_ref_number : null;
        
        $selected_property_condition = isset($selected_property_condition) ? $selected_property_condition : null;


?>

<form id="basic-filter">
    <h2>B&uacute;squeda de propiedades</h2>
    <div id="basic-filter-top">
        <div id="basic-filter-top-left-size">
            
            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_conditions'], array("id" => "basic-filter-condition", "name" => "condition"), "Condición", $selected_property_condition); ?>
 

            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_neighborhoods'], array("id" => "basic-filter-sector", "name" => "neighborhood"), "Sector", $selected_property_neighborhood); ?>

        </div>

        <div id="basic-filter-top-right-size">

            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_types'], array("id" => "basic-filter-sector", "name" => "type"), "Tipo de vivienda", $selected_property_type); ?>

            <input type="text" name="ref-number" data-null-value="Número de referencia" value="<?php echo $selected_property_ref_number? $selected_property_ref_number : 'Número de referencia';?>" id="basic-filter-reference-number"/>

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
            <input id="basic-filter-search-button" type="image" src="/images/basic_filter/filter_search_button.png" />
            <a href="/ajax/view_loader/forms/advanced_filter" id="basic-filter-advanced-filter-link" >B&uacute;squeda <br/>Avanzada</a>
        </div>




    </div>

</form>