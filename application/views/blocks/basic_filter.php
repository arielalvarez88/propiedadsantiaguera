<?php
require_once realpath("./application/libraries/Provinces_select_cacheable_section.php");
require_once realpath("./application/libraries/Cache_manager.php");
require_once realpath("./application/libraries/Neighborhoods_selects_cacheable_section.php");

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
            
            


            
            <?php 

            
            
            $provinces_content = new Provinces_select_cacheable_section("front-page-provinces", array("id" => "basic-filter-province", "name" => "province"), "Provincia", $selected_property_province);            
            $cache_manager = new Cache_manager($provinces_content);
            
            
            
            
            
            $neigborhoods_selects = new Neighborhoods_selects_cacheable_section("front-page-neighborhoods", array("id" => "basic-filter-neighborhood-for-province", "class" => "filter-neigborhoods hidden"), "Sector", $selected_property_neighborhood);
                        $delete_the_province_section_if_cached = $selected_property_province;
            $delete_the_neighborhood_section_if_cached = $selected_property_neighborhood; 
            
            if($delete_the_province_section_if_cached)
                $cache_manager->clean_cache_variable ($provinces_content->get_cache_key());
            if($delete_the_neighborhood_section_if_cached)
                $cache_manager->clean_cache_variable ($neigborhoods_selects->get_cache_key());
            
            ?>
            
            
            <?php echo $cache_manager->get_content();?>
            
            <?php $cache_manager->cacheable_section = $neigborhoods_selects; ?>
            
            <select id="basic-filter-neighborhood-for-province-null" data-province="null" class="filter-neigborhoods" data-null-value ="null" name="neighborhood">
                <option value="null" >Sector</option>
            </select>
            
            <?php echo $cache_manager->get_content();?>
            
            
            

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