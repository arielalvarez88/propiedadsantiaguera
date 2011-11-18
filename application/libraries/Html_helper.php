<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Html_helper
{
    public static function get_select_from_key_value($key_value_options,$attributes_array,$default_text='',$selected_value = 'null')
    {
        $attributes_html = '';
         foreach($attributes_array as $attribute => $value)
         {
             $attributes_html .= $attribute.'="'.$value.'"';
         }
        $initial_select_tag = '<select '.$attributes_html.'>';
        $options = $default_text ?  '<option value="null">'.$default_text.'</option>' : '';
        foreach($key_value_options as $text => $value)
        {
            
                $options .= $value == $selected_value ? '<option value="'.$value.' selected="selected">'.ucwords($text).'</option>' : '<option value="'.$value.'">'.ucwords($text).'</option>';
        }
        $select_end_tag = '</select>';       
        return $initial_select_tag.$options.$select_end_tag;
    }
    
    
    
}
?>
