<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


require_once "ICacheableSection.php";

class Neighborhoods_selects_cacheable_section implements ICacheableSection
{
    public $cache_name;
    public $neighborhood_attributes;
    public $neighborhood_default_text;
    public $neighborhood_selected_value;
    public $CI_helper;
    
    public function __construct($cache_name, $neighborhood_attributes, $neighborhood_default_text, $neighborhood_selected_value)
    {
        $this->cache_name = $cache_name;
        $this->neighborhood_attributes = $neighborhood_attributes;
        $this->neighborhood_default_text = $neighborhood_default_text;
        $this->neighborhood_selected_value = $neighborhood_selected_value;
        $this->CI_helper = & get_instance();
        $this->CI_helper ->load->driver("cache", array("adapter" => "apc", "backup"=> "file"));
    }
    
public function get_cache_key() {
        return $this->cache_name;
    }
    
public function get_content_to_cache() {
                 

$this->CI_helper->cache->get("all_provinces");
       
        
        $provinces = $this->CI_helper->cache->get("all_provinces");

   
        if(!$provinces)
        {
            
            $provinces = new Province();
            
            $provinces->order_by("name")->get();
            
            $this->CI_helper->cache->save("all_provinces",$provinces);
                     
        }
                           
       
        

        $neighborhoods_selects_html = '';
        
        foreach($provinces as $province){            
             
             $neighborhoods = $province->neighborhood->order_by("name")->get();
            $neighborhoods_array = array();
             foreach($neighborhoods as $neighborhood)
             {
                 $neighborhoods_array[$neighborhood->name] = $neighborhood->id;
             }
            $specific_neighborhood_attribute = $this->neighborhood_attributes;            
            $specific_neighborhood_attribute['id'] .=  '-' . $province->id;            
            $specific_neighborhood_attribute['data-province'] = $province->id;            
                
            
            $neighborhoods_selects_html .= Html_helper::get_select_from_key_value($neighborhoods_array, $specific_neighborhood_attribute, $this->neighborhood_default_text, $this->neighborhood_selected_value);            
            
        }
                                                               
        return $neighborhoods_selects_html;
        
               
    }
}
?>
