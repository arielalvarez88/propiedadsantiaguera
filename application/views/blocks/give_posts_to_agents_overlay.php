<?php
$agents = $agents ? $agents : null;

$posts_left = $posts_left === false ? null : $posts_left;
$i = 1;
?>
<div id="give-posts-to-agents-overlay">
    <h2 class="overlay-header">Agregar Publicaci&oacute;n para agente</h2>
    <img id="give-posts-to-agents-overlay-close-button" class="overlay-close-button"  src="<?php base_url();?>/images/common/fancy_close.png"/>
 <div class="error-messages hidden">
        </div>
        <div class="info-messages hidden">
            
        </div>
    
    <div id="give-posts-to-agents-overlay-content">
       
            
    <div id="give-posts-to-agents-overlay-agents">
        
        <?php foreach ($agents as $agent): ?>
        <div>
                        <label><?php echo $agent->name;?></label>
            <input type="text" id="give-posts-to-agents-overlay-agent-<?php echo $i; ?>" name="posts-to-agent-<?php echo $i;?>"/>
            <input type="hidden" name="agent-id-<?php echo $i;?>"  value="<?php echo $agent->id;?>"/>
        </div>
        <?php $i++;?>

        <?php endforeach; ?>
        <a class="green-button" id="give-posts-to-agents-overlay-save-button">Salvar</a>
        <a class="green-button" id="give-posts-to-agents-overlay-cancel-button">Cancelar</a>
    </div>
    <div id="give-posts-to-agents-overlay-posts-left">
        <h2 class="green-button">
            Publicaciones Disponibles
        </h2>
        
        <h1><?php echo $posts_left;?></h1>
    </div>
    </div>

</div>