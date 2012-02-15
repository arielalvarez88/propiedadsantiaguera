<?php

$property = isset($property) ? $property : null
?>


<div id="pdf-and-share">
    
    <p>
        <img id="pdf-and-share-pdf-icon" src="<?php base_url();?>/images/pdfConverter/pdfIcon.png"><span><a class="no-decoration-anchor print-button" href="#">Imprimir </a>/ Guardar en PDF</span>
    </p>
    
    <div id="pdf-and-share-share">
        <h2>Compartir </h2> 
        
        
        <div class="fb-like" data-href="<?php echo base_url();?>ver/<?php echo $property->id;?>" data-send="true" data-layout="button_count" data-width="220" data-show-faces="true" data-action="recommend" data-font="arial"></div>                
        

        
    </div>
</div>