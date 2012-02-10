<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$cms_Sdocuments = isset($cms_documents) ? $cms_documents: null;
$delete_permission = isset($delete_permission) ? $delete_permission : null;
?>

<?php if($cms_Sdocuments):?>
<div id="cms-documents-pager">
    
    <?php foreach($cms_documents as $document):?>
    <div class="cms-documents-pager-document">
        <h2 class="green-text"><?php echo $document->title;?></h2>
        <p>
            <?php echo $document->description;?>
                        
        </p>
        <a href="<?php echo base_url().$document->path;?>">Descargar</a>
        <?php if($delete_permission):?>
            <a class="block" href="<?php echo base_url();?>/cms/confirmacion_borrar_documento/<?php echo $document->id;?>">Eliminar</a>
        <?php endif;?>
        
    </div>
        
        
    <?php endforeach;?>
    
</div>
<?php endif;?>