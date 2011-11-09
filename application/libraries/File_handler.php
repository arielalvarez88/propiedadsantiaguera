<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class File_handler {

    public static function file_to_upload_exits($input_name) {
        
        return isset($_FILES[$input_name]) && $_FILES[$input_name]['size'];
    }

    public static function save_photos($inputs_names =array(), $upload_path, $max_size) {

        $CI_Helper = get_instance();
        $photos_full_paths = array();
        foreach ($inputs_names as $input_name) {

      
            if (File_handler::file_to_upload_exits($input_name)) {

                $photo_config['upload_path'] = $upload_path;
                $photo_config['file_name'] = time() ;
                $photo_config['allowed_types'] = 'gif|jpg|png';
                $photo_config['max_size'] = '1000';
                $CI_Helper->load->library('upload', $photo_config);

                if (!$CI_Helper->upload->do_upload($input_name)) {                                        
                    throw new Exception("Se produjo un error al subir sus fotos, asegúrese que sus archivos sean fotos e intentelo denuevo.");
                }
                $user_photo_info = $CI_Helper->upload->data();
    
                $photos_full_paths[] = $user_photo_info['file_name'];
            }
        }
      
        if ($photos_full_paths)
            return $photos_full_paths;

        return true;
    }

}

?>
