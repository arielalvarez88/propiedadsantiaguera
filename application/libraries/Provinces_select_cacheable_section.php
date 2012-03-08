<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


require_once "ICacheableSection.php";

class Provinces_select_cacheable_section implements ICacheableSection
{
    public $cache_name;
    public $provinces_attributes;
    public $provinces_default_text;
    public $provinces_selected_value;
    public $CI_helper;
    
    public function __construct($cache_name, $provinces_attributes, $provinces_default_text, $provinces_selected_value)
    {
        $this->cache_name = $cache_name;
        $this->provinces_attributes = $provinces_attributes;
        $this->provinces_default_text = $provinces_default_text;
        $this->provinces_selected_value = $provinces_selected_value;
              $this->CI_helper = & get_instance();
        $this->CI_helper ->load->driver("cache", array("adapter" => "file", "backup"=> "apc"));
    }
    
public function get_cache_key() {
        return $this->cache_name;
    }
public function get_content_to_cache() {

        $i = 0;
        $CI_helper = & get_instance();                        
        $CI_helper->cache->clean();
        $provinces = $this->CI_helper->cache->get("all_provinces");
        
        
        if(!$provinces || true)
        {
            $provinces = new Province();
            $provinces->order_by("name")->get();
            $this->CI_helper->cache->save("all_provinces",$provinces);
        }
         
        
        $provinces_array= array();
        
        foreach($provinces as $province)
        {
            $provinces_array[$province->name] = $province->id;
        }
            
        
        $provinces_select_html = Html_helper::get_select_from_key_value($provinces_array, $this->provinces_attributes, $this->provinces_default_text, $this->provinces_selected_value);
                                             
        return $provinces_select_html;
                       
    }
}
?>
