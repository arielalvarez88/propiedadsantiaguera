<div id="panels-properties-pager-container" class="optional-view">
  
    
    <form id="panels-properties-pager" action="/propiedades/guardar_cambios_publicar/" method="post">
         <input type="hidden" name="properties-matched-count" value="<?php echo $properties->result_count();?>" />
        <?php foreach ($properties as $property): ?>
        
        <div class="panels-properties-pager-property">
            <img src="/images/common/panelPropertiesThumb.png"/>

            <div class="panels-properties-pager-property-info">
                <h2><a class="no-decoration-anchor  panels-properties-pager-property-info-title-link" href="/propiedades/ver/<?php echo $property->id;?>"><?php echo $property->title;?></a></h2>
                

                <div class="panels-properties-pager-property-info-buttons">
                    
                    
                        <?php if($section == 'published'):?>
                            <p>Tiempo Restante: <?php echo $property->days_left;?></p>
                            <input id="panels-properties-pager-property-info-buttons-reactivation" type="checkbox"/>
                            <div>
                                <label for="panels-properties-pager-property-info-buttons-reactivation">Auto reactivacion </label>
                            </div>
                            <a href="/propiedades/editar_propiedades/<?php echo $property->id;?>" class="no-decoration-anchor">Detalles</a> 
                            
                            <?php else:?>
                            <div>
                                <lable for="panels-properties-pager-property-info-buttons-publish">Publicar</lable>
                                <input name="publish-property-<?php echo $property->id;?>" id="panels-properties-pager-property-info-buttons-publish" type="checkbox"/>
                            </div>
                            
                             <a href="/propiedades/editar_propiedades/<?php echo $property->id;?>" class="no-decoration-anchor">Detalles</a> 
                             <a href="/propiedades/eliminar/<?php echo $property->id;?>" class="no-decoration-anchor">Eliminar</a> 
                                
                        <?php endif;?>
                            
                    

                </div>                                                            
            </div>

        </div>

 

        <?php endforeach; ?>
        
        
        <?php if($section == 'created'):?>
            <input id="panels-properties-pager-submit-button" type="image" src="/images/panelsPropertiesPager/submitButton.png"/>
        <?php endif;?>
    </form>

</div>