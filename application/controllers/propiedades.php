<?php

require_once realpath("./application/libraries/Property_info_getter_from_post.php");
require_once realpath("./application/libraries/Property_info_getter_from_object.php");
require_once realpath("./application/libraries/Property_editor.php");
require_once realpath("./application/libraries/Property_inscriber.php");

class Propiedades extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library("image_helper");
        $this->load->library("filter_builder");
    }

    private function get_count_of_each_type_of_property() {

        $type_to_count_map = array();
        $propery_counter = new Property();

        $type_to_count_map['number_of_houses'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Casa'])->count();
        $type_to_count_map['number_of_apartments'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Apartamento'])->count();
        $type_to_count_map['number_of_buildings'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Edificio'])->count();
        $type_to_count_map['number_of_penthouses'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Penthouse'])->count();
        $type_to_count_map['number_of_offices'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Oficina'])->count();
        $type_to_count_map['number_of_malls'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Local Comercial'])->count();
        $type_to_count_map['house_warehouses'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Nave Industrial'])->count();
        $type_to_count_map['number_of_in_construction_propjects'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Proyecto en Construcción'])->count();
        $type_to_count_map['number_of_lots'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Solar'])->count();
        $type_to_count_map['number_of_lands'] = $propery_counter->where("display_property", 1)->where("type", Environment_vars::$maps['texts_to_id']['property_types']['Finca'])->count();
        return $type_to_count_map;
    }

    public function index() {

        $data['header'] = $this->load->view('blocks/header', '', true);

        $property_types_view_variables = $this->get_count_of_each_type_of_property();

        $data['centerSection'] = $this->load->view('blocks/property_types', $property_types_view_variables, true);
        $data['bottom'] = $this->load->view('blocks/bottom_banner','',true);

        $this->load->view('page', $data);
    }

    private function load_properties_form($view_variables=array()) {
        $user = User_handler::getLoggedUser();

        if ($user && $user->id) {
            $blocks['topLeftSide'] = $this->load->view('forms/add_properties_form.php', $view_variables, true);
            $this->load->view('page', $blocks);
        } else {
            $this->show_please_login();
        }
    }

    public function agregar_propiedades() {
        $this->load_properties_form();
    }

    private function get_properties_thumbs_variables_for_slideshow($property) {
        $slideshow_helper = new Slideshows_utilities();
        $property_photos = $property->file->where("type", Environment_vars::$maps['file_type_to_id']['photo'])->get()->all;

        $property_image_thumbs_paths = array();
        $image_helper = new Image_helper();

        $property_pager_slides_html = array();
        $i = 0;


        if ($property->video) {
            $video_thumb_url = base_url() . "/images/propiedadesViewer/videoThumb.png";
            $property_pager_slides_html [] = '<img  src="' . $video_thumb_url . '"  class="propiedad-viewer-slideshow-selector propiedad-viewer-slideshow-selector-0"/>';
            $i = 1;
        }
        foreach ($property_photos as $property_photo) {



            if ($photo_path = $image_helper->resize($property_photo->path, "449", "254")) {

                $property_image_thumbs_paths [] = array("thumb" => $photo_path, "image" => $property_photo->path);

                $property_pager_slides_html [] = '<img  src="' . $photo_path . '"  class="propiedad-viewer-slideshow-selector propiedad-viewer-slideshow-selector-' . $i . '"/>';
                $i++;
            }
        }


        $property_photos_pagers_groups = $slideshow_helper->getPagerSubset($property_pager_slides_html, 6);

        $property_viewer_data['property_photos_paths'] = $property_image_thumbs_paths;



        $property_viewer_data['property_photos_pagers_groups'] = $property_photos_pagers_groups;
        
        
    
        
        return $property_viewer_data;
    }
    
    
    private function get_user_viewer_view_variables($property_owner){
        
        $user_viewer_view_data['user'] = $property_owner;
         $user_viewer_view_data['user_name'] = $property_owner->name;
        $user_viewer_view_data['company_or_particular_view'] = $property_owner instanceof Company_user ? 'company-' : 'particular-';
        $user_viewer_view_data['user_type'] = array_search($property_owner->type, Environment_vars::$maps['texts_to_id']['user_types']);

        if (!$property_owner instanceof Company_agent_user) {
            $user_viewer_view_data['user_tel'] = $property_owner->tel;
        }



        if (!$property_owner instanceof Company_user) {
            $user_viewer_view_data['user_cel'] = $property_owner->cel;
            $user_viewer_view_data['user_cel2'] = $property_owner->cel2;
        }

        $user_viewer_view_data['user_email'] = $property_owner->email;
        $user_viewer_view_data['user_photo'] = $property_owner->photo;
        $user_viewer_view_data['user_id'] = $property_owner->id;

        if (!$property_owner instanceof Company_agent_user)
            $user_viewer_view_data['user_website'] = $property_owner->website;


        if ($property_owner instanceof Company_user) {
            $user_viewer_view_data['user_fax'] = $property_owner->fax;
        }
        
        return $user_viewer_view_data;
    }
    
    private function get_property_viewer_view_variables($property)
    {
        $property_viewer_data = $this->get_properties_thumbs_variables_for_slideshow($property);
            $property_type = Environment_vars::$maps['id_to_html']['property_types'][$property->type];
        $property_viewer_data['property'] = $property;
        $property_viewer_data['property_type'] = $property_type;
        return $property_viewer_data;
    }

    
    
    private function get_breadcrumb_view_viarables($property)
    {
        $breadcrumb = new BreadCrumb(base_url() . "propiedades/buscar");
        $breadcrumb->construct_breadcrumb_for_property($property);

        $breadcrumb_view_variables['breadcrumb'] = $breadcrumb->print_breadcrumb();


        $request_signature = md5($_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] . print_r($_POST, true));
        $last_request_signature = $this->session->userdata("last_request_signature");

        $is_a_refresh = $request_signature == $last_request_signature;


        if ($is_a_refresh) {

            $last_search_url = $this->session->userdata("last_search_url");

            if ($last_search_url)
                $breadcrumb_view_variables['back_to_results_link'] = $last_search_url;
        } else {


            $was_refered_from_search_page = !(strpos($this->session->flashdata("referer"), "propiedades/buscar") == false);

            if ($was_refered_from_search_page) {
                $this->session->set_userdata("last_search_url", $_SERVER['HTTP_REFERER']);
                $breadcrumb_view_variables['back_to_results_link'] = $_SERVER['HTTP_REFERER'];
            }
        }

        $this->session->set_userdata("last_request_signature", $request_signature);
        
        return $breadcrumb_view_variables;
    }
    
    
    public function ver($id=null) {

        $no_id_passed = !$id || !is_numeric($id);

        if ($no_id_passed)
            redirect("/pagina_no_valida");

        $property = new Property();
        $property->where("id", $id)->get();

        $propertyInfo['property'] = $property;


        $property_owner = User_factory::get_user_from_object($property->user->get());
        $propertyInfo['owner'] = $property_owner;

        $user = User_handler::getLoggedUser();

        $property_belongs_to_logged_user = $user && ($property_owner->id == $user->id);

        $property_cant_be_shown = !$property_belongs_to_logged_user && (!isset($property->display_property) || !$property->display_property);


        if ($property_cant_be_shown)
            redirect("/pagina_no_valida");

        $errors_view_variables = array();

        if (!$property->display_property)
            $errors_view_variables['errors'] = "Debe publicar su propiedad para que este dipsonible para todo el público.";


        if (!$user || ($property_owner->id != $user->id)) {

            $property->visits += 1;
            $property->save();
        }


        $property_viewer_data = $this->get_property_viewer_view_variables($property);
        

        if ($user instanceof Company_agent_user)
            $propertyInfo['company'] = $property_owner->get_company_object();

        $data['topLeftSide'] = $this->load->view('blocks/property_viewer', $property_viewer_data, true);

        $user_viewer_view_data = $this->get_user_viewer_view_variables($property_owner);
        $moneda_precio_view_variables = $this->get_moneda_precio_view_variables($property);
        $property_info_view_variables = $this->get_property_info_view_variables($property);


        $data['topRightSide'] = $this->load->view('blocks/user_viewer', $user_viewer_view_data, true);
        $data['topRightSide'] .= $this->load->view('blocks/belongs_to_company', $propertyInfo, true);
        $data['topRightSide'] .=$this->load->view('blocks/price_currency', $moneda_precio_view_variables, true);


        $data['topRightSide'] .=$this->load->view('blocks/pdf_and_share', $propertyInfo, true);
        $data['topRightSide'] .=$this->load->view('blocks/property_calculator', $propertyInfo, true);
$data['topRightSide'] .= $this->load->view('blocks/property_advertise', $propertyInfo, true);

        $data['topRightSide'] .= $this->load->view('blocks/property_contact', $propertyInfo, true);

        $data['topLeftSide'] .= $this->load->view('blocks/property_info', $property_info_view_variables, true);
        $data['topLeftSide'] .= $this->load->view('blocks/propertyUbicationGmap', $propertyInfo, true);



        
        $breadcrumb_view_variables = $this->get_breadcrumb_view_viarables($property);

        $data['top'] = $this->load->view('blocks/errors', $errors_view_variables, true);

        $video_variables['video_url'] = $property->video;

        


        $data['top'] .= $this->load->view('blocks/breadcrumb', $breadcrumb_view_variables, true);
        $this->load->view('page', $data);
    }

    private function get_property_info_view_variables($property) {
        $variables['property_close_places'] = $property->property_close_place->get()->all;

        $variables['property_address'] = $property->address;
        $variables['property_description'] = $property->description;
        $variables['property_features'] = $property->property_feature->get()->all;
        return $variables;
    }

    private function get_moneda_precio_view_variables($property) {
        $variables['dr_sell_price'] = Numerizer::numerize($property->sell_price_dr);
        $variables['us_sell_price'] = Numerizer::numerize($property->sell_price_us);
        $variables['us_rent_price'] = Numerizer::numerize($property->rent_price_us);
        $variables['dr_rent_price'] = Numerizer::numerize($property->rent_price_dr);
        return $variables;
    }

    private function validate_and_upload_photos() {
        $photos_inputs_names = array();
        for ($i = 1; $i <= 10; $i++) {
            $photos_inputs_names[] = "property-photo-" . $i;
        }
        $photos_inputs_names[] = "property-main-photo";
        $upload_path = realpath("./" . Environment_vars::$environment_vars['properties_photos_dir_path']);
        $properties_photos_filenames = File_handler::save_photos($photos_inputs_names, $upload_path);
        return $properties_photos_filenames;
    }

    private function reset_validation_rules() {
        $this->form_validation->_field_data = array();
        $this->form_validation->_error_array = array();
        $this->form_validation->_error_messages = array();
        $this->form_validation->error_string = '';
    }

    public function eliminar($property_id=0) {

        $property = $this->get_property_from_logged_user($property_id);
        $data['message'] = 'Está seguro que desea eliminar la propiedad "' . $property->title . '" su cuenta?';
        $data['yes_href'] = "/propiedades/confirmacion_eliminar/" . $property_id;
        $data['no_href'] = "/panel/propiedades";
        $blocks['topLeftSide'] = $this->load->view("blocks/are_you_sure", $data, true);

        $this->load->view("page", $blocks);
    }

    private function get_property_from_logged_user($property_id=0) {
        if (!$property_id)
            redirect("/");

        $user = $this->get_logged_user_or_redirect_to_please_login();

        $property = $user->property->where("id", $property_id)->get();

        if (!$property || !$property->id)
            redirect("/");

        return $property;
    }

    public function confirmacion_eliminar($property_id=0) {


        $property = $this->get_property_from_logged_user($property_id);
        $property->delete();
        redirect("/panel/propiedades");
    }

    public function validate($edit= false, $property_id_to_edit=0) {

        $filtered_post = $this->input->post();

        $property_inscriber_handler = $edit ? new Property_editor() : new Property_inscriber();
        $property_info_getter = new Property_info_getter_from_post($filtered_post);
        $properties_photos_filenames = array();
        $property_condition_for_validation_purposes = '';





        $type_validation = "property_" . Environment_vars::$maps['ids_to_text']['property_types_validation'][$filtered_post['property-type']];

        $sell_rent_validation = "property_" . Environment_vars::$maps['ids_to_text']['sell_rent_validation'][$filtered_post['property-condition']];

        $property_info_getter = new Property_info_getter_from_post($filtered_post);

        $photos_inputs_names = $property_info_getter->get_photos();


        if ($this->form_validation->run("property_common") == false || $this->form_validation->run($type_validation) == false || $this->form_validation->run($sell_rent_validation) == false) {


            $this->add_property_error();
            return;
        } else {

            try {

                $property_photos_filenames = $property_inscriber_handler->validate_photos($photos_inputs_names); //$properties_photos_filenames = $this->validate_and_upload_photos();
            } catch (Exception $e) {



                $extra_info['errors'] = $e->getMessage();
                $this->add_property_error($extra_info);
                return;
            }


            $this->save_property($property_inscriber_handler, $property_photos_filenames);
        }
    }

    public function buscar($order_by = null) {

        $filtered_get = $this->input->get();
        $properties_filters_container = new Property();
        $breadcrumb = new BreadCrumb(base_url() . "propiedades/buscar");
        $breadcrumb->add_link("Inicio", base_url(), "Inicio");



        $search_by_reference = isset($filtered_get['ref-number']) && is_numeric($filtered_get['ref-number']) ? true : false;

        if ($search_by_reference) {
            redirect("propiedades/ver/" . $filtered_get['ref-number']);
        } else {

            
            Filter_builder::build_property_type_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_province_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_neighborhood_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_posted_filter($properties_filters_container, $breadcrumb);
            Filter_builder::build_property_max_price_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_min_price_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_condition_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_bedrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_bathrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_parkings_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_kitchens_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_livingrooms_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_stories_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_terrain_filter($filtered_get, $properties_filters_container, $breadcrumb);
            Filter_builder::build_property_construction_filter($filtered_get, $properties_filters_container, $breadcrumb);
            
            Filter_builder::order_by($filtered_get, $properties_filters_container);
            
            
        }



        $filtered_properties = $properties_filters_container->get()->all;

        $filter_view_variables = $this->get_filter_view_variables($filtered_get);

        $this->session->set_userdata('breadcrumb', $breadcrumb);
        $breadcrumb_view_variables['breadcrumb'] = $breadcrumb->print_breadcrumb();
        $views['top'] = $this->load->view("blocks/breadcrumb", $breadcrumb_view_variables, true);

        $views['topLeftSide'] = $this->load->view("blocks/basic_filter", $filter_view_variables, true);

        $search_results['filtered_properties'] = $filtered_properties;
        
        $search_results['order_by_default_value'] = $this->input->get("orderBy");
        $search_results['condition'] = isset($filtered_get['condition']) && $filtered_get['condition'] == Environment_vars::$maps['property_conditions']['rent'] ? "rent" : "sell";
        



        $views['topRightSide'] = $this->load->view("blocks/properties_search_results_pager", $search_results, true);

        $advertising_view_variables['section'] = 'search-results-';
        $views['topLeftSide'] .= $this->load->view("blocks/search_advertisement", $advertising_view_variables, true);
        
        $views['bottom'] = $this->load->view('blocks/bottom_banner','',true);

        $this->load->view("page", $views);
    }

    private function get_filter_view_variables($filtered_get) {
        $variables['section'] = "search-results-";
        $variables['selected_property_neighborhood'] = isset($filtered_get) && isset($filtered_get['neighborhood']) ? $filtered_get['neighborhood'] : null;

        $variables['selected_property_type'] = isset($filtered_get) && isset($filtered_get['type']) ? $filtered_get['type'] : null;

        $variables['selected_property_ref_number'] = isset($filtered_get) && isset($filtered_get['ref-number']) ? $filtered_get['ref-number'] : null;
        $variables['selected_property_province'] = isset($filtered_get) && isset($filtered_get['province']) ? $filtered_get['province'] : null;

        $variables['selected_property_condition'] = isset($filtered_get) && isset($filtered_get['condition']) ? $filtered_get['condition'] : null;
        return $variables;
    }

    private function save_property($property_inscriber, $property_photos_filenames) {


        $user = $this->get_logged_user_or_redirect_to_please_login();

        $post = $this->input->post();
        $property_info_getter = new Property_info_getter_from_post($post);
        $new_property = new Property();

        if ($property_inscriber instanceof Property_editor) {
            $new_property->where("id", $property_info_getter->get_id())->get();

            $property_close_places = $new_property->property_close_place->get()->all;
            $property_features = $new_property->property_feature->get()->all;

            $new_property->delete($property_close_places);
            $new_property->delete($property_features);
        }

        $property_inscriber->save_type($new_property, $property_info_getter);
        $property_inscriber->save_title($new_property, $property_info_getter);
        $property_inscriber->save_province($new_property, $property_info_getter);
        $property_inscriber->save_neighborhood($new_property, $property_info_getter);
        $property_inscriber->save_condition($new_property, $property_info_getter);
        $property_inscriber->save_address($new_property, $property_info_getter);
        $property_inscriber->save_terrain($new_property, $property_info_getter);
        $property_inscriber->save_construction($new_property, $property_info_getter);
        $property_inscriber->save_stories($new_property, $property_info_getter);
        $property_inscriber->save_bedrooms($new_property, $property_info_getter);
        $property_inscriber->save_bathrooms($new_property, $property_info_getter);
        $property_inscriber->save_livingrooms($new_property, $property_info_getter);
        $property_inscriber->save_kitchens($new_property, $property_info_getter);
        $property_inscriber->save_parkings($new_property, $property_info_getter);
        $property_inscriber->save_sell_price_us($new_property, $property_info_getter);
        $property_inscriber->save_sell_price_dr($new_property, $property_info_getter);
        $property_inscriber->save_rent_price_us($new_property, $property_info_getter);
        $property_inscriber->save_rent_price_dr($new_property, $property_info_getter);
        $property_inscriber->save_description($new_property, $property_info_getter);
        $property_inscriber->save_coordenates($new_property, $property_info_getter);



        $new_property_type = new Property_type();
        $new_property_type->get_by_id($property_info_getter->get_type())->all;


        $properties_photos = $property_inscriber->save_photos($new_property, $property_photos_filenames);


        $new_property_close_places = $property_info_getter->get_close_places_object_array();

        $new_property_features = $property_info_getter->get_features_object_array();




        $new_property->save(array($new_property_type, $new_property_close_places, $new_property_features, $properties_photos, $user));

        redirect("/agregar_video/desea/" . $new_property->id);
    }

    public function guardar_cambios_publicar() {
        $user = $this->get_logged_user_or_redirect_to_please_login();

        $number_of_properties_user_want_to_publish = count($this->input->post()) - 3;
        $number_of_properties_user_can_publish = $user->posts_left;


        if ($number_of_properties_user_want_to_publish > $number_of_properties_user_can_publish) {


            $messages['errors'] = "No posee suficientes propiedades compradas.";
            $this->session->set_userdata(array("messages" => $messages));
            redirect("/panel/propiedades/creadas/");
        }



        $user_properties = $user->property->get();
        foreach ($user_properties as $property) {

            $property_selector = "publish-property-" . $property->id;

            $property_selected_to_publish = $this->input->post($property_selector);
            if ($property_selected_to_publish) {

                $property->display_property = 1;
                $property->post_date = NOW();
                $property->expiration_email_sent = 0;

                $property->save();
                $user->posts_left--;
            }
        }

        $user->save();
        redirect("/panel/propiedades/publicadas");
    }

    public function delete_property_photo($property_id, $photo_id) {
        $user = $this->get_logged_user_or_redirect_to_please_login();
        $property = new Property($property_id);

        if (!$property->id)
            redirect("/pagina_no_valida");

        $property_owner = $property->user->get();

        $user_doesnt_own_the_property_with_the_photo = $user->id != $property_owner->id;

        if ($user_doesnt_own_the_property_with_the_photo)
            redirect("/pagina_no_valida");



        $file = new File($photo_id);

        if (!$file->id)
            redirect("/pagina_no_valida");

        $file->delete();

        redirect("/propiedades/editar_propiedades/" . $property_id);
    }

    private function get_reppopulate_form_variables($property_info_getter, $extra_parameters =array()) {

        $repopulateForm = array();

        $property_features = $property_info_getter->get_features_for_reppopulate_form();
        $property_close_places = $property_info_getter->get_close_places_for_reppopulate_form();

        $repopulateForm = array_merge($property_features, $property_close_places);

        $repopulateForm['property_type'] = $property_info_getter->get_type();
        $repopulateForm['property_neighborhood'] = $property_info_getter->get_neighborhood();
        $repopulateForm['property_address'] = $property_info_getter->get_address();
        $repopulateForm['property_title'] = $property_info_getter->get_title();
        $repopulateForm['property_description'] = $property_info_getter->get_description();
        $repopulateForm['property_condition'] = $property_info_getter->get_condition();
        $repopulateForm['property_province'] = $property_info_getter->get_province();

        $repopulateForm['property_coordenates'] = $property_info_getter->get_coordenates();



        $repopulateForm['property_sell_price_us'] = $property_info_getter->get_sell_price_us();
        $repopulateForm['property_rent_price_us'] = $property_info_getter->get_rent_price_us();
        $repopulateForm['property_sell_price_dr'] = $property_info_getter->get_sell_price_dr();
        $repopulateForm['property_rent_price_dr'] = $property_info_getter->get_rent_price_dr();



        $repopulateForm['property_terrain'] = $property_info_getter->get_terrain();
        $repopulateForm['property_construction'] = $property_info_getter->get_construction();
        $repopulateForm['property_stories'] = $property_info_getter->get_stories();
        $repopulateForm['property_bedrooms'] = $property_info_getter->get_bedrooms();
        $repopulateForm['property_bathrooms'] = $property_info_getter->get_bathrooms();
        $repopulateForm['property_livingrooms'] = $property_info_getter->get_livingrooms();
        $repopulateForm['property_kitchens'] = $property_info_getter->get_kitchens();
        $repopulateForm['property_parkings'] = $property_info_getter->get_parkings();
        $repopulateForm['property_id'] = $property_info_getter->get_id();

        $editing_exisiting_property = $property_info_getter instanceof Property_info_getter_from_object;
        if ($editing_exisiting_property)
            $repopulateForm['property_photos'] = $property_info_getter->get_photos();


        $repopulateForm = array_merge($repopulateForm, $extra_parameters);


        return $repopulateForm;
    }

    public function editar_propiedades($property_id=0, $messages=array()) {

        $logged_user = $this->get_logged_user_or_redirect_to_please_login();
        $property = $logged_user->property->where("id", $property_id)->get();
        $property_exist = $property->id;

        if (!$property_exist)
            redirect("/pagina_no_valida");

        $property_info_getter = new Property_info_getter_from_object($property);

        $view_variables = $this->get_reppopulate_form_variables($property_info_getter);
        $view_variables['edit'] = true;
        $view_variables['property_id'] = $property_info_getter->get_id();





        $this->load_properties_form($view_variables);
    }

    private function add_property_error($extra_info = array()) {

        $repopulateForm = array();

        $repopulateForm['property_title'] = $this->input->post('property-title');
        $repopulateForm['property_type'] = $this->input->post('property-type');
        $repopulateForm['property_neighborhood'] = $this->input->post('property-neighborhood');
        $repopulateForm['property_livingrooms'] = $this->input->post('property-neighborhood');
        $repopulateForm['property_address'] = $this->input->post('property-address');
        $repopulateForm['property_condition'] = $this->input->post('property-condition');
        $repopulateForm['property_sell_price_us'] = $this->input->post('property-sell-price-us');
        $repopulateForm['property_rent_price_us'] = $this->input->post('property-rent-price-us');
        $repopulateForm['property_sell_price_dr'] = $this->input->post('property-sell-price-dr');
        $repopulateForm['property_rent_price_dr'] = $this->input->post('property-rent-price-dr');
        $repopulateForm['property_terrain'] = $this->input->post('property-terrain');
        $repopulateForm['property_construction'] = $this->input->post('property-construction');
        $repopulateForm['property_stories'] = $this->input->post('property-stories');
        $repopulateForm['property_bedrooms'] = $this->input->post('property-bedrooms');
        $repopulateForm['property_bathrooms'] = $this->input->post('property-bathrooms');
        $repopulateForm['property_livinrooms'] = $this->input->post('property-livinrooms');
        $repopulateForm['property_kitchens'] = $this->input->post('property-kitchens');
        $repopulateForm['property_parkings'] = $this->input->post('property-parkings');
        $repopulateForm['property_description'] = $this->input->post('property-description');
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

        if (isset($extra_info['errors']))
            $repopulateForm['errors'] .= $extra_info['errors'];



        $this->load_properties_form($repopulateForm);
    }

}

?>
