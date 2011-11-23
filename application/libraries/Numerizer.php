<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


Class Numerizer{
    
   public static function numerize($number)
   {
	 $find_comma = substr_count($number, ',');
	 if ($find_comma > 0) 
	 {
	 	 $number = str_replace(",","",$number);
	 }
	 else
	 {
	     $number = number_format($number);	
	 }
	 return $number;
   }
}
?>
