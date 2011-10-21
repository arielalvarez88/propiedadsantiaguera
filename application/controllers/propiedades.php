<?php

class Propiedades extends CI_Controller {

    public function index() {
        $data['topLeftSide'] = $this->load->view('blocks/propiedades', '', true);
        $data['topRightSide'] = $this->load->view('blocks/advertising', '', true);
        $data['topRightSide'] .= $this->load->view('blocks/subscribe', '', true);
        $menuTiposDePropiedadData['sectionName'] = 'propiedades';
        $data['topLeftSide'] .= $this->load->view('blocks/menuTiposDePropiedad', $menuTiposDePropiedadData, true);
        $this->load->view('page', $data);
    }

    public function agregar_propiedades($view_variables = null) {
        $user = User_handler::getLoggedUser();

        if ($user && $user->id) {
            $blocks['topLeftSide'] = $this->load->view('forms/add_properties_form.php', $view_variables, true);
            $this->load->view('page', $blocks);
        } else {
            $blocks['topLeftSide'] = $this->load->view('blocks/please_login', '', true);
            $this->load->view('page', $blocks);
        }
    }

    public function ver($id=null) {
        if (!($id && is_numeric($id) && $id >= 1))
            echo 'error';

        $propiedadObject['propiedad'] = 'prueba';
        $data['topLeftSide'] = $this->load->view('blocks/propiedadViewer', $propiedadObject, true);
        $data['topRightSide'] = $this->load->view('blocks/userViewer', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/monedaPrecio', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/pdfConverter', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/sharePropertyWithAFriend', $propiedadObject, true);
        $data['bottomLeftSide'] = $this->load->view('blocks/propertyInfo', $propiedadObject, true);
        $data['bottomLeftSide'] .= $this->load->view('blocks/propertyUbicationGmap', $propiedadObject, true);
        $data['bottomRightSide'] = $this->load->view('blocks/solicitudDeInformacion', $propiedadObject, true);


        $this->load->view('page', $data);
    }

    public function validate() {

        if ($this->form_validation->run('property') == false) {

            $this->add_property_error();
        } else {

            $this->save_property();
        }
    }

    private function save_property() {
        $user = User_handler::getLoggedUser();
        
        if (!$user->can_create_property()) 
        {

            $repopulateForm['errors'] = "Usted ha sobrepasado el límite de propiedades creadas permitidas. Para poder agregar otra propiedad debe comprar otro paquete o borrar una de las existentes.";
            $this->agregar_propiedades($repopulateForm);
            return;
        }            

        $newProperty = new Property();
        $newPropertyInfo = $this->input->post();
        $newProperty->terrain = $newPropertyInfo['property-terrain'];
        $newProperty->bathrooms = $newPropertyInfo['property-bathrooms'];
        $newProperty->sector = $newPropertyInfo['property-sector'];
        $newProperty->construction = $newPropertyInfo['property-sector'];
        $newProperty->livingrooms = $newPropertyInfo['property-livingrooms'];
        $newProperty->address = $newPropertyInfo['property-address'];
        $newProperty->stories = $newPropertyInfo['property-stories'];
        $newProperty->kitchens = $newPropertyInfo['property-kitchens'];
        $newProperty->status = $newPropertyInfo['property-status'];
        $newProperty->bedrooms = $newPropertyInfo['property-bedrooms'];
        $newProperty->parkings = $newPropertyInfo['property-parkings'];

        $newProperty->sell_price_us = isset($newPropertyInfo['property-sell-price-us']) ? $newPropertyInfo['property-sell-price-us'] : null;
        $newProperty->sell_price_dr = isset($newPropertyInfo['property-sell-price-dr']) ? $newPropertyInfo['property-sell-price-dr'] : null;
        $newProperty->rent_price_us = isset($newPropertyInfo['property-rent-price-us']) ? $newPropertyInfo['property-rent-price-us'] : null;
        $newProperty->rent_price_dr = isset($newPropertyInfo['property-rent-price-dr']) ? $newPropertyInfo['property-rent-price-dr'] : null;
        $newProperty->type = Environment_vars::$environment_vars["property_types"][$newPropertyInfo['property-type']];

        if ($newPropertyInfo['property-status'] == "sell" || $newPropertyInfo['property-status'] == "sell-rent") {
            $newProperty->sell_price_dollars = $newPropertyInfo['property-sell-price-us'];
            $newProperty->sell_price_pesos = $newPropertyInfo['property-sell-price-dr'];
        }
        if ($newPropertyInfo['property-status'] == "rent" || $newPropertyInfo['property-status'] == "sell-rent") {
            $newProperty->rent_price_dollars = $newPropertyInfo['property-rent-price-us'];
            $newProperty->rent_price_pesos = $newPropertyInfo['property-rent-price-dr'];
        }


        $new_property_close_places = new Property_close_place();
        $new_property_features = new Property_feature();

        $all_close_places = Environment_vars::$environment_vars["property_close_places"];
        $all_property_features = Environment_vars::$environment_vars['property_features'];


        foreach ($all_close_places as $key => $value) {
            if (isset($newPropertyInfo[$key])) {
                $new_property_close_places->or_where("id", Environment_vars::$environment_vars["property_close_places"][$key]);
            }
        }

        foreach ($all_property_features as $key => $value) {
            if (isset($newPropertyInfo[$key])) {
                $new_property_features->or_where("id", Environment_vars::$environment_vars["property_features"][$key]);
            }
        }

        $new_property_close_places->get();
        $new_property_features->get();






        $newPropertyType = new Property_type();
        $newPropertyType->get_by_id(Environment_vars::$environment_vars['property_types'][$newPropertyInfo['property-type']]);


        $newProperty->save(array($newPropertyType, $new_property_close_places->all, $new_property_features->all, $user));



        $messages['info_messages'] = 'Su propiedad fue agregada con éxito';
        $this->agregar_propiedades($messages);
    }

    private function add_property_error() {

        $repopulateForm = array();

        $repopulateForm['property_type'] = $this->input->post('property-type');
        $repopulateForm['property_sector'] = $this->input->post('property-sector');
        $repopulateForm['property_address'] = $this->input->post('property-address');
        $repopulateForm['property_status'] = $this->input->post('property-status');
        $repopulateForm['property_sell_price_us'] = $this->input->post('property-sell-price-us');
        $repopulateForm['property_rent_price_us'] = $this->input->post('property-rent-price-us');
        $repopulateForm['property_sell_price_dr'] = $this->input->post('property-sell-price-dr');
        $repopulateForm['property_rent_price_dr'] = $this->input->post('property-rent-price-dr');

        $repopulateForm['property_terrain'] = $this->input->post('property-terrain');
        $repopulateForm['property_construction'] = $this->input->post('property-construction');
        $repopulateForm['property_histories'] = $this->input->post('property-histories');
        $repopulateForm['property_bedrooms'] = $this->input->post('property-bedrooms');
        $repopulateForm['property_bathrooms'] = $this->input->post('property-bathrooms');
        $repopulateForm['property_livinrooms'] = $this->input->post('property-livinrooms');
        $repopulateForm['property_kitchens'] = $this->input->post('property-kitchens');
        $repopulateForm['property_parkings'] = $this->input->post('property-parkings');


        $repopulateForm['close_malls)'] = $this->input->post('close-malls)');
        $repopulateForm['close_supermarkets'] = $this->input->post('close-supermarkets');
        $repopulateForm['close_grocery_stores'] = $this->input->post('close-grocery-stores');
        $repopulateForm['close_schools'] = $this->input->post('close-schools');
        $repopulateForm['close_restaurants'] = $this->input->post('close-restaurants');
        $repopulateForm['close_bakeries'] = $this->input->post('close-bakeries');
        $repopulateForm['close_gyms'] = $this->input->post('close-gyms');
        $repopulateForm['close_public_transport'] = $this->input->post('close-public-transport');
        $repopulateForm['close_hardware_stores'] = $this->input->post('close-hardware-stores');
        $repopulateForm['close_drug_stores'] = $this->input->post('close-drug-stores');


        $repopulateForm['elevator'] = $this->input->post('elevator');
        $repopulateForm['game_area'] = $this->input->post('game-area');
        $repopulateForm['wash_area'] = $this->input->post('wash-area');
        $repopulateForm['balcony'] = $this->input->post('balcony');
        $repopulateForm['electric_water_heater'] = $this->input->post('electric-water-heater');
        $repopulateForm['gas_water_heater'] = $this->input->post('gas-water-heater');
        $repopulateForm['watchman_stand'] = $this->input->post('watchman-stand');
        $repopulateForm['cistern'] = $this->input->post('cistern');
        $repopulateForm['white_clothes_closer'] = $this->input->post('white-clothes-closer');
        $repopulateForm['equiped_kitchen'] = $this->input->post('equiped-kitchen');
        $repopulateForm['dinning_room'] = $this->input->post('dinning-room');
        $repopulateForm['antisismic_construction'] = $this->input->post('antisismic-construction');
        $repopulateForm['plaster_cornices'] = $this->input->post('plaster-cornices');
        $repopulateForm['machine_room'] = $this->input->post('machine-room');
        $repopulateForm['utility_room_bathroom'] = $this->input->post('utility-room-bathroom');
        $repopulateForm['pantry'] = $this->input->post('pantry');
        $repopulateForm['principal_room_bathroom'] = $this->input->post('principal-room-bathroom');
        $repopulateForm['trash_chute'] = $this->input->post('trash-chute');
        $repopulateForm['famaily_room'] = $this->input->post('famaily-room');
        $repopulateForm['common_gas'] = $this->input->post('common-gas');
        $repopulateForm['imported_fittings'] = $this->input->post('imported-fittings');
        $repopulateForm['intercom'] = $this->input->post('intercom');
        $repopulateForm['jacuzzi'] = $this->input->post('jacuzzi');
        $repopulateForm['garden'] = $this->input->post('garden');
        $repopulateForm['kiosk'] = $this->input->post('kiosk');
        $repopulateForm['lobby'] = $this->input->post('lobby');
        $repopulateForm['double_garage'] = $this->input->post('double-garage');
        $repopulateForm['half_bathroom'] = $this->input->post('half-bathroom');
        $repopulateForm['features_receiver'] = $this->input->post('features-receiver');
        $repopulateForm['lobby'] = $this->input->post('lobby');
        $repopulateForm['extra_parkings'] = $this->input->post('extra-parkings');
        $repopulateForm['patio_with_garden'] = $this->input->post('patio_with-garden');
        $repopulateForm['pool'] = $this->input->post('pool');
        $repopulateForm['marmol_floors'] = $this->input->post('marmol-floors');
        $repopulateForm['electric_plant'] = $this->input->post('electric-plant');
        $repopulateForm['mahogany_terminations'] = $this->input->post('mahogany-terminations');
        $repopulateForm['terrace'] = $this->input->post('terrace');
        $repopulateForm['pre_installed_services'] = $this->input->post('pre-installed-services');
        $repopulateForm['granite_countertops'] = $this->input->post('granite-countertops');
        $repopulateForm['electric_gate'] = $this->input->post('electric-gate');
        $repopulateForm['walk_in_closet'] = $this->input->post('walk-in-closet');







        $repopulateForm['errors'] = validation_errors();


        $this->agregar_propiedades($repopulateForm);
    }

}

?>
