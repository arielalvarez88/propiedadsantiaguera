<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$cms_video = isset($cms_video) ? $cms_video : null;


?>
<iframe id="tools_center_video" width="565" height="359" src="<?php echo $cms_video->url;?>&wmode=opaque" frameborder="0" allowfullscreen ></iframe>