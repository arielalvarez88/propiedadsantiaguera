<?php

class Slideshows_utilities
{
    public static function getPagerImagesSubset($imagesArray, $setsSize)
    {
        $length = count($imagesArray);
        $imagesSets = array();
         
        
        
        for($i=0; $i < $length; $i++)
        {
            $numbersOfPicsOfThisSet = $i + $setsSize-1 <= $length-1 ? $setsSize : $length - $i;   
            
            $imagesSets[] = implode(" ", array_slice($imagesArray, $i, $numbersOfPicsOfThisSet));
           
            if(($i + $numbersOfPicsOfThisSet-1) == $length-1)
                break;
        }
       
        
        return $imagesSets;
        
    }
    
        public static function getPagerSubset($elementsArray, $setsSize)
    {
        
        $length = count($elementsArray);
        $imagesSets = array();
        
        if($length <= $setsSize)
        {
            $imagesSets [] = $elementsArray;
            return $elementsArray;
        }
            
        
        
         
        
        
        for($i=0; $i < $length; $i++)
        {
            //$numbersOfPicsOfThisSet = $i + $setsSize-1 <= $length-1 ? $setsSize : $length - $i;   
            
            $imagesSets[] =  array_slice($elementsArray, $i, $setsSize);
           
//            if(($i + $numbersOfPicsOfThisSet-1) == $length-1)
//                break;
        }
       
        
        return $imagesSets;
        
    }
    
    
}
?>
