<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of str_helpers
 *
 * @author ariel
 */
function capitalize($str) {
    $upper_str = strtoupper($str);
    $upper_str = str_replace("á", "Á", $upper_str);
    $upper_str = str_replace("é", "É", $upper_str);
    $upper_str = str_replace("í", "Í", $upper_str);
    $upper_str = str_replace("ó", "Ó", $upper_str);
    $upper_str = str_replace("ú", "Ú", $upper_str);
    $upper_str = str_replace("ñ", "Ñ", $upper_str);
    
    return $upper_str;
}

?>
