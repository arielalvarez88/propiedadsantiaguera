
<?php



$property = isset($property) ? $property : null;
$owner = isset($owner) ? $owner : null;

$company = isset($company) ? $company : null;
?>



<div id="property-contact">
    
    
    
    <h2 id="property-contact-header">Solicitud de informaci&oacute;n</h2>
    <form id="property-contact-form">
        
        <div id="property-contact-errors" class=" error-messages hidden">
            
        </div>
        
        <div id="property-contact-info" class=" info-messages hidden">
            
        </div>

        <label class="property-contact-label" for="property-contact-nombre">Nombre </label>
        <input class="property-contact-usuario-info" name="name" type="text" id="property-contact-nombre"/>
        

        <label class="property-contact-label" for="property-contact-email">Email </label>
        <input class="property-contact-usuario-info" type="text" id="property-contact-email" name="email"/>

        <label class="property-contact-label" for="property-contact-email"> Tel&eacute;fono </label>
        <input class="property-contact-usuario-info" type="text" id="property-contact-email" name="number"/>

        <label id="property-contact-comentario-label" for="property-contact-comentario">Comentarios </label>
        <textarea id="property-contact-comentario" name="message">
        </textarea>

          
        <div id="property-contact-submit-container">
        

            <a id="property-contact-submit" href="#javascript" class="no-decoration-anchor">Enviar</a>
        </div>
        
        
        <input type="hidden" name="property-id" value="<?php echo $property->id;?>"/>
        <input type="hidden" name="property-title" value="<?php echo $property->title;?>"/>
        
        <input type="hidden" name="owner-email" value="<?php echo $owner->email;?>"/>

      <?php if($company):?>
                <input type="hidden" name="company-email" value="<?php echo $company->email;?>"/>
        <?php endif;?>


    </form>
</div>