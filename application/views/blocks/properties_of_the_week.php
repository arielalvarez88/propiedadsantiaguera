<?php
$language = Language_handler::get_user_prefered_language();
$this->lang->load("properties_of_the_week",$language);
$property = isset($property) ? $property : null;
?>


<div id="properties-of-the-week">
    <h2 id="properties-of-the-week-header"><?php echo $this->lang->line("properties_of_the_week_header");?></h2>
    
            <div id="properties-of-the-week-video-container">
                    <iframe id="properties-of-the-week-video" width="403" height="281" src="<?php echo $property->video;?>&wmode=opaque" frameborder="0" allowfullscreen ></iframe>
            </div>
       

</div>