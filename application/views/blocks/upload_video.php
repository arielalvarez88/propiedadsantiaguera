<?php

$post_url = isset($post_url) ? $post_url : null;
$token = isset($token) ? $token : null;
$message = isset($message) ? $message : "Seleccione un video para agregarlo a su propiedad:";

?>

<div id="upload-video">
    


<h1> <?php echo $message; ?> </h1>
<?php if ($post_url && $token): ?> 
    <form action="<?php echo $post_url; ?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/>
        <input name="token" type="hidden" value="<?php echo $token; ?>"/>
        <input value="Upload Video File" type="submit" /> 
    </form>
<?php endif; ?>


</div>