<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once realpath("./application/libraries/Provinces_select_cacheable_section.php");


class Cache_manager
{
    public $cacheable_section;
    public $CI_helper;
    
    
    public function __construct(ICacheableSection $cacheable_section)
    {
        $this->cacheable_section = $cacheable_section;
        $this->CI_helper = & get_instance();
        $this->CI_helper->load->driver('cache', array("adapter" => "file", "backup" => "apc"));
        
        
        }
    
    public function get_content()
    {
        
        $content = $this->CI_helper->cache->file->get($this->cacheable_section->get_cache_key());
        
        if(!$content)
        {
            $content = $this->cacheable_section->get_content_to_cache();
$this->CI_helper->cache->save($this->cacheable_section->get_cache_key(), $content);
        }
        
        return $content;
            
    }
    
    
    
    public function clean_cache_variable($variable_to_clean ='')
    {
        if(!$variable_to_clean)
            $variable_to_clean = $this->cacheable_section->get_cache_key();        
        $this->CI_helper->cache->file->delete($variable_to_clean);
    }
    
    public function clean_entire_cache($variable_to_clean ='')
    {
        
        $this->CI_helper->cache->file->clean();
    }
    
}
?>
