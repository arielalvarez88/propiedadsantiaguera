<?php
$language = Language_handler::get_user_prefered_language();
$this->lang->load("properties_of_the_week",$language);

?>


<div id="properties-of-the-week">
    <h2 id="properties-of-the-week-header"><?php echo $this->lang->line("properties_of_the_week_header");?></h2>
    
            <div id="properties-of-the-week-video-container">
                <object id="properties-of-the-week-video">
                    <param name="movie" value="http://www.youtube.com/v/eQkSc9cm5G8?version=3">
                    <param name="allowFullScreen" value="true">
                    <param name="allowScriptAccess" value="always">
                    <param name="wmode" value="opaque"/>
                    <embed src="http://www.youtube.com/v/eQkSc9cm5G8?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="403" height="281" wmode="opaque">
                </object>                
            </div>
       

</div>