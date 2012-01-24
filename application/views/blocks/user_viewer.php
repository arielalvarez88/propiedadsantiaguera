<?php
$user_type = $user_type  ? $user_type : null;
$user_photo =  $user_photo ? $user_photo : null;
$user_name = $user_name ? $user_name : null;
$user_tel  = isset($user_tel) ? $user_tel : null;
$user_cel  = isset($user_cel) ? $user_cel : null;
$user_cel2  = isset($user_cel2) ? $user_cel2 : null;

$user_fax = isset($user_fax ) ? $user_fax : null;

$user_email = $user_email ? $user_email : null;
$user_website = isset($user_website) ? $user_website : null;
$user_id = isset($user_id) ? $user_id : null;
$company_or_particular_view = isset($company_or_particular_view) ? $company_or_particular_view : '';

?>
<div id="<?php echo $company_or_particular_view;?>user-viewer-container">

    <div id="user-viewer">
        <h2 id="user-viewer-company"><?php echo $user_type;?></h2><img class="itemCorner" src="<?php base_url();?>/images/common/lightGreenItemCorner.png"/>
        <div id="user-viewer-data">
            <div id="user-viewer-photo-container">
                <img id="user-viewer-photo" src="<?php echo $user_photo;?>" alt="Foto del Usuario"/>
            </div>
            <div id="user-viewer-info">
                <h2 id="user-viewer-user-name-header"><?php echo $user_name;?></h2>
                
                <?php if($user_tel):?>
                <p><span class="bold">Telefono:</span> <br/> <?php echo $user_tel;?></p>
                <?php endif;?>
                    
                 <?php if($user_cel || $user_cel2):?>
                <p><span class="bold">Celular:</span> </p>
                    <?php if($user_cel):?>
                        <p> <?php echo $user_cel;?></p>
                     <?php endif;?>
                        
                    <?php if($user_cel2):?>
                        <p><?php echo $user_cel2;?></p>
                    <?php endif;?>
                        
                        
                <?php endif;?>
                        
                        <?php if($user_fax):?>
                        <p id="user-viewer-fax"><span class="bold">Fax:</span> <br/> <?php echo $user_fax;?></p>
                    <?php endif;?>
                      
            </div>
                <p id="user-viewer-user-email"><span class="bold">Email:</span> <?php echo $user_email;?></p>
                <?php if($user_website):?>
                <p id="user-viewer-user-webpage"><span class="bold">Website:</span> <?php echo $user_website;?></p>
                <?php endif;?>
            
        </div>
    </div>



    <a class="green-button" href="<?php base_url();?>/miembros/ver/<?php echo $user_id;?>" id="user-viewer-user-propiedades">Ver todas mis propiedades</a>
</div>
