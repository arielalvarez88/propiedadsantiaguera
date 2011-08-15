<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class fileUploader extends CI_Controller {

    function index() {
        
    }

    function photo() {
        echo 'aqui';
        return;
        // Set directories for upload location
        $this->config->load('uploading_script');
        $upload_dir = $this->config->item('upload_dir');
        $primary_dir = $this->input->post('directory');
        $secondary_dir = $this->config->item('secondary_dir');

        // Create Primary Directory if it does not exist
        if (!is_dir('./' . $upload_dir . '/' . $primary_dir . '/')) {
            mkdir('./' . $upload_dir . '/' . $primary_dir . '/');
        }

        // Create Secondary Directory if it does not exist
        if (!is_dir('./' . $upload_dir . '/' . $primary_dir . '/' . $secondary_dir . '/')) {
            mkdir('./' . $upload_dir . '/' . $primary_dir . '/' . $secondary_dir . '/');
        }

        // Configure Upload class
        $config['upload_path'] = './' . $upload_dir . '/' . $primary_dir . '/' . $secondary_dir . '/';
        $config['allowed_types'] = $this->config->item('acceptable_files');
        $config['max_size'] = $this->config->item('max_kb');
        $config['max_width'] = $this->config->item('max_width');
        $config['max_height'] = $this->config->item('max_height');

        $this->load->library('upload', $config);

        // Output json as response
        if (!$this->upload->do_upload()) {
            $json['success'] = false;
            $json['issue'] = $this->upload->display_errors('', '');
        } else {
            $json['success'] = true;
            foreach ($this->upload->data() as $k => $v) {
                $json[$k] = $v;
            }
        }

        echo json_encode($json);
    }

}

?>
