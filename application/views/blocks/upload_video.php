<form action="<?php echo $post_url;?>?nexturl=<?php echo $next_url;?>" method="post" enctype="multipart/form-data">
        <input name="file" type="file"/>
        <input name="token" type="hidden" value="<?php echo $token;?>"/>
       <input value="Upload Video File" type="submit" /> 
</form>