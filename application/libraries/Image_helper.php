<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Image_helper
{
    
    public $config;
    public $CI_Helper;
    private $file_helper;
    public function __construct($library='gd2')
    {
        $this->config = array();
        $this->config['image_library'] = $library;
        $this->CI_Helper = get_instance();
        $this->file_helper = new File_handler();
    }
    
    public function resize($source_image_path, $width, $height, $new_image_path = "/images/propertiesPhotosThumbs/", $create_thumb = true, $maintain_ratio=false )
    {
        
        
        $this->config['source_image'] = realpath("./".$source_image_path);
        
        $this->config['new_image'] =realpath("./".$new_image_path);
        $this->config['width'] = $width;
        $this->config['height'] = $height;
        
        $this->config['maintain_ratio'] = $maintain_ratio;
        
        if(!isset($this->CI_Helper->image_lib))
                $this->CI_Helper->load->library('image_lib',$this->config);                
     
        $this->CI_Helper->image_lib->initialize($this->config);                
        
            
        
        return $this->CI_Helper->image_lib->resize();
        
    }
    
    
    
    public function get_user_photo_thumb_version($photo_html_path)
    {
         $photo_file_exists = $this->file_helper->file_exists($photo_html_path);
        
        if(!$photo_file_exists)
            return false;
        
        
        $photo_html_path_pieces = explode("/", $photo_html_path);
        $photo_file_name = $photo_html_path_pieces[count($photo_html_path_pieces) -1];
    
  
        $thumb_html_path = Environment_vars::$environment_vars['user_photos_thumbs_dir_path'].$photo_file_name;
        
         $thumb_exists = $this->file_helper->file_exists($thumb_html_path);
   
         if($thumb_exists)
             return $thumb_html_path;
                              

        if($this->resize($photo_html_path, 95, 95, Environment_vars::$environment_vars['user_photos_thumbs_dir_path']))
                return $thumb_html_path;
        else
            return false;
        
        
        
    }
    
}
?>
