<?php $i = 1; ?>

<div id="agents-pager">
    
    <div class="tabs-container">
        <a class="tab-item selected">Agentes</a>
    </div>
    <table>


        <?php foreach ($agents as $agent): ?>

            
            <?php $odd = $i % 3 == 0 || $i == 1;?>
        <?php $even = $i %2 ==0;?>
          <?php if($odd):?>
            <tr>
            <?php endif;?>

                <td class="agent-info <?php echo $odd ? 'odd' : 'even';?>">
                    <img class="agent-pager-agent-photo" src="<?php echo $agent->photo; ?>" alt="agent-image"/>
                    <div  class="agent-pager-agent-info">
                        <h3><?php echo $agent->name; ?><?php echo $agent->lastname ? ' ' . $agent->lastname : ''; ?></h3>
                        <p>Publicaciones Disponibles: <?php echo $agent->posts_left; ?></p>
                        
                        <div class="agent-pager-green-buttons-container">
                            <a class="green-button view-agent-properties no-decoration-anchor" href="/miembros/ver/<?php echo $agent->id;?>">Ver Propiedades</a>
                            <a class="green-button give-agent-publication no-decoration-anchor" href="/panel/pass_posts_overlay">Agregar Publicaci&oacute;n</a>
                        </div>
                        
                        <div class="edit-delete-agent-buttons">
                            <a href="/usuario/editar/<?php echo $agent->id;?>" class="no-decoration-anchor"><span class="edit-agent"></span><span>Editar</span></a>
                            <a href="/miembros/eliminar/<?php echo $agent->id;?>" class="no-decoration-anchor"><span class="delete-agent"></span><span>Eliminar</span></a>
                        </div>

                    </div>

                </td>

            <?php if ($even): ?>
                    </tr>
            <?php endif; ?>
            <?php $i++; ?>

        <?php endforeach;?>
    </table>

</div>