<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of date_helper
 *
 * @author ariel
 */
function NOW()
{
    return date('Y-m-d H:i:s');
}


function timestamp_to_mysql_datetime($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}

function spanish_userfriendly_date($timestamp =null)
{
    setlocale(LC_TIME,"es_ES.utf8");
    $timestamp = $timestamp ? $timestamp : strtotime(NOW());
    
    
       setlocale(LC_TIME,"es_ES.utf8");
    $day = "%e";
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
    {
        $day = "%#d";
    }
    
    $fecha = new stdClass();
    $fecha->dia_numero = date("j");
    $fecha->dia_texto = strftime("%A");

    $fecha->mes = strtoupper(strftime("%B"));
    $fecha->ano = strftime("%Y");
    $vars['fecha'] = $fecha;
    
    return date('');
}




?>
