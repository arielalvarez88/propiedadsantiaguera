<form id="upload-document"  action="<?php echo base_url();?>cms/validate_document" method="post" enctype="multipart/form-data" >
    
    <h2>Agregar un documento</h2>
    
    <p>Titulo del documento:</p>
    <input type="text" name="title"/>
    
    <p>Descripción del documento:</p>
    <textarea name="description"></textarea>
    
    
    
    <p>Seleccione un documento:</p>
    <input type="file" name="document"/>
    
    <input type="submit" value="salvar"/>
</form>