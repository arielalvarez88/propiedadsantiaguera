<?php



$info_messages = isset ($info_messages) ? $info_messages : null;
$error_messages  = isset ($error_messages) ? $error_messages : null;
?>

<div id="articles-template-container">
    <h1>Crear Art&iacute;culo</h1>
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
    
    <form id="articles-template" method="post" action="<?php echo base_url();?>cms/validate_article" enctype="multipart/form-data"> 
        
        
        <p>Titulo:</p>
        <input name="title" type="text"/>
        
                <div id="articles-template-show-container">
             
                <label for="articles-template-show">Mostrar en portada:</label>
                <input id="articles-template-show" name="display_in_front_page" type="checkbox" />
         </div>
        
        
        <p>Photo:</p>
        <input name="photo" type="file" />
        
        
        <p>Cuerpo:</p>
        <textarea name="body" class="wysiwyg">
        </textarea>

        
          <p>Titulo de Preview en la portada:</p>
        <input name="preview-title" type="text"/>
        
        
         <p>Texto de Preview en la portada:</p>
        <textarea name="preview" >

        </textarea>
         
 
         <div>
        <input id="articles-template-submit" type="submit" value="Publicar" name="submit"/>
        </div>
    </form>
</div>