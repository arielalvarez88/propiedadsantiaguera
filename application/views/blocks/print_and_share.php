<?php

$property = isset($property) ? $property : null
?>


<div id="print-and-share">
    
    <p>
        <span><img id="print-and-share-print-icon" src="<?php echo base_url();?>/images/printAndShare/printIcon.png"/><a class="no-decoration-anchor print-button" href="#">Imprimir </a></span>
    </p>
    
    <div id="print-and-share-share">
        <h2>Compartir </h2> 
        
        
        <div class="fb-like" data-href="<?php echo base_url();?>/propiedades/ver/<?php echo $property->id;?>" data-send="true" data-layout="button_count" data-width="220" data-show-faces="true" data-action="recommend" data-font="arial"></div>
        
        <a class="no-decoration-anchor" id="print-and-share-email-share" href="/ajax/view_loader/blocks/overlay_share_email" ><img src="" alt="Icono de compartir"/> Enviar propiedad por correo</a>

        
    </div>
</div>