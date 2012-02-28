<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

interface ICacheableSection{
    public function get_content_to_cache();
    public function get_cache_key();    
}


?>
