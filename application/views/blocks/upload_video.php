<?php

$post_url = isset($post_url) ? $post_url : null;
$token = isset($token) ? $token : null;
$message = isset($message) ? $message : "Seleccione un video para agregarlo a su propiedad:";

?>

<div id="upload-video">
    


<h2> <?php echo $message; ?> </h2>

<?php if ($post_url && $token): ?> 
    <form action="<?php echo $post_url; ?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/>
        <input name="token" type="hidden" value="<?php echo $token; ?>"/>
        <input value="Upload Video File" type="submit" /> 
    </form>
<?php endif; ?>
<img src="<?php echo base_url();?>images/uploadVideo/videoNote.png"/>


</div>