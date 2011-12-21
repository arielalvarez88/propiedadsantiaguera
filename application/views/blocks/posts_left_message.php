<?php
$posts_left = isset ($posts_left) && $posts_left ? $posts_left : 0;
?>
<p id="posts-left-message">Actualmente usted dispone de <span><?php echo $posts_left; ?></span> espacios disponibles para publicar sus propiedades</p>