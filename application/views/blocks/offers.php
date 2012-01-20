
<?php $section = isset ($section) && $section? $section : '';?>
<div id="<?php echo $section;?>offers-container">
        <div id="offers">
            <h2>Oferta</h2>
            <div>
                <p>
                    Aprovecha 
                </p>
            </div>
        </div>

        
            
            <a href="<?php base_url();?>/miembros/eliminar/<?php echo $user->id;?>" class="green-button">
                Cancelar Cuenta
            </a>
 </div>