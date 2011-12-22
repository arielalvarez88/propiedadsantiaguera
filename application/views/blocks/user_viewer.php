<?php
$user_type = $user_type  ? $user_type : null;
$user_photo =  $user_photo ? $user_photo : null;
$user_name = $user_name ? $user_name : null;
$user_tel  = isset($user_tel) ? $user_tel : null;
$user_cel  = isset($user_cel) ? $user_cel : null;
$user_cel2  = isset($user_cel2) ? $user_cel2 : null;
$user_email = $user_email ? $user_email : null;
$user_website = isset($user_website) ? $user_website : null;
$user_id = isset($user_id) ? $user_id : null;


?>
<div id="user-viewer-container">

    <div id="user-viewer">
        <h2 id="user-viewer-company"><?php echo $user_type;?></h2><img class="itemCorner" src="/images/common/lightGreenItemCorner.png"/>
        <div id="user-viewer-data">
            <div id="user-viewer-photo-container">
                <img id="user-viewer-photo" src="<?php echo $user_photo;?>" alt="Foto del Usuario"/>
            </div>
            <div id="user-viewer-info">
                <h2 id="user-viewer-user-name-header"><?php echo $user_name;?></h2>
                
                <?php if($user_tel):?>
                    <p>Telefono: <br/> <?php echo $user_tel;?></p>
                <?php endif;?>
                    
                 <?php if($user_cel || $user_cel2):?>
                    <p>Celular: </p>
                    <?php if($user_cel):?>
                        <p> <?php echo $user_cel;?></p>
                     <?php endif;?>
                    <?php if($user_cel2):?>
                        <p><?php echo $user_cel2;?></p>
                    <?php endif;?>
                <?php endif;?>
                      
            </div>
                <p id="user-viewer-user-email"><span>Email:</span> <?php echo $user_email;?></p>
                <?php if($user_website):?>
                    <p id="user-viewer-user-webpage">Website: <?php echo $user_website;?></p>
                <?php endif;?>
            
        </div>
    </div>



    <a class="green-button" href="/miembros/ver/<?php echo $user_id;?>" id="user-viewer-user-propiedades">Ver todas mis propiedades</a>
</div>
