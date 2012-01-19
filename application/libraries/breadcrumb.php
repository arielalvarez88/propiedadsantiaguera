<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class BreadCrumb
{
    
    public $base_url;
    public $visited_sections;
    
    
    
    public function __construct($base_url='')
    {
        $this->base_url =$base_url?  $base_url: base_url();
        $this->visited_sections = array();
    }
        
    public function construct_breadcrumb_for_property($property){
        
        $this->add_link("Inicio", base_url(), "Inicio");
        $this->add_to_section(Environment_vars::$maps['ids_to_text']['property_types'][$property->type], "?type=".$property->type, "Buscar");
        $this->add_to_section(Environment_vars::$maps['ids_to_text']['provinces'][$property->province], "&province=".$property->province, "Buscar");
        $this->add_to_section(Environment_vars::$maps['ids_to_text']['property_neighborhoods'][$property->neighborhood], "&neighborhood=".$property->neighborhood, "Buscar");
        $this->add_link("#".$property->id, base_url()."propiedades/ver/".$property->id, "Propiedad");
        
        
    }
    
    public function add_to_section($title, $url_section, $section)
    {
        
        
        if(!isset($this->visited_sections[$section]))
        {
            
            $this->visited_sections[$section] = array();
            $this->visited_sections[$section][] = array('title' => $title, 'url' => $this->base_url.$url_section);
            
        }

        else
        {
            
            
            $last_index = count($this->visited_sections[$section]) - 1;
            $previous_url = $this->visited_sections[$section][$last_index]['url'];
            
            $this->visited_sections[$section][] = array('title' => $title, 'url' => $previous_url.$url_section);
        }
            
        
    }
    
    
     public function add_link($title, $url, $section)
    {
         if(!isset($this->visited_sections[$section]))
        {
            
            $this->visited_sections[$section] = array();
            
        }
        
        $this->visited_sections[$section][] = array('title' => $title, 'url' => $url);
                
    }
    
    public function print_breadcrumb($separator = ' > ', $atrributes = array())
    {
        $sections = array();
        $html_attributes ='';
        
        foreach($atrributes as $atrribute => $value)
        {
            $html_attributes .= $attribute.'="'.$value.'" ';  
        }
        
        foreach ($this->visited_sections as $section_name => $visited_sections)
        {
            foreach ($visited_sections as $visited_section)
                $sections [] = '<a href="'.$visited_section['url'].'"' .$html_attributes.' >'.$visited_section['title'].'</a>';
        }
        
        $final_html = implode($separator, $sections);
        return $final_html;
    }
    
    public function remove_sections_above($title)
    {
        $number_of_sections = count($this->visited_sections);
        $index_of_section = 0;
        for($i=0; $i < $number_of_sections; $i++)
        {
            if($this->visited_sections[$i]['title'] == $title)
            {
                    $index_of_section = $i;
                    break;
            }
                
        }
        
        $this->visited_sections = array_slice($this->visited_sections, 0, $index_of_section);
        
    }
    
    
    
    
}
?>
