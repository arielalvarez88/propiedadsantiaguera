<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Image_helper
{
    
    public $config;
    public $CI_Helper;
    public function __construct($library='gd2')
    {
        $this->config = array();
        $this->config['image_library'] = $library;
        $this->CI_Helper = get_instance();
        
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
}
?>
