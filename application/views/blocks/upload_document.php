<?php 

$error_messages = isset($error_messages) ? $error_messages : null;
$info_messages = isset($info_messages) ? $info_messages :null;
?>


<form id="upload-document"  action="<?php echo base_url();?>cms/validate_document" method="post" enctype="multipart/form-data" >
    
    
    <?php if($error_messages):?>
    <div class="error-messages">
        <?php echo $error_messages;?>
    </div>
    <?php endif;?>
    
    <?php if($info_messages):?>
    <div class="info-messages">
        <?php echo $info_messages;?>
    </div>
    <?php endif;?>
    
    <h2>Agregar un documento</h2>
    
    <p>Titulo del documento:</p>
    <input type="text" name="title"/>
    
    <p>Descripción del documento:</p>
    <textarea name="description"></textarea>
    
    
    
    <p>Seleccione un documento:</p>
    <input type="file" name="document"/>
    
    <input type="submit" value="salvar"/>
</form>