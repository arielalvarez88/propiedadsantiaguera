<?php

$members_array = isset($members_array) ? $members_array : array();
$title = isset($title) ? $title : '';
$section = isset($section) ? $section : '';
$thumbs_width =  isset($thumbs_width) ? $thumbs_width : 142;
$thumbs_height= isset($thumbs_height) ? $thumbs_height : 142; 
$i=1;

$language = Language_handler::get_user_prefered_language();
$this->lang->load("members_pager", $language);


?>

<div id="<?php echo $section;?>members-pager-container">
    

<div id="members-pager">
    <h2 id="members-pager-header"><?php echo $title == "members" ? $this->lang->line("members_pager_members_text") : $this->lang->line("members_pager_real_estate_text");?></h2>

    
    <?php foreach($members_array as $member_array):?>
    
        <div class="members-pager-agente <?php echo ($i+1) % 4 == 0? 'members-pager-agente-last': '';?>">
            <a class="members-pager-agente-photo-container" href="<?php base_url();?>/miembros/ver/<?php echo $member_array['id'];?>" class="no-decoration-anchor">
                <img class="members-pager-agente-photo no-decoration-anchor" src="<?php echo base_url().'thumbnail_creator/resize/'.urlencode(base64_encode($member_array['photo'])).'/'.$thumbs_width.'/'.$thumbs_height;?>"/>
            </a>
            
            <h3 class="members-pager-agente-name"><?php echo $member_array['name'];?></h3>
            <p class="members-pager-agente-propierties"><span class="members-pager-agente-properties-label"><?php echo $this->lang->line("members_pager_properties_text");?></span> <img class="itemCorner" alt="esquina-verde" src="<?php base_url();?>/images/common/lightGreenItemCorner.png"/> <span class="members-pager-agente-numero-propiedades"><?php echo $member_array['published_properties'];?></span></p>

        </div>
        <?php $i++;?>
    <?php endforeach;?>
    
    



</div>
    
    </div>