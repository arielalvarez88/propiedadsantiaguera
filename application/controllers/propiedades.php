<?php

class Propiedades extends CI_Controller {
public function __construct()
{
    parent::__construct();
    
    $this->load->library("image_helper");
}
    public function index() {
        
        $data['header'] = $this->load->view('blocks/header', '', true);
        $data['centerSection'] = $this->load->view('blocks/property_types', '', true);
        $this->load->view('page', $data);
    }

    public function agregar_propiedades($view_variables = null) {
        $user = User_handler::getLoggedUser();

        if ($user && $user->id) {
            $blocks['topLeftSide'] = $this->load->view('forms/add_properties_form.php', $view_variables, true);
            $this->load->view('page', $blocks);
        } else {
            $this->show_please_login();
        }
    }

    public function ver($id=null) {

        $no_id_passed = !$id;
        if ($no_id_passed)
            redirect("/propiedades");

        $user = $this->get_logged_user_or_redirect_to_please_login();
        $property = $user->property->where("id", $id)->get();
        
        $propiedadObject['property'] = $property;
        $property_cant_be_shown = !$property->display_property;

        if ($property_cant_be_shown)
            redirect("/propiedades");


        $property_viewer_data['property'] = $property;
        
        
        $lowercase_property_type = Environment_vars::$maps['property_type_to_name'][$property->type];
        $property_type = ucwords($lowercase_property_type);
        
        
        $property_viewer_data['property_type'] = $property_type;
                                        
        $slideshow_helper = new Slideshows_utilities();
        $property_photos = $property->file->where("type", Environment_vars::$maps['file_type_to_id']['photo'])->get_iterated();
        $property_image_thumbs_paths = array();
        $image_helper = new Image_helper();
        
         $property_pager_slides_html = array();
         $i = 0;
         
        foreach($property_photos as $property_photo)
        {
            
            $photo_path_pieaces= explode("/", $property_photo->path);
            
            $photo_filename = $photo_path_pieaces[count($photo_path_pieaces) -1];
            

            
            $photo_thumb_full_path = Environment_vars::$environment_vars['properties_photos_thumbs_dir_path'].$photo_filename;
            if($image_helper->resize($property_photo->path, "449", "254"))
            {
                
                $property_image_thumbs_paths [] = $photo_thumb_full_path;
                
                 $property_pager_slides_html [] = '<img  src="' . $photo_thumb_full_path . '"  class="propiedad-viewer-slideshow-selector propiedad-viewer-slideshow-selector-' . $i . '"/>';
                  $i++;
            }
            
            
        }
        $property_viewer_data['property_photos_paths'] = $property_image_thumbs_paths;

     

        


        $property_photos_pagers_groups= $slideshow_helper->getPagerSubset($property_pager_slides_html, 6);
    
        $property_viewer_data['property_photos_pagers_groups'] = $property_photos_pagers_groups;



        $data['topLeftSide'] = $this->load->view('blocks/property_viewer', $property_viewer_data, true);
        $data['topRightSide'] = $this->load->view('blocks/user_viewer', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/monedaPrecio', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/pdf_converter', $propiedadObject, true);
        $data['topRightSide'] .=$this->load->view('blocks/sharePropertyWithAFriend', $propiedadObject, true);

        $data['bottomLeftSide'] = $this->load->view('blocks/property_info', $propiedadObject, true);

        $data['bottomLeftSide'] .= $this->load->view('blocks/propertyUbicationGmap', $propiedadObject, true);
        $data['bottomRightSide'] = $this->load->view('blocks/solicitudDeInformacion', $propiedadObject, true);


        $this->load->view('page', $data);
    }

    public function validate() {

        $properties_photos_filenames = array();
        if ($this->form_validation->run('property') == false) {

            $this->add_property_error();
        } else {
            try {
                $photos_inputs_names = array();
                for ($i = 1; $i <= 10; $i++) {
                    $photos_inputs_names[] = "property-photo-" . $i;
                }

                $upload_path = realpath("./" . Environment_vars::$environment_vars['properties_photos_dir_path']);

                $properties_photos_filenames = File_handler::save_photos($photos_inputs_names, $upload_path, 5000);
            } catch (Exception $e) {
                $messages['errors'] = $e->getMessage();

                $this->agregar_propiedades($messages);

                return;
            }



            $this->save_property($properties_photos_filenames);
        }
    }

    
    private function save_property($properties_photos_filenames = array()) {
        $user = User_handler::getLoggedUser();

        if (!$user->can_create_property()) {

            $repopulateForm['errors'] = "Usted ha sobrepasado el límite de propiedades creadas permitidas. Para poder agregar otra propiedad debe comprar otro paquete o borrar una de las existentes.";
            $this->agregar_propiedades($repopulateForm);
            return;
        }

        $newProperty = new Property();
        $newPropertyInfo = $this->input->post();
        $newProperty->title = $newPropertyInfo['property-title'];
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



        $transactioner = new File();
        $file_getter = new File();

        $transactioner->trans_start();
        foreach ($properties_photos_filenames as $property_filename) {

            if (!$property_filename)
                continue;

            $file = new File();
            $file->path = Environment_vars::$environment_vars['properties_photos_dir_path'] . $property_filename;
            $file->type = Environment_vars::$maps['file_type_to_id']['photo'];
            $file->save();

            $file_getter->or_where("id", $file->id);
        }

        $transactioner->trans_complete();
        $transactioner->trans_commit();
        $new_property_files = $file_getter->get()->all;
        ;









        $newPropertyType = new Property_type();
        $newPropertyType->get_by_id(Environment_vars::$environment_vars['property_types'][$newPropertyInfo['property-type']]);


        $newProperty->save(array($newPropertyType, $new_property_close_places->all, $new_property_features->all, $user, $new_property_files));



        $messages['info_messages'] = 'Su propiedad fue agregada con éxito';
        $this->agregar_propiedades($messages);
    }

    public function guardar_cambios_publicar() {
        $user = $this->get_logged_user_or_redirect_to_please_login();

        $number_of_properties_user_want_to_publish = count($this->input->post()) - 3;
        $number_of_properties_user_can_publish = $user->posts_left;


        if ($number_of_properties_user_want_to_publish > $number_of_properties_user_can_publish) {


            $messages['errors'] = "No posee suficientes propiedades compradas.";
            $this->session->set_userdata(array("messages" => $messages));
            redirect("/usuario/panel/propiedades/creadas/");
        }



        $user_properties = $user->property->get();
        foreach ($user_properties as $property) {

            $property_selector = "publish-property-" . $property->id;

            $property_selected_to_publish = $this->input->post($property_selector);
            if ($property_selected_to_publish) {

                $property->display_property = 1;
                $property->save();
                $user->posts_left--;
            }
        }

        $user->save();
        redirect("/usuario/panel/propiedades/publicadas");
    }

    public function editar_propiedades($property_id) {
        $property = new Property();
        $property->where('id', $property_id);
        $property->get();

        $repopulateForm = array();

        

        $repopulateForm['property_type'] = $property->type;
        $repopulateForm['property_sector'] = $property->sector;
        $repopulateForm['property_address'] = $property->address;
        $repopulateForm['property_status'] = $property->status;
        $repopulateForm['property_sell_price_us'] = number_format($property->sell_price_us);
        $repopulateForm['property_rent_price_us'] = number_format($property->rent_price_us);
        $repopulateForm['property_sell_price_dr'] = number_format($property->sell_price_dr);
        $repopulateForm['property_rent_price_dr'] = number_format($property->rent_price_dr);

        $repopulateForm['property_terrain'] = $property->terrain;
        $repopulateForm['property_construction'] = $property->construction;
        $repopulateForm['property_stories'] = $property->stories;
        $repopulateForm['property_bedrooms'] = $property->bedrooms;
        $repopulateForm['property_bathrooms'] = $property->bathrooms;
        $repopulateForm['property_livingrooms'] = $property->livingrooms;
        $repopulateForm['property_kitchens'] = $property->kitchens;
        $repopulateForm['property_parkings'] = $property->parkings;


        $repopulateForm['close_malls'] = $property->close_malls;
        $repopulateForm['close_supermarkets'] = $property->close_supermarkets;
        $repopulateForm['close_grocery_stores'] = $property->close_grocery_stores;
        $repopulateForm['close_schools'] = $property->close_schools;
        $repopulateForm['close_restaurants'] = $property->close_restaurants;
        $repopulateForm['close_bakeries'] = $property->close_bakeries;
        $repopulateForm['close_gyms'] = $property->close_gyms;
        $repopulateForm['close_public_transport'] = $property->close_public_transport;
        $repopulateForm['close_hardware_stores'] = $property->close_hardware_stores;
        $repopulateForm['close_drug_stores'] = $property->close_drug_stores;


        $repopulateForm['elevator'] = $property->elevator;
        $repopulateForm['game_area'] = $property->game_area;
        $repopulateForm['wash_area'] = $property->wash_area;
        $repopulateForm['balcony'] = $property->balcony;
        $repopulateForm['electric_water_heater'] = $property->electric_water_heater;
        $repopulateForm['gas_water_heater'] = $property->gas_water_heater;
        $repopulateForm['watchman_stand'] = $property->watchman_stand;
        $repopulateForm['cistern'] = $property->cistern;
        $repopulateForm['white_clothes_closer'] = $property->white_clothes_closer;
        $repopulateForm['equiped_kitchen'] = $property->equiped_kitchen;
        $repopulateForm['dinning_room'] = $property->dinning_room;
        $repopulateForm['antisismic_construction'] = $property->antisismic_construction;
        $repopulateForm['plaster_cornices'] = $property->plaster_cornices;
        $repopulateForm['machine_room'] = $property->machine_room;
        $repopulateForm['utility_room_bathroom'] = $property->utility_room_bathroom;
        $repopulateForm['pantry'] = $property->pantry;
        $repopulateForm['principal_room_bathroom'] = $property->principal_room_bathroom;
        $repopulateForm['trash_chute'] = $property->trash_chute;
        $repopulateForm['famaily_room'] = $property->famaily_room;
        $repopulateForm['common_gas'] = $property->common_gas;
        $repopulateForm['imported_fittings'] = $property->imported_fittings;
        $repopulateForm['intercom'] = $property->intercom;
        $repopulateForm['jacuzzi'] = $property->jacuzzi;
        $repopulateForm['garden'] = $property->garden;
        $repopulateForm['kiosk'] = $property->kiosk;
        $repopulateForm['lobby'] = $property->lobby;
        $repopulateForm['double_garage'] = $property->double_garage;
        $repopulateForm['half_bathroom'] = $property->half_bathroom;
        $repopulateForm['features_receiver'] = $property->features_receiver;
        $repopulateForm['lobby'] = $property->lobby;
        $repopulateForm['extra_parkings'] = $property->extra_parkings;
        $repopulateForm['patio_with_garden'] = $property->patio_with_garden;
        $repopulateForm['pool'] = $property->pool;
        $repopulateForm['marmol_floors'] = $property->marmol_floors;
        $repopulateForm['electric_plant'] = $property->electric_plant;
        $repopulateForm['mahogany_terminations'] = $property->mahogany_terminations;
        $repopulateForm['terrace'] = $property->terrace;
        $repopulateForm['pre_installed_services'] = $property->pre_installed_services;
        $repopulateForm['granite_countertops'] = $property->granite_countertops;
        $repopulateForm['electric_gate'] = $property->electric_gate;
        $repopulateForm['walk_in_closet'] = $property->walk_in_closet;



        $blocks['topLeftSide'] = $this->load->view('forms/add_properties_form.php', $repopulateForm, true);
        $this->load->view('page', $blocks);
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
