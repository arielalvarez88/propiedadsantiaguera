<?php

$members_array = isset($members_array) ? $members_array : array();
$section = isset($section) ? $section : null;
$thumbs_width =  isset($thumbs_width) ? $thumbs_width : 142;
$thumbs_height= isset($thumbs_height) ? $thumbs_height : 142; 
$i=1;
?>


<div id="members-pager">
    <h2 id="members-pager-header"><?php echo ucwords($section);?></h2>

    
    <?php foreach($members_array as $member_array):?>
    
        <div class="members-pager-agente <?php echo ($i+1) % 4 == 0? 'members-pager-agente-last': '';?>">
            <a class="members-pager-agente-photo-container" href="/miembros/ver/<?php echo $member_array['id'];?>" class="no-decoration-anchor">
                <img class="members-pager-agente-photo no-decoration-anchor" src="<?php echo base_url().'thumbnail_creator/resize/'.urlencode(base64_encode($member_array['photo'])).'/'.$thumbs_width.'/'.$thumbs_height;?>"/>
            </a>
            
            <h3 class="members-pager-agente-name"><?php echo $member_array['name'];?></h3>
            <p class="members-pager-agente-propierties"><span class="members-pager-agente-properties-label">Propiedades:</span> <img class="itemCorner" alt="esquina-verde" src="/images/common/lightGreenItemCorner.png"/> <span class="members-pager-agente-numero-propiedades"><?php echo $member_array['published_properties'];?></span></p>

        </div>
        <?php $i++;?>
    <?php endforeach;?>
    
    



</div>