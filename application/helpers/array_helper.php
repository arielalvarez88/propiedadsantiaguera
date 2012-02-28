<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of array_helper
 *
 * @author ariel
 */
function lossless_array_merge() {
  $arrays = func_get_args();
  $data = array();
  foreach ($arrays as $a) {
    foreach ($a as $k => $v) {
      $data[$k][] = $v;
    }
  }
  return $data;
}


?>
