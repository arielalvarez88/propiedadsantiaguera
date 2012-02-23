<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Image_helper {

    public $config;
    public $CI_Helper;
    private $file_helper;

    public function __construct($library='gd2') {
        $this->config = array();
        $this->config['image_library'] = $library;
        $this->CI_Helper = get_instance();
        $this->file_helper = new File_handler();
    }

    public function resize($source_image_path, $width, $height, $new_image_path = "/images/propertiesPhotosThumbs/", $create_thumb = true, $maintain_ratio=false) {

        $filename_in_pieces = explode("/", $source_image_path);
        $filename = $filename_in_pieces[count($filename_in_pieces) - 1];
        $new_file_name = $width . '_' .$height . '_' . $filename ;
        $new_file_path = $new_image_path.$new_file_name;
        
        
        
          if($this->file_helper->file_exists($new_file_path))
                return $new_file_path;
        

          
        $this->config['source_image'] = realpath("./" . $source_image_path);
        $this->config['new_image'] = realpath("./".$new_image_path) . '/'.$new_file_name;
        $this->config['width'] = $width;
        $this->config['height'] = $height;
        
        
        
      
        

        $this->config['maintain_ratio'] = $maintain_ratio;

        if (!isset($this->CI_Helper->image_lib))
            $this->CI_Helper->load->library('image_lib', $this->config);

        $this->CI_Helper->image_lib->initialize($this->config);


        if ($this->CI_Helper->image_lib->resize())
            return $new_file_path;
  
        return false;
    }

    public function resize_by_user_type($source_image_path, $user_type) {
        $width = 0;
        $hegiht = 0;

        switch ($user_type) {
            case Environment_vars::$maps['texts_to_id']['user_types']['Empresa']:
                $width = 142;
                $height = 107;
                break;
            
            case Environment_vars::$maps['texts_to_id']['user_types_requesters']['Empresa']:
                $width = 142;
                $height = 107;
                break;

            default:
                $width = 107;
                $height = 121;
                break;
        }
        return $this->resize($source_image_path, $width, $height,  Environment_vars::$paths['user_photos_thumbs_dir_path']);
    }

    public function get_user_photo_thumb_version($photo_html_path) {
        $photo_file_exists = $this->file_helper->file_exists($photo_html_path);

        if (!$photo_file_exists)
            return false;


        $photo_html_path_pieces = explode("/", $photo_html_path);
        $photo_file_name = $photo_html_path_pieces[count($photo_html_path_pieces) - 1];


        $thumb_html_path = Environment_vars::$environment_vars['user_photos_thumbs_dir_path'] . $photo_file_name;

        $thumb_exists = $this->file_helper->file_exists($thumb_html_path);

        if ($thumb_exists)
            return $thumb_html_path;


        if ($this->resize($photo_html_path, 95, 95, Environment_vars::$environment_vars['user_photos_thumbs_dir_path']))
            return $thumb_html_path;
        else
            return false;
    }

}

?>
