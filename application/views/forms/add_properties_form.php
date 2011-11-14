

<?php if (isset($errors) && $errors): ?>
    <div class="error-messages">
        <?php echo $errors; ?>
    </div>
<?php endif; ?>

<?php if (isset($info_messages) && $info_messages): ?>
    <div class="info-messages">
        <?php echo $info_messages; ?>
    </div>
<?php endif; ?>

<form id="property-form" method="post" action="<?php echo base_url(); ?>propiedades/validate<?php echo isset($property_edit_id) ? '/' . $property_edit_id : ''; ?>" enctype="multipart/form-data">
    <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber1.png"/><span>Descripci&oacute;n de Propiedad</span></p>
    <div id="property-form-description">
        <div id="property-form-description-column-container">


            <ul id="property-form-description-column1" class="property-form-description-column">
                <li>
                    <label for="property-form-description-type">Tipo</label>
                    <select id="property-form-description-type" name="property-type">
                        <option value="house" <?php echo!isset($property_type) || $property_type == 'casa' ? 'selected="selected"' : ''; ?>>
                            Casa
                        </option>

                        <option value="apartment" <?php echo isset($property_type) && $property_type == 'apartment' ? 'selected="selected"' : ''; ?>>
                            Apartamento
                        </option>

                        <option value="lot" <?php echo isset($property_type) && $property_type == 'lot' ? 'selected="selected"' : ''; ?>>
                            Solar
                        </option>

                        <option value="penthouse" <?php echo isset($property_type) && $property_type == 'penthouse' ? 'selected="selected"' : ''; ?>>
                            Penthouse
                        </option>

                        <option value="mall" <?php echo isset($property_type) && $property_type == 'mall' ? 'selected="selected"' : ''; ?>>
                            Local Comercial
                        </option>

                        <option value="building" <?php echo isset($property_type) && $property_type == 'building' ? 'selected="selected"' : ''; ?>>
                            Edificio
                        </option>


                        <option value="warehouse" <?php echo isset($property_type) && $property_type == 'warehouse' ? 'selected="selected"' : ''; ?>>
                            Nave Industrial
                        </option>


                        <option value="office" <?php echo isset($property_type) && $property_type == 'office' ? 'selected="selected"' : ''; ?>>
                            Oficina
                        </option>

                        <option value="land" <?php echo isset($property_type) && $property_type == 'land' ? 'selected="selected"' : ''; ?>>
                            Finca
                        </option>
                    </select>
                </li>
                <li>
                    <label for="property-form-description-title">T&iacute;tulo:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-title" name="property-title" <?php echo isset($property_title) ? 'value="' . $property_title . '"' : ''; ?>/>
                </li>
                <li>
                    <label for="property-form-description-sector">Sector:</label> 
                    <input type="text" id="property-form-description-sector" name="property-sector" <?php echo isset($property_sector) ? 'value="' . $property_sector . '"' : ''; ?>/>
                </li>



                <li>
                    <label for="property-form-description-status">Vender/Alquilar:</label> 
                    <select id="property-form-description-status" name="property-status">
                        <option value="sell" <?php echo!isset($property_status) || $property_status == 'sell' ? 'selected="selected"' : ''; ?>>
                            Vender
                        </option>
                        <option value="rent" <?php echo isset($property_status) && $property_status == 'rent' ? 'selected="selected"' : ''; ?>>
                            Alquilar
                        </option>
                        <option value="sell-rent" <?php echo isset($property_status) && $property_status == 'sell-rent' ? 'selected="selected"' : ''; ?>>
                            Vender/Alquilar
                        </option>
                    </select>
                </li>

                <li id="property-form-description-address-container">
                    <label for="property-form-description-address">Direcci&oacute;n:<span class="required">*</span></label> 
                    <textarea id="property-form-description-address" name="property-address"><?php echo isset($property_address) ? $property_address : ''; ?></textarea>
                </li>




            </ul>


            <ul id="property-form-description-column2" class="property-form-description-column">
                <li>
                    <label for="property-form-description-terrain">Terreno:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-terrain" name="property-terrain" <?php echo isset($property_terrain) ? 'value="' . $property_terrain . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-construction">Construcci&oacute;n:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-construction" name="property-construction" <?php echo isset($property_construction) ? 'value="' . $property_construction . '"' : ''; ?>/>
                </li>

                <li>

                    <label for="property-form-description-stories">Niveles:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-stories" name="property-stories" <?php echo isset($property_stories) ? 'value="' . $property_stories . '"' : ''; ?>/>
                </li>
                <li>
                    <label for="property-form-description-bedrooms">Habitaciones:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-bedrooms" name="property-bedrooms" <?php echo isset($property_bedrooms) ? 'value="' . $property_bedrooms . '"' : ''; ?>/>
                </li>
            </ul>


            <ul id="property-form-description-column3" class="property-form-description-column">
                <li>
                    <label for="property-form-description-bathrooms">Ba&ntilde;os:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-bathromms" name="property-bathrooms" <?php echo isset($property_bathrooms) ? 'value="' . $property_bathrooms . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-livingrooms">Salas:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-livingrooms" name="property-livingrooms" <?php echo isset($property_livingrooms) ? 'value="' . $property_livingrooms . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-kitchens">Cocinas:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-kitchens" name="property-kitchens" <?php echo isset($property_kitchens) ? 'value="' . $property_kitchens . '"' : ''; ?>/>
                </li>

                <li>
                    <label for="property-form-description-parkings">Parqueos:<span class="required">*</span></label> 
                    <input type="text" id="property-form-description-parkings" name="property-parkings" <?php echo isset($property_parkings) ? 'value="' . $property_parkings . '"' : ''; ?>/>
                </li>


            </ul>


            <ul id="property-form-description-column4" class="property-form-description-column optional-view">

                <ul class="property-form-description-column optional-view" id="property-form-description-column4">

                    <?php if (!isset($property_status) || !(strpos($property_status, "sell") === false)): ?>
                        <li>
                            <label for="property-form-description-sell-price-us">Precio de Venta $US:</label> 
                            <input type="text" name="property-sell-price-us" id="property-form-description-sell-price-us" <?php echo isset($property_sell_price_us) ? 'value="' . $property_sell_price_us . '"' : '' ?>/>
                        </li>

                        <li>
                            <label for="property-form-description-sell-price-dr">Precio de Venta $RD:</label> 
                            <input type="text" name="property-sell-price-dr" id="property-form-description-sell-price-dr" <?php echo isset($property_sell_price_dr) ? 'value="' . $property_sell_price_dr . '"' : '' ?>/>
                        </li>

                    <?php endif; ?>            

                    <?php if (isset($property_status) && !(strpos($property_status, "rent") === false)): ?>
                        <li>
                            <label for="property-form-description-rent-price-us">Precio de Alquiler $US:</label> 
                            <input type="text" name="property-rent-price-us" id="property-form-description-rent-price-us" <?php echo isset($property_rent_price_us) ? 'value="' . $property_rent_price_us . '"' : '' ?>/>
                        </li>



                        <li>
                            <label for="property-form-description-rent-price-dr">Precio de Alquiler $RD:</label> 
                            <input type="text" name="property-rent-price-dr" id="property-form-description-rent-price-dr" <?php echo isset($property_rent_price_dr) ? 'value="' . $property_rent_price_dr . '"' : '' ?>/>
                        </li>

                    <?php endif; ?>


                </ul>                    

            </ul>

        </div>



        <div id="property-form-description-close-places">


            <div id="property-form-description-description">

                <h3>Descripci&oacute;n de la propiedad:<span class="required">*</span></h3>
                <textarea id="property-form-description-price" name="property-description"><?php echo isset($property_description) ? $property_description : ''; ?></textarea>
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
                    <input id="property-form-description-features-white-clothes-closet" type="checkbox" name="white-clothes-closet" <?php echo isset($white_clothes_closet) && $white_clothes_closet ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-white-clothes-closet">Closet de ropa Blanca</label> 
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
                    <input id="property-form-description-features-machine-room" type="checkbox" name="machine-room" <?php echo isset($machine_room) && $machine_room ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-machine-room">Cuarto de máquinas</label> 
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
                    <input id="property-form-description-features-imported-fittings" type="checkbox" name="imported-fittings" <?php echo isset($imported_fittings) && $imported_fittings ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-imported-fittings">Grifería importada</label> 
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
                    <input id="property-form-description-features-extra-parkings" type="checkbox" name="extra-parkings" <?php echo isset($extra_parkings) && $extra_parkings ? 'checked="on"' : ''; ?>/>
                    <label for="property-form-description-features-extra-parkings">Parqueos extra</label> 
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


        <ul id="property-form-photos-first-column" class="property-form-photos-column">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <li>
                    <span><?php echo $i; ?>.</span> <input value="Buscar" type="file" name="property-photo-<?php echo $i; ?>"/>
                </li>
            <?php endfor; ?>

        </ul>

        <ul id="property-form-photos-first-column" class="property-form-photos-column">
            <?php for ($i = 6; $i <= 10; $i++): ?>
                <li>
                    <span><?php echo $i; ?>.</span> <input value="Buscar" type="file" name="property-photo-<?php echo $i; ?>"/>
                </li>
            <?php endfor; ?>
        </ul>



    </div>

    <div class="form-buttons">
        <input id="property-form-send-button" class="form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
        <img id="property-form-clear-button" class="form-clear-button" src="/images/common/formCleanButton.png"/>
    </div>

</form>