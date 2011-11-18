<?php

/*
 */
class Environment_vars {

    public static $maps = array(
        
        "file_type_to_id" => array("photo" => 1, "video" =>2),
        "property_type_to_name" => array(1 => "casa", 2=> "apartamento", 3=> "solar", 4=>"penthhouse", 5=>"centro comercial", 6=> "edificio", 7=>"nave industrial", 8=> "oficina", 9 =>"finca"),
        "user_type_to_validation_rules" => array("client" => "signupClient", "company" => "signupCompany", "edit_client" => "edit_clent"),

        "property_feature_to_name" => array(
            1 => "elevator",
            2 => "game-area",
            3 => "wash-area",
            4 => "balcony",
            5 => "recreative-areas-bathrooms",
            6 => "electric-water-heater",
            7 => "gas-water-heater",
            8 => "watchman-stand",
            9 => "cistern",
            10 =>"white-clothes-closet",
            11 =>"kitchen",
            12 =>"dinning-room",
            13 =>"antisismic-construction",
            14 =>"plaster-cornices",
            15 =>"machine-room",
            16 =>"utility-room-bathroom",
            17 =>"counter-top",
            18 =>"pantry",
            19 =>"trash-chute",
            20 =>"principal-room-bathroom",
            21 =>"family-room",
            22 =>"common-gas",
            23 =>"imported-fittings",
            24 =>"intercom",
            25 =>"jacuzzi",
            26 =>"garden",
            27 =>"kiosk",
            28 =>"lobby",
            29 =>"double-garage",
            30 =>"half-bathroom",
            31 =>"receiver",
            32 =>"extra-parkings",
            33 =>"patio-with-garden",
            34 =>"pool",
            35 =>"marmol-floors",
            36 =>"electric-plant",
            37 =>"mahogany-terminations",
            38 =>"terrace",
            39 =>"pre-installed-services",
            40 =>"granite-countertops",
            41 =>"electric-gate",
            42 =>"walk-in-closet"),
        "property_close_places" => array(
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
        "filter-fields-to-db-fields"=>array("sector" => "sector", "condition" => "condition"),
       
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
        "property_close_places" => array(
            "close-malls" => 1,
            "close-supermarkets" => 2,
            "close-grocery-stores" => 3,
            "close-schools" => 4,
            "close-restaurants" => 5,
            "close-bakeries" => 6,
            "close-gyms" => 7,
            "close-public-transport" => 8,
            "close-harware-stores" => 9,
            "close-drug-stores" => 10,
            
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
            "kitchen" => 11,
            "dinning-room" => 12,
            "antisismic-construction" => 13,
            "plaster-cornices"=>14,
            "machine-room" => 15,
            "utility-room-bathroom" => 16,
            "counter-top" => 17,
            "pantry" => 18,
            "trash-chute" => 19,
            "principal-room-bathroom" => 20,
            "family-room" => 21,
            "common-gas" => 22,
            "imported-fittings" => 23,
            "intercom" =>24,
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
