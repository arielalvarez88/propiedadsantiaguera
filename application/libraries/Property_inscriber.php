<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once realpath("./application/libraries/IProperty_inscriber.php");

class Property_inscriber implements IProperty_inscriber {

    public function save_address($property_object, $property_info_getter) {
        $address = $property_info_getter->get_address();
        if ($address)
            $property_object->address = $address;
    }

    public function save_bathrooms($property_object, $property_info_getter) {
        $bathrooms = $property_info_getter->get_bathrooms();
        if ($bathrooms)
            $property_object->bathrooms = $bathrooms;
    }

    public function save_bedrooms($property_object, $property_info_getter) {
        $bedrooms = $property_info_getter->get_bedrooms();
        if ($bedrooms)
            $property_object->bedrooms = $bedrooms;
    }

    public function save_condition($property_object, $property_info_getter) {
        $condition = $property_info_getter->get_condition();
        if ($condition)
            $property_object->condition = $condition;
    }

    public function save_construction($property_object, $property_info_getter) {
        $construction = $property_info_getter->get_construction();
        if ($construction)
            $property_object->construction = $construction;
    }

    public function save_coordenates($property_object, $property_info_getter) {
        $coordenates = $property_info_getter->get_coordenates();
        if ($coordenates)
            $property_object->coordenates = $coordenates;
    }

    public function save_description($property_object, $property_info_getter) {
        $coordenates = $property_info_getter->get_coordenates();
        if ($coordenates)
            $property_object->coordenates = $coordenates;
    }

    public function save_id($property_object, $property_info_getter) {
        $id = $property_info_getter->get_id();
        if ($id)
            $property_object->id = $id;
    }

    public function save_kitchens($property_object, $property_info_getter) {
        $kitchens = $property_info_getter->get_kitchens();
        if ($kitchens)
            $property_object->kitchens = $kitchens;
    }

    public function save_livingrooms($property_object, $property_info_getter) {
        $livingrooms = $property_info_getter->get_livingrooms();
        if ($livingrooms)
            $property_object->livingrooms = $livingrooms;
    }

    public function save_neighborhood($property_object, $property_info_getter) {
        $neighborhood = $property_info_getter->get_neighborhood();
        if ($neighborhood)
            $property_object->neighborhood = $neighborhood;
    }

    public function save_parkings($property_object, $property_info_getter) {
        $parkings = $property_info_getter->get_parkings();
        if ($parkings)
            $property_object->parkings = $parkings;
    }

    public function validate_photos($photos_inputs_names) {

        $upload_path =  Environment_vars::$environment_vars['properties_photos_dir_path'];
        $properties_photos_filenames = File_handler::save_photos($photos_inputs_names, $upload_path, 5000);

        return $properties_photos_filenames;
    }

    public function save_photos($property_object, $properties_photos_filenames) {


        return $this->save_photos_and_return_objects($property_object, $properties_photos_filenames);
    }

    public function save_photos_and_return_objects($property_object, $properties_photos_filenames) {

        $photos = array();
        foreach ($properties_photos_filenames as $input_name => $photo_filename) {

            if ($input_name == "property-main-photo")
                $property_object->main_photo = $photo_filename;
            else {
                $photo = new File();

                $photo->path = $photo_filename;
                $photo->type = Environment_vars::$maps['file_type_to_id']['photo'];
                $photo->save();



                $photos[] = $photo;
            }
        }

        return $photos;
    }

    public function save_province($property_object, $property_info_getter) {
        $province = $property_info_getter->get_province();
        if ($province)
            $property_object->province = $province;
    }

    public function save_rent_price_dr($property_object, $property_info_getter) {
        $rent_price_dr = $property_info_getter->get_rent_price_dr();
        if ($rent_price_dr)
            $property_object->rent_price_dr = $rent_price_dr;
    }

    public function save_rent_price_us($property_object, $property_info_getter) {
        $rent_price_us = $property_info_getter->get_rent_price_us();
        if ($rent_price_us)
            $property_object->rent_price_us = $rent_price_us;
    }

    public function save_sell_price_dr($property_object, $property_info_getter) {
        $sell_price_dr = $property_info_getter->get_sell_price_dr();
        if ($sell_price_dr)
            $property_object->sell_price_dr = $sell_price_dr;
    }

    public function save_sell_price_us($property_object, $property_info_getter) {
        $sell_price_us = $property_info_getter->get_sell_price_us();
        if ($sell_price_us)
            $property_object->sell_price_us = $sell_price_us;
    }

    public function save_stories($property_object, $property_info_getter) {
        $stories = $property_info_getter->get_stories();
        if ($stories)
            $property_object->stories = $stories;
    }

    public function save_terrain($property_object, $property_info_getter) {
        $terrain = $property_info_getter->get_terrain();
        if ($terrain)
            $property_object->terrain = $terrain;
    }

    public function save_title($property_object, $property_info_getter) {
        $title = $property_info_getter->get_title();
        if ($title)
            $property_object->title = $title;
    }

    public function save_type($property_object, $property_info_getter) {
        $type = $property_info_getter->get_type();
        if ($type)
            $property_object->type = $type;
    }

}

?>
