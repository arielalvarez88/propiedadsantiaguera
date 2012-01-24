<?php
$title = isset($title) ? $title : null;
$language = Language_handler::get_user_prefered_language();
$this->lang->load("members_header",$language);

$lang["members_header_members_header"] = "Miembros";
$lang["members_header_companies_header"] = "Inmobiliarias";



?>

<div id="members-header">
    <h2 id="members-banner" ><?php echo $title == "companies" ? $this->lang->line("members_header_companies_header") : $this->lang->line("members_header_members_header");?></h2>
    
    
    
    <div id="members-header-options-container">
        <a id="members-header-inmobliarias" class="no-decoration-anchor" href="<?php base_url();?>/miembros/inmobiliarias"><?php echo $this->lang->line("members_header_companies_header");?></a> 
        
        <img src="<?php base_url();?>/images/membersHeader/arrows.png"/>
        <a id="members-header-agentes" class="no-decoration-anchor" href="<?php base_url();?>/miembros/agentes"><?php echo $this->lang->line("members_header_members_header");?></a> 
    </div>
</div>