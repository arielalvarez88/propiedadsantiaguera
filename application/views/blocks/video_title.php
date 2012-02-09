<?php 

$error_messages = isset($error_messages) ? $error_messages : '';
$info_messages = isset($info_messages) ?  $info_messages : '';
?>

<form id="video_title" action="<?php echo base_url();?>cms/validate_video" method="post">
    
    
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
    
    
    <h1>Por favor ingrese el nombre del título del video</h1>
    <input type="text" name="video-title"/>
    
    
    <h1>Por favor ingrese la descripcion del video</h1>
    <textarea name="video-description">

    </textarea>
    
    <input type="submit" value="continuar"/>
    
</form>