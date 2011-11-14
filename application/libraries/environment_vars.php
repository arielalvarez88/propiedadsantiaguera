<?php

/*
 */
class Environment_vars {

    public static $maps = array(
        
        "file_type_to_id" => array("photo" => 1, "video" =>2),
        "property_type_to_name" => array(1 => "casa", 2=> "apartamento", 3=> "solar", 4=>"penthhouse", 5=>"centro comercial", 6=> "edificio", 7=>"nave industrial", 8=> "oficina", 9 =>"finca"),
        "user_type_to_validation_rules" => array("client" => "signupClient", "company" => "signupCompany", "edit_client" => "edit_clent"),
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
    );
    public static $environment_vars = array(
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
            
            
        ),
        
        'user_photos_dir_path' => '/images/userPhotos/',
        'user_photos_thumbs_dir_path' => '/images/userPhotosThumbs/',
        'properties_photos_dir_path' => '/images/propertiesPhotos/',
        'properties_photos_thumbs_dir_path' => '/images/propertiesPhotosThumbs/'
        
    );

}

?>
