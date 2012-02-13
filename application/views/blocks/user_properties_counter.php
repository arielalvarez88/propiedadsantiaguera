
<?php
$user = $user? $user : nuill;

?>

<?php if($user->id):?>

<div id="panels-property-section-properties-counter">
            <h2>Menu de propiedades</h2>
            
            <div id="panels-property-section-properties-counter-menu-created">
                <p>Creadas</p>
                
                <span><?php echo $user->get_number_of_properties();?></span>
                
            </div>
            
            <div id="panels-property-section-properties-counter-menu-posted">
                <p>Publicadas</p>
                <span><?php echo $user->get_number_of_posted_properties();?></span>
            </div>
            
            <div id="panels-property-section-properties-counter-menu-left" class="last">
                <p>Restantes</p>
                <span><?php echo $user->posts_left;?></span>
            </div>
            
</div>

<?php endif;?>