<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Thumbnail_creator extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }
    
    public function resize($path,$width, $height)
    {
        $config['source_image'] = realpath('./'.$path);
        $config['width'] = $width;
        $config['height'] = $height;
        $config['dynamic_output'] = true;
        
        $this->image_lib->initliaze($config);
        $this->image_lib->resize();
    }
    
}


?>
