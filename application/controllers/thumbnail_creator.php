<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Thumbnail_creator extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function resize($path,$width, $height)
    {
                $decoded_path = urldecode(base64_decode($path));
                
        $config['image_library'] = 'gd2';        
        $config['source_image'] = realpath('.'.$decoded_path);
        $config['width'] = $width;
        $config['height'] = $height;
        $config['dynamic_output'] = true;
        $config['maintain_ratio'] = false;
        $this->load->library('image_lib',$config);                
        
        $this->image_lib->resize();
        
        
    }
    
    public function resize_per_user_type($photo_url,$user_type)
    {
        $width =0;
        $hegiht = 0;
       
        switch ($user_type)
        {
            case Environment_vars::$maps['texts_to_id']['user_types']['Empresa']:
                $width = 142;
                $height = 107;
                break;
            
            default:
                $width = 107;
                $height = 121;
                break;
        }
        $this->resize($photo_url,$width,$height);
        
    }
    
    
}


?>
