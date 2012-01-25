<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once realpath('./application/libraries/Property_inscriber.php');
require_once realpath('./application/libraries/Property_info_getter_from_object.php');
class Property_editor extends Property_inscriber
{
    
    
    public function save_photos($property_object, $properties_photos_filenames) {
      
        $property_info_getter_from_object = new Property_info_getter_from_object($property_object);
        
        $actual_photos = $property_info_getter_from_object->get_photos();
        $photos = array();
        
        
        for($i=1; $i<= PHOTOS_PER_PROPERTY; $i++) {

              $zero_based_index = $i-1;
            $iesim_input_name = 'property-photo-'.$i;
            if( isset ($actual_photos[$zero_based_index ]) && isset($properties_photos_filenames[$iesim_input_name]))
            {
                $file_path = realpath($actual_photos[$zero_based_index]->path);
                
                if(is_file($file_path))
                    unlink ($file_path);
                
                $actual_photos[$zero_based_index]->path = $properties_photos_filenames[$iesim_input_name];
                $actual_photos[$zero_based_index]->save();
                
                
                $is_main_photo = $zero_based_index == 0;
                if($is_main_photo )                
                    $property_object->main_photo = $properties_photos_filenames[$iesim_input_name];
                
            }
            else if(isset($properties_photos_filenames[$iesim_input_name]))
            {
                $new_photo = new File();
                $new_photo->path = $properties_photos_filenames[$iesim_input_name];
                $new_photo->type = Environment_vars::$maps['file_type_to_id']['photo'];
                $new_photo->save();
                $photos [] = $new_photo;
                       
                $is_main_photo = $zero_based_index == 0;
                if($is_main_photo )                
                    $property_object->main_photo = $properties_photos_filenames[$iesim_input_name];
            }
            
            
                
        }

        return $photos;
    
    }
}
?>
