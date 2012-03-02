<?php


$property_id = isset($property_id) ? $property_id : null;
$property_neighborhood = isset($property_neighborhood) ? $property_neighborhood : false;
$property_type = isset($property_type) ? $property_type : false;
$property_condition = isset($property_condition) ? $property_condition : false;
$property_province = isset($property_province) ? $property_province : null;
$property_photos = isset($property_photos) ? $property_photos : null;
$property_coordenates = isset($property_coordenates) ? $property_coordenates : "19.487516,-70.718963";

$editing = isset($editing) ? $editing : false;

$class_to_hide_field_if_editing = $editing? 'hidden' :  '';

$error_messages = isset($error_messages)? $error_messages : false;

?>


    <div id="property-form-error-container" class="error-messages <?php echo $error_messages? '' : 'hidden'?>">
        <?php echo $error_messages; ?>
    </div>


<?php if (isset($info_messages) && $info_messages): ?>
    <div class="info-messages">
        <?php echo $info_messages; ?>
    </div>
<?php endif; ?>

<form id="property-form" method="post" action="<?php echo base_url(); ?>propiedades/validate<?php echo isset($property_id) ? '/' . $property_id : ''; ?>" enctype="multipart/form-data" accept-charset="UTF-8">
    <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber1.png"/><span>Detalles de Propiedad</span></p>
    <div id="property-form-description">
        
        <div id="property-form-description-column-container" class="<?php echo $class_to_hide_field_if_editing;?>">


            <ul id="property-form-description-column1" class="property-form-description-column">
                <li>
                    <label for="property-form-description-type">Tipo</label>

                    <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_types'], array("id" => "property-form-description-type", "name" => "property-type"), '', $property_type); ?>

                </li>
                <li>
                    <label for="property-form-description-title">T&iacute;tulo:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-title" name="property-title" class="required" title="El campo Título es requerido y debe poseer menos de 41 caracteres.</br>" <?php echo isset($property_title) ? 'value="' . $property_title . '"' : ''; ?>/>
                </li>


                
                <li>
                    <label for="property-form-description-neighborhood">Provincia:</label> 
            
                   <?php 
                   
            $provinces_content = new Provinces_select_cacheable_section("search-results-provinces", array("id" => "property-form-description-province", "name" =>"property-province"), "", $property_province);
            $cache_manager = new Cache_manager($provinces_content);

            $neigborhoods_selects = new Neighborhoods_selects_cacheable_section("front-page-neighborhoods", array("id" => "property-neighborhood-for-province", "class" => "property-form-neigborhood hidden", "name" =>"property-neighborhood"), "", $property_neighborhood);
            
            ?>
            
            
            <?php echo $cache_manager->get_content();?>
            
            <?php $cache_manager->cacheable_section = $neigborhoods_selects; ?>
            
          
            
                </li>
                
                <li>
                    
<label for="property-form-description-neighborhood">Sector:</label> 
                      
            <?php echo $cache_manager->get_content();?>
                    
                </li>

                <li>
                    <label for="property-form-description-condition">Vender/Alquilar:</label> 
                    <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_conditions'], array("id" => "property-form-description-condition", "name" => "property-condition"), '', $property_condition) ?>
                </li>

                <li id="property-form-description-address-container">
                    <label for="property-form-description-address">Direcci&oacute;n:<span class="required-text">*</span></label> 
                    <textarea id="property-form-description-address" name="property-address"><?php echo isset($property_address) ? $property_address : ''; ?> </textarea>
                </li>




            </ul>


            <ul id="property-form-description-column2" class="property-form-description-column">
                <li>
                    <label for="property-form-description-terrain" class="property-form-optional-field house-field hiddable building-field warehouse-field office-field lot-field land-field construction-project" >Terreno:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-terrain" name="property-terrain" class="property-form-optional-field house-field hiddable lot-field building-field warehouse-field office-field land-field construction-project required"  title="El campo Terreno es requerido y debe ser númerico.<br/>" <?php echo isset($property_terrain) ? 'value="' . $property_terrain . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-construction" class="property-form-optional-field house-field apartment-field hiddable penthouse-field mall-field building-field warehouse-field office-field construction-project">Construcci&oacute;n:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-construction apartment-field" name="property-construction" class="property-form-optional-field house-field mall-field penthouse-field apartment-field hiddable building-field warehouse-field office-field construction-project required" title="El campo Construcción es requerido y debe ser númerico.<br/>" <?php echo isset($property_construction) ? 'value="' . $property_construction . '"' : ''; ?>/>
                </li>

                <li>

                    <label for="property-form-description-stories" class="property-form-optional-field house-field apartment-field hiddable penthouse-field mall-field building-field warehouse-field office-field construction-project" >Niveles:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-stories" class="property-form-optional-field apartment-field house-field penthouse-field mall-field building-field warehouse-field office-field construction-project hiddable required"  title="El campo Niveles es requerido y debe ser númerico.<br/>" name="property-stories" <?php echo isset($property_stories) ? 'value="' . $property_stories . '"' : ''; ?>/>
                </li>
                <li>
                    <label for="property-form-description-bedrooms" class="property-form-optional-field house-field apartment-field hiddable penthouse-field building-field construction-project" >Habitaciones:<span class="required-text" >*</span></label> 
                    <input type="text" id="property-form-description-bedrooms" class="property-form-optional-field apartment-field house-field hiddable penthouse-field building-field construction-project required" title="El campo Habitaciones es requerido y debe ser númerico.<br/>" name="property-bedrooms" <?php echo isset($property_bedrooms) ? 'value="' . $property_bedrooms . '"' : ''; ?>/>
                </li>
            </ul>


            <ul id="property-form-description-column3" class="property-form-description-column">
                <li>
                    <label for="property-form-description-bathrooms" class="property-form-optional-field house-field apartment-field hiddable penthouse-field mall-field building-field warehouse-field office-field construction-project">Ba&ntilde;os:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-bathromms" class="property-form-optional-field house-field apartment-field hiddable penthouse-field mall-field building-field warehouse-field office-field construction-project required numeric" title="El campo Baños es requerido y debe ser númerico.<br/>" name="property-bathrooms" <?php echo isset($property_bathrooms) ? 'value="' . $property_bathrooms . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-livingrooms" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project">Salas:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-livingrooms" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project required" title="El campo Salas es requerido y debe ser númerico.<br/>" name="property-livingrooms" <?php echo isset($property_livingrooms) ? 'value="' . $property_livingrooms . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-kitchens" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project">Cocinas:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-kitchens" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project required" title="El campo Cocinas es requerido y debe ser númerico.<br/>" name="property-kitchens" <?php echo isset($property_kitchens) ? 'value="' . $property_kitchens . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-parkings" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project">Parqueos:<span class="required-text">*</span></label> 
                    <input type="text" id="property-form-description-parkings" name="property-parkings" class="property-form-optional-field house-field hiddable apartment-field penthouse-field building-field warehouse-field office-field construction-project required" title="El campo Parqueos es requerido y debe ser númerico.<br/>" <?php echo isset($property_parkings) ? 'value="' . $property_parkings . '"' : ''; ?>/>
                </li>


            </ul>


            <ul id="property-form-description-column4" class="property-form-description-column optional-view">

                <ul class="property-form-description-column optional-view" id="property-form-description-column4">

                    <?php $is_for_sale = $property_condition == Environment_vars::$maps['property_conditions']['sell'] || $property_condition == Environment_vars::$maps['property_conditions']['sell/rent'] || !$property_condition ? true : false; ?>
                    <?php $is_for_rent = $property_condition == Environment_vars::$maps['property_conditions']['rent'] || $property_condition == Environment_vars::$maps['property_conditions']['sell/rent'] ? true : false; ?>



                    <li class=" sell-condition-field <?php echo $is_for_sale ? '' : 'hidden'; ?>" >
                        <label for="property-form-description-sell-price-us">Precio de Venta $US:</label> 
                        <input type="text" name="property-sell-price-us" id="property-form-description-sell-price-us" <?php echo isset($property_sell_price_us) ? 'value="' . $property_sell_price_us . '"' : '' ?>/>
                    </li>

                    <li class=" sell-condition-field <?php echo $is_for_sale ? '' : 'hidden'; ?>">
                        <label for="property-form-description-sell-price-dr">Precio de Venta $RD:</label> 
                        <input type="text" name="property-sell-price-dr" id="property-form-description-sell-price-dr" <?php echo isset($property_sell_price_dr) ? 'value="' . $property_sell_price_dr . '"' : '' ?>/>
                    </li>




                    <li class="rent-condition-field <?php echo $is_for_rent ? '' : 'hidden'; ?>" >
                        <label for="property-form-description-rent-price-us">Precio de Alquiler $US:</label>
                        <input type="text" name="property-rent-price-us" id="property-form-description-rent-price-us" <?php echo isset($property_rent_price_us) ? 'value="' . $property_rent_price_us . '"' : '' ?>/>
                    </li>



                    <li class="rent-condition-field <?php echo $is_for_rent ? '' : 'hidden'; ?>" >
                        <label for="property-form-description-rent-price-dr">Precio de Alquiler $RD:</label> 
                        <input type="text" name="property-rent-price-dr" id="property-form-description-rent-price-dr" <?php echo isset($property_rent_price_dr) ? 'value="' . $property_rent_price_dr . '"' : '' ?>/>
                    </li>




                </ul>                    

            </ul>

        </div>



        <div id="property-form-description-close-places">


            <div id="property-form-description-description">

                <h3>Descripci&oacute;n de la propiedad:<span class="required-text">*</span></h3>
                <textarea id="property-form-description-price" name="property-description"><?php echo isset($property_description) ? $property_description : ''; ?> </textarea>
            </div>

            <div id="property-form-close-places">


                <h3>Lugares de Inter&eacute;s Cercanos</h3>

                <ul id="property-form-close-places-column1" class="property-form-close-places-column">
                    <li>
                        <input type="checkbox" name="close-malls" id="property-form-close-places-mall" <?php echo isset($close_malls) && $close_malls ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-places-mall">Centros Comerciales</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-supermarkets" id="property-form-close-places-supermarkets" <?php echo isset($close_supermarkets) && $close_supermarkets ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-places-supermarkets">Supermercados</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-grocery-stores" id="property-form-close-places-grocery-stores" <?php echo isset($close_grocery_stores) && $close_grocery_stores ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-places-grocery-stores">Colmados</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-schools" id="property-form-close-schools" <?php echo isset($close_schools) && $close_schools ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-schools">Centros Educativos</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-restaurants" id="property-form-close-restaurants" <?php echo isset($close_restaurants) && $close_restaurants ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-restaurants">Establecimientos de comida</label>
                    </li>
                    <li>
                        <input type="checkbox" name="close-bakeries" id="property-form-close-bakeries" <?php echo isset($close_bakeries) && $close_bakeries ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-bakeries">Panaderias</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-gyms" id="property-form-close-gyms" <?php echo isset($close_gyms) && $close_gyms ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-gyms">Gimnasios</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-public-transport" id="property-form-close-public-transport" <?php echo isset($close_public_transport) && $close_public_transport ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-public-transport">Transporte P&uacute;blico</label>
                    </li>

                    <li>
                        <input type="checkbox" name="close-hardware-stores" id="property-form-close-hardware-stores" <?php echo isset($close_hardware_stores) && $close_hardware_stores ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-hardware-stores">Ferreterias</label>
                    </li>
                    <li>
                        <input type="checkbox" name="close-drug-stores" id="property-form-close-drug-stores" <?php echo isset($close_drug_stores) && $close_drug_stores ? 'checked="on"' : ''; ?>/>
                        <label for="property-form-close-drug-stores">Farmacias</label>
                    </li>

                </ul>




            </div>

        </div>

        <div id="property-form-description-features">

            <h3>Caracter&iacute;sticas</h3>
            <ul id="property-form-description-features-column1" class="property-form-description-features-column">

                
                <li>
                    <input id="property-form-description-features-alarm" type="checkbox" name="alarm" <?php echo isset($alarm) && $alarm? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-alarm">Alarma</label> 
                </li>
                
                
                <li>
                    <input id="property-form-description-features-fernatured" type="checkbox" name="fernatured" <?php echo isset($fernatured) && $fernatured? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-fernatured">Amueblada</label> 
                </li>
                
                
                <li>
                    <input id="property-form-description-features-elevator" type="checkbox" name="elevator" <?php echo isset($elevator) && $elevator ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-elevator">Ascensor</label> 
                </li>

                <li>
                    <input id="property-form-description-features-game-area" type="checkbox" name="game-area" <?php echo isset($game_area) && $game_area ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-game-area">Área de juegos</label> 
                </li>

                <li>
                    <input id="property-form-description-features-wash-area" type="checkbox" name="wash-area" <?php echo isset($wash_area) && $wash_area ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-wash-area">Área de lavado</label> 
                </li>

                <li>
                    <input id="property-form-description-features-balcony" type="checkbox" name="balcony" <?php echo isset($balcony) && $balcony ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-service-room">Balcón</label> 
                </li>

                <li>
                    <input id="property-form-description-features-recreative-areas-bathrooms" type="checkbox" name="recreative-areas-bathrooms" <?php echo isset($recreative_areas_bathrooms) && $recreative_areas_bathrooms ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-recreative-areas-bathrooms">Baños en áreas recreativas</label> 
                </li>



                <li>
                    <input id="property-form-description-features-electric-water-heater" type="checkbox" name="electric-water-heater" <?php echo isset($electric_water_heater) && $electric_water_heater ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-electric-water-heater">Calentador de agua eléctrico</label> 
                </li>

                <li>
                    <input id="property-form-description-features-gas-water-heater" type="checkbox" name="gas-water-heater" <?php echo isset($gas_water_heater) && $gas_water_heater ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-gas-water-heater">Calentador de agua de gas</label> 
                </li>


                <li>
                    <input id="property-form-description-features-watch-man-stand" type="checkbox" name="watchman-stand" <?php echo isset($watchman_stand) && $watchman_stand ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-watch-man-stand">Caseta de guardianes</label> 
                </li>


                <li>
                    <input id="property-form-description-features-cistern" type="checkbox" name="cistern" <?php echo isset($cistern) && $cistern ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-cistern">Cisterna</label> 
                </li>


         




                <li>
                    <input id="property-form-description-features-equiped-kitchen" type="checkbox" name="equiped-kitchen" <?php echo isset($equiped_kitchen) && $equiped_kitchen ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-equiped-kitchen">Cocina equipada</label> 
                </li>

                <li>
                    <input id="property-form-description-features-dinning-room" type="checkbox" name="dinning-room" <?php echo isset($dinning_room) && $dinning_room ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-dinner-room">Comedor</label> 
                </li>


                <li>
                    <input id="property-form-description-features-antisismic-construction" type="checkbox" name="antisismic-construction" <?php echo isset($antisismic_construction) && $antisismic_construction ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-antisismic-construction">Construcción antisísmica</label> 
                </li>


                <li>
                    <input id="property-form-description-features-plaster-cornices" type="checkbox" name="plaster-cornices" <?php echo isset($plaster_cornices) && $plaster_cornices ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-plaster-cornices">Cornisas en yeso</label> 
                </li>
              

                <li>
                    <input id="property-form-description-features-utility-room-bathroom" type="checkbox" name="utility-room-bathroom" <?php echo isset($utility_room_bathroom) && $utility_room_bathroom ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-utility-room-bathroom">  Cuarto de servicio con baño</label> 
                </li>

                <li>
                    <input id="property-form-description-features-counter-top" type="checkbox" name="counter-top" <?php echo isset($counter_top) && $counter_top ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-counter-top">Desayunador</label> 
                </li>

                <li>
                    <input id="property-form-description-features-pantry" type="checkbox" name="pantry" <?php echo isset($pantry) && $pantry ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-pantry">Despensa</label> 
                </li>


                <li>
                    <input id="property-form-description-features-principal-room-bathroom" type="checkbox" name="principal-room-bathroom" <?php echo isset($principal_room_bathroom) && $principal_room_bathroom ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-principal-room-bathroom">Dormitorio principal con baño</label> 
                </li>

                <li>
                    <input id="property-form-description-features-trash-chute" type="checkbox" name="trash-chute" <?php echo isset($trash_chute) && $trash_chute ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-trash-chute">Ducto de basura </label> 
                </li>

                <li>
                    <input id="property-form-description-features-family-room" type="checkbox" name="family-room" <?php echo isset($family_room) && $family_room ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-family-room">Estar familiar</label> 
                </li>
            </ul>

            <ul id="property-form-description-featurescolumn2" class="property-form-description-features-column">

                <li>
                    <input id="property-form-description-features-common-gas" type="checkbox" name="common-gas" <?php echo isset($common_gas) && $common_gas ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-common-gas">Gas común</label> 
                </li>


                <li>
                    <input id="property-form-description-features-intercom" type="checkbox" name="intercom" <?php echo isset($intercom) && $intercom ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-intercom">Intercom</label> 
                </li>

                <li>
                    <input id="property-form-description-features-jacuzzi" type="checkbox" name="jacuzzi" <?php echo isset($jacuzzi) && $jacuzzi ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-jacuzzi">Jacuzzi</label> 
                </li>

                <li>
                    <input id="property-form-description-features-garden" type="checkbox" name="garden" <?php echo isset($garden) && $garden ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-garden">Jardín</label> 
                </li>

                <li>
                    <input id="property-form-description-features-kiosk" type="checkbox" name="kiosk" <?php echo isset($kiosk) && $kiosk ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-kiosk">Kiosco</label> 
                </li>

                <li>
                    <input id="property-form-description-features-lobby" type="checkbox" name="lobby" <?php echo isset($lobby) && $lobby ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-service-room">Lobby</label> 
                </li>
                <li>
                    <input id="property-form-description-features-double-garage" type="checkbox" name="double-garage" <?php echo isset($double_garage) && $double_garage ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-double-garage">Marquesina doble</label> 
                </li>

                <li>
                    <input id="property-form-description-features-half-bathroom" type="checkbox" name="half-bathroom" <?php echo isset($half_bathroom) && $half_bathroom ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-half-bathroom">Medio baño para visitas</label> 
                </li>


                <li>
                    <input id="property-form-description-features-receiver" type="checkbox" name="receiver" <?php echo isset($receiver) && $receiver ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-receiver">Recibidor</label> 
                </li>

        
                <li>
                    <input id="property-form-description-features-patio-with-garden" type="checkbox" name="patio-with-garden" <?php echo isset($patio_with_garden) && $patio_with_garden ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-patio-with-garden">Patio con jardín</label> 
                </li>

                <li>
                    <input id="property-form-description-features-pool" type="checkbox" name="pool" <?php echo isset($pool) && $pool ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-pool">Piscina</label> 
                </li>

                <li>
                    <input id="property-form-description-features-marmol-floors" type="checkbox" name="marmol-floors" <?php echo isset($marmol_floors) && $marmol_floors ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-marmol-floors">Pisos en mármol</label> 
                </li>

                <li>
                    <input id="property-form-description-features-electric-plant" type="checkbox" name="electric-plant" <?php echo isset($electric_plant) && $electric_plant ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-electric-plant">Planta eléctrica </label> 
                </li>
                
                <li>
                    <input id="property-form-description-features-basic-services" type="checkbox" name="basic-services" <?php echo isset($basic_services) && $basic_services? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-basic-services">Servicios B&aacute;sicos Pre-instalados</label> 
                </li>
                
                <li>
                    <input id="property-form-description-features-tinaco" type="checkbox" name="tinaco" <?php echo isset($tinaco) && $tinaco? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-tinaco">Tinaco</label> 
                </li>
                <li>
                    <input id="property-form-description-features-mahogany-terminations" type="checkbox" name="mahogany-terminations" <?php echo isset($mahogany_terminations) && $mahogany_terminations ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-mahogany-terminations">Terminación en caoba</label> 
                </li>

                <li>
                    <input id="property-form-description-features-terrace" type="checkbox" name="terrace" <?php echo isset($terrace) && $terrace ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-terrace">Terraza</label> 
                </li>

                <li>
                    <input id="property-form-description-features-pre-installed-services" type="checkbox" name="pre-installed-services" <?php echo isset($pre_installed_services) && $pre_installed_services ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-pre-installed-services">Todos los servicios pre-instalados</label> 
                </li>
                <li>
                    <input id="property-form-description-features-granite-countertops" type="checkbox" name="granite-countertops" <?php echo isset($granite_countertops) && $granite_countertops ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-granite-countertops">Topes de granito en la cocina</label> 
                </li>

                <li>
                    <input id="property-form-description-features-electric-gate" type="checkbox" name="electric-gate" <?php echo isset($electric_gate) && $electric_gate ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-electric-gate">Portón eléctrico a control remoto</label> 
                </li>

                <li>
                    <input id="property-form-description-features-walk-in-closet" type="checkbox" name="walk-in-closet" <?php echo isset($walk_in_closet) && $walk_in_closet ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-walk-in-closet">Walk in closet</label> 
                </li>

            </ul>

        </div>



    </div>




    <div class="form-divisor"></div>

    <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Fotos</span></p>
    <div id="property-form-photos">

        <p>Fotos del slideshow:</p>
        <img class="property-form-photo-notes" src="<?php echo base_url();?>images/common/imagesNote.png" alt="notas" />

        <ul id="property-form-photos-first-column" class="property-form-photos-column">
            <?php $image_helper = new Image_helper(); ?>
            <?php $i = 1; ?>
            <?php for ($i; $i < (PHOTOS_PER_PROPERTY / 2) +1; $i++): ?>
                <li>
                    <?php $zero_based_index = $i - 1; ?>
                    <span><?php echo $i; ?>.</span>
                    <?php if (isset($property_photos[$zero_based_index])): ?>
                        <img class="property-form-photos" src="<?php echo $image_helper->resize($property_photos[$zero_based_index]->path, 80, 49); ?>" alt="foto-de-la-propiedad"/>
                    <?php endif; ?>

                    <div>
                        <input  type="file" name="property-photo-<?php echo $i; ?>"/>

                        <?php if ($property_id && isset($property_photos[$zero_based_index])): ?>
                            <a class="no-decoration-anchor" href="/propiedades/delete_property_photo/<?php echo $property_id; ?>/<?php echo $property_photos[$zero_based_index]->id; ?>"><span class="delete-icon"></span>Eliminar Foto</a>
                        <?php endif; ?>
                    </div>

                </li>
            <?php endfor; ?>

        </ul>

        <ul id="property-form-photos-first-column" class="property-form-photos-column">
            <?php for ($i; $i <= PHOTOS_PER_PROPERTY; $i++): ?>
                <li>
                    <?php $zero_based_index = $i - 1; ?>

                    <span><?php echo $i; ?>.</span>
                    <?php if (isset($property_photos[$zero_based_index])): ?>
                        <img class="property-form-photos" src="<?php echo $image_helper->resize($property_photos[$zero_based_index]->path, 80, 49); ?>" alt="foto-de-la-propiedad"/>
                    <?php endif; ?>

                    <div>
                        <input value="Buscar" type="file" name="property-photo-<?php echo $i; ?>"/>

                        <?php if ($property_id && isset($property_photos[$zero_based_index])): ?>
                        <a class="no-decoration-anchor" href="/propiedades/delete_property_photo/<?php echo $property_id; ?>/<?php echo $property_photos[$zero_based_index]->id; ?>"><span class="delete-icon"></span>Eliminar Foto</a>
                        <?php endif; ?>
                    </div>


                </li>
            <?php endfor; ?>

        </ul>



    </div>


    <input type="hidden" id="property-form-coordenates" name="property-coordenates" value="<?php echo $property_coordenates; ?>"/>
    <?php if ($property_id) : ?>
        <input type="hidden" id="property-id" name="property-id" value="<?php echo $property_id; ?>"/>
    <?php endif; ?>


    <div class="form-divisor"></div>

    <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber3.png"/><span>Ubicaci&oacute;n</span></p>

    <div id="property-form-gmap-picker"></div>
    <img id="property-form-maps-note" src="<?php echo base_url();?>images/common/mapsNote.png" alt="instrucciones-del-mapa"/>
        
    <div class="form-buttons">
        <input id="property-form-send-button" class="form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
        <img id="property-form-clear-button" class="form-clear-button" src="/images/common/formCleanButton.png"/>
    </div>

</form>