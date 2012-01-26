<?php
$video_url = isset($video_url) ? $video_url : null;
$post_url = isset($post_url) ? $post_url : null;
$next_url = isset($next_url) ? $next_url : null;
$token = isset($token) ? $token : null;
?>


<?php if ($post_url && $next_url && $token): ?> 
    <form action="<?php echo $post_url; ?>?nexturl=<?php echo $next_url; ?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/>
        <input name="token" type="hidden" value="<?php echo $token; ?>"/>
        <input value="Upload Video File" type="submit" /> 
    </form>
<?php endif; ?>


<?php if ($video_url): ?>
    <iframe width="960" height="720" src="<?php echo $video_url;?>" frameborder="0" allowfullscreen></iframe>
<?php endif; ?>