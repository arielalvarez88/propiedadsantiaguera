<?php

$section = isset($section) ? $section : 'publicadas';
$published_pager = isset($published_pager) ? $published_pager : null;
$created_pager = isset($created_pager) ? $created_pager : null;


?>

<div id="panels-property-section-tab-container">
    

    
    <div id="panels-property-section-tab-tabs">
        <a id="panels-property-section-tab-tabs-published" data-show-selector="#panels-property-section-tab-published-properties" class="<?php echo $section == "publicadas" ? 'selected' : '';?> no-decoration-anchor panels-properties-tab-item" href="#javascript">Publicadas</a>
        <a id="panels-property-section-tab-tabs-created" data-show-selector="#panels-property-published-created-pager"" class="<?php echo $section == "creadas" ? 'selected' : '';?> no-decoration-anchor  panels-properties-tab-item" href="#javascript">Creadas</a>
    </div>
    

    
    
    
    
    <div id="panels-property-section-tab-published-properties" class="panels-properties-tab-body <?php echo $section == "publicadas" ? '' : 'hidden';?>">
        <?php echo $published_pager;?>
    </div>
    
    <div id="panels-property-published-created-pager" class="panels-properties-tab-body" <?php echo $section == "creadas" ? '' : 'hidden';?>
        <?php echo $created_pager;?>
    </div>
    
    
    
</div>
