<?php

/*
 */

class Environment_vars {

    public static $maps = array(
        "file_type_to_id" => array("photo" => 1, "video" => 2),
        "property_type_to_name" => array(1 => "casa", 2 => "apartamento", 3 => "solar", 4 => "penthhouse", 5 => "centro comercial", 6 => "edificio", 7 => "nave industrial", 8 => "oficina", 9 => "finca"),
        "user_type_to_validation_rules" => array("client" => "signupClient", "company" => "signupCompany", "edit_client" => "edit_clent"),
        "property_feature_to_name" => array(
            1 => "elevator",
            2 => "game_area",
            3 => "wash_area",
            4 => "balcony",
            5 => "recreative_areas_bathrooms",
            6 => "electric_water_heater",
            7 => "gas_water_heater",
            8 => "watchman_stand",
            9 => "cistern",
            10 => "white_clothes_closet",
            11 => "equiped_kitchen",
            12 => "dinning_room",
            13 => "antisismic_construction",
            14 => "plaster_cornices",
            15 => "machine_room",
            16 => "utility_room_bathroom",
            17 => "counter_top",
            18 => "pantry",
            19 => "trash_chute",
            20 => "principal_room_bathroom",
            21 => "family_room",
            22 => "common_gas",
            23 => "imported_fittings",
            24 => "intercom",
            25 => "jacuzzi",
            26 => "garden",
            27 => "kiosk",
            28 => "lobby",
            29 => "double_garage",
            30 => "half_bathroom",
            31 => "receiver",
            32 => "extra_parkings",
            33 => "patio_with_garden",
            34 => "pool",
            35 => "marmol_floors",
            36 => "electric_plant",
            37 => "mahogany_terminations",
            38 => "terrace",
            39 => "pre_installed_services",
            40 => "granite_countertops",
            41 => "electric_gate",
            42 => "walk_in_closet"),
        "property_close_places_to_name" => array(
            1 => "close_malls",
            2 => "close_supermarkets",
            3 => "close_grocery_stores",
            4 => "close_schools",
            5 => "close_restaurants",
            6 => "close_bakeries",
            7 => "close_gyms",
            8 => "close_public_transport",
            9 => "close_hardware_stores",
            10 => "close_drug_stores"
        ),
        "property_types" => array(
            "house" => 1,
            "apartment" => 2,
            "lot" => 3,
            "penthouse" => 4,
            "mall" => 5,
            "building" => 6,
            "warehouse" => 7,
            "office" => 8,
            "land" => 9
        ),
        "filter-fields-to-db-fields" => array("sector" => "sector", "condition" => "condition"),
        "property_types" => array(
            "house" => 1,
            "apartment" => 2,
            "lot" => 3,
            "penthouse" => 4,
            "mall" => 5,
            "building" => 6,
            "warehouse" => 7,
            "office" => 8,
            "land" => 9
        ),
        "texts_to_id" => array(
            "property_neighborhoods" => array("Cerro Alto" => "1", "Villa Olga" => 2, "Villa Olimpica" => 3),
            "property_types" => array("Casa" => 1, "Apartamento" => 2, "Solar" => 3, "Penthouse" => 4, "Local Comercial" => 5, "Edificio" => 6, "Nave industrial" => 7, "Oficina" => 8, "Finca" => 9)
        ),
        "html_to_id" => array(
            "property_types" => array(
                "house" => 1,
                "apartment" => 2,
                "lot" => 3,
                "penthouse" => 4,
                "mall" => 5,
                "building" => 6,
                "warehouse" => 7,
                "office" => 8,
                "land" => 9
            )
        ), 
        "property_close_places" => array(
            "close-malls" => 1,
            "close-supermarkets" => 2,
            "close-grocery-stores" => 3,
            "close-schools" => 4,
            "close-restaurants" => 5,
            "close-bakeries" => 6,
            "close-gyms" => 7,
            "close-public-transport" => 8,
            "close-hardware-stores" => 9,
            "close-drug-stores" => 10
        ),
        "property_features" => array(
            "elevator" => 1,
            "game-area" => 2,
            "wash-area" => 3,
            "balcony" => 4,
            "recreative-areas-bathrooms" => 5,
            "electric-water-heater" => 6,
            "gas-water-heater" => 7,
            "watchman-stand" => 8,
            "cistern" => 9,
            "white-clothes-closet" => 10,
            "equiped-kitchen" => 11,
            "dinning-room" => 12,
            "antisismic-construction" => 13,
            "plaster-cornices" => 14,
            "machine-room" => 15,
            "utility-room-bathroom" => 16,
            "counter-top" => 17,
            "pantry" => 18,
            "trash-chute" => 19,
            "principal-room-bathroom" => 20,
            "family-room" => 21,
            "common-gas" => 22,
            "imported-fittings" => 23,
            "intercom" => 24,
            "jacuzzi" => 25,
            "garden" => 26,
            "kiosk" => 27,
            "lobby" => 28,
            "double-garage" => 29,
            "half-bathroom" => 30,
            "receiver" => 31,
            "extra-parkings" => 32,
            "patio-with-garden" => 33,
            "pool" => 34,
            "marmol-floors" => 35,
            "electric-plant" => 36,
            "mahogany-terminations" => 37,
            "terrace" => 38,
            "pre-installed-services" => 39,
            "granite-countertops" => 40,
            "electric-gate" => 41,
            "walk-in-closet" => 42
        )
    );
    public static $environment_vars = array(
        'user_photos_dir_path' => '/images/userPhotos/',
        'user_photos_thumbs_dir_path' => '/images/userPhotosThumbs/',
        'properties_photos_dir_path' => '/images/propertiesPhotos/',
        'properties_photos_thumbs_dir_path' => '/images/propertiesPhotosThumbs/'
    );

}

?>
