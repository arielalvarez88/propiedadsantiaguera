<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class File_handler {

    public static function file_to_upload_exits($input_name) {
        
        return isset($_FILES[$input_name]) && $_FILES[$input_name]['size'];
    }

    public static function file_exists($file_path)
    {
        
        return file_exists($file_path) || file_exists(realpath("./".$file_path))? true : false;
    }
    
    public static function save_file($inputs_names, $upload_path, $mime_types = '', $max_file = 4096){
        
        $CI_Helper = get_instance();
        $photos_full_paths = array();
    
        
        foreach ($inputs_names as $input_name) {

            if (File_handler::file_to_upload_exits($input_name)) {
                    
                $config['upload_path'] = realpath("./".$upload_path);                          
                $config['file_name'] = time() ;
                
                 
                    
                if($mime_types)                
                    $config['allowed_types'] = $mime_types;
              else
                $config['allowed_types'] = "*";
              
              
                $config['max_size'] = $max_file;
                $CI_Helper->load->library('upload');
                
                $CI_Helper->upload->initialize($config);

                if (!$CI_Helper->upload->do_upload($input_name)) {
                   
                    throw new Exception("Se produjo un error al subir sus fotos, asegúrese que sus archivos sean fotos e intentelo denuevo.");
                }
                $user_photo_info = $CI_Helper->upload->data();
    
                $photos_full_paths[$input_name] = $upload_path.$user_photo_info['file_name'];
                
            }
        }
      
        
        
            return $photos_full_paths;
    }
 
    public static function save_photos($inputs_names, $upload_path) {

        
        return File_handler::save_file($inputs_names, $upload_path, "gif|jpg|png");

    }

}

?>
