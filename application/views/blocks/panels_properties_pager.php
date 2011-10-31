<div id="panels-properties-pager-container" class="optional-view">
    <div id="panels-properties-pager">
        <?php foreach ($properties as $property): ?>
        
        <div class="panels-properties-pager-property">
            <img src="/images/common/panelPropertiesThumb.png"/>

            <div class="panels-properties-pager-property-info">
                <h2><?php echo $property->title;;?></h2>
                <p>Tiempo Restante: <?php echo $property->days_left;?></p>

                <div class="panels-properties-pager-property-info-buttons">
                    <a href="/propiedades/editar_propiedades/<?php echo $property->id;?>" class="no-decoration-anchor">Detalles</a> 
                    <div>
                        <input id="panels-properties-pager-property-info-buttons-reactivation" type="checkbox"/>
                        <label for="panels-properties-pager-property-info-buttons-reactivation">Auto reactivacion </label>
                    </div>

                </div>                                                            
            </div>

        </div>

 

        <?php endforeach; ?>
    </div>

</div>