<div id="panels-property-section-menu-container">
    
      <?php if(isset($messages) && isset ($messages['errors'])):?>
    <div class="error-messages">
        <?php echo $messages['errors'];?>
    </div>
    <?php endif;?>
    <div id="panels-property-section-menu">
        
        <div id="panels-property-section-header-container">
            <h2 id="panels-property-section-menu-header">Propiedades</h2>
        
            <a id="panels-property-section-menu-create-property" class="no-decoration-anchor"href="/propiedades/agregar_propiedades">CREAR PROPIEDAD</a>
        </div>
        
        
        <div id="panels-property-section-menu-properties-counter">
            <h2>Menu de propiedades</h2>
            
            <div id="panels-property-section-properties-counter-menu-created">
                <p>Creadas</p>
                <span><?php echo $user->get_number_of_properties();?></span>
            </div>
            
            <div id="panels-property-section-properties-counter-menu-posted">
                <p>Publicadas</p>
                <span><?php echo $user->get_number_of_posted_properties();?></span>
            </div>
            
            <div id="panels-property-section-properties-counter-menu-left">
                <p>Restantes</p>
                <span><?php echo $user->posts_left;?></span>
            </div>
            
        </div>
    </div>
    
    <div id="panels-property-section-menu-tabs">
        <a id="panels-property-section-menu-tabs-published" class="<?php echo $section == "published" ? 'selected' : '';?> no-decoration-anchor view-loader-element" href="#javascript">Publicadas</a>
        <a id="panels-property-section-menu-tabs-created" class="<?php echo $section == "created" ? 'selected' : '';?> no-decoration-anchor view-loader-element" href="#javascript">Creadas</a>
    </div>
    

    
    <div id="panels-property-section-pager">
        <?php echo $pager;?>
    </div>
    
    
    
</div>
