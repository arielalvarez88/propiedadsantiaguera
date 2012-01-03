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

$i=1;
?>
<div id="front-page-slide-show">
    <?php foreach($files as $file):?>
    <img <?php echo $i==1? '' : 'class="hidden"'?> src="<?php echo $webPath.$file?>">
    <?php $i=2;?>
    <?php endforeach;?>
</div>
<div id="front-page-slide-show-pager">
    
</div>
