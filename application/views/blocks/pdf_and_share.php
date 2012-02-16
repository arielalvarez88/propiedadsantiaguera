<?php

$property = isset($property) ? $property : null
?>


<div id="pdf-and-share">
    
    <p>
        <span><a class="no-decoration-anchor print-button" href="#">Imprimir </a></span>
    </p>
    
    <div id="pdf-and-share-share">
        <h2>Compartir </h2> 
        
        
        <div class="fb-like" data-href="<?php echo base_url();?>/propiedades/ver/<?php echo $property->id;?>" data-send="true" data-layout="button_count" data-width="220" data-show-faces="true" data-action="recommend" data-font="arial"></div>                
        

        
    </div>
</div>