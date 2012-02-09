<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$cms_videos = isset($cms_videos) ? $cms_videos : null;

?>


<div id="tutorial-video-pager">
    <h2 class="green-text">Tutoriales</h2>
    <div id="tutorial-video-pager-content">
        
        <?php foreach($cms_videos as $cms_video):?>
        <div class="tutorial-video-pager-video-container">
            <a class="no-decoration-anchor tutorial-video-pager-video-thumb-container iframe" href="<?php echo $cms_video->url;?>"><img class="tutorial-video-pager-video-thumb" src="<?php echo $cms_video->thumbnail;?>" alt="foto-del-video"/></a>
            <div>
                <a class="no-decoration-anchor tutorial-video-pager-video-title iframe" href="<?php echo $cms_video->url;?>"><h3 class="green-text"><?php echo $cms_video->title;?></h3></a>
                <p><?php echo $cms_video->description;?></p>
            </div>
        </div>
        
        <?php endforeach;?>
        
    </div>
    
    
</div>
