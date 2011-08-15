<?php
$webPath = '/images/frontPageSlideShow/';
$filesPath = realpath('.'.$webPath);

$folder = opendir($filesPath);
$files = array();
while($file = readdir($folder))
{
    if($file != '.' && $file != '..')
        $files[]= $file;


}

?>
<div id="front-page-slide-show">
    <?php foreach($files as $file):?>
    <img src="<?php echo $webPath.$file?>">
    <?php endforeach;?>
</div>
<div id="front-page-slide-show-pager">
    
</div>
