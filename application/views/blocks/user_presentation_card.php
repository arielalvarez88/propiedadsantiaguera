<?php
$section = isset($section) && $section ? $section : '';
$image_helper = new Image_helper();
?>


<div id="<?php echo $section; ?>user-presentation-card-container">
    <div id="user-presentation-card">
        
    
    <h2 id="<?php echo $section; ?>user-info-header">Informaci&oacute;n Personal</h2>
    <div id="user-presentation-card-summary">

        <img src="<?php echo $image_helper->resize_by_user_type($user->photo,$user->type); ?>" alt="foto-del-usuario" class="users-photo"/>
        <div>
            <p class="user-presentation-card-summary-title">Nombre</p>
            <p><?php echo $user->name; ?></p> 

            <p class="user-presentation-card-summary-title">Email</p>
            <p><?php echo $user->email; ?></p>

            
            <?php if($user->website):?>
                <p class="user-presentation-card-summary-title">Website</p>
                <p><?php echo$user->website; ?></p>
            <?php endif;?>
                
                
                
            <?php if($user instanceof Company_agent_user):?>
                <p class="user-presentation-card-summary-title"> Empresa</p>
                <p><?php echo $user->get_company()->name; ?></p>
            <?php endif;?>
          


            <p class="user-presentation-card-summary-title">Tel&eacute;fono / Celular 1 / Celular 2</p>
            <p><?php echo $user->tel ? $user->tel : 'N/A'; ?> / <?php echo $user->cel ? $user->cel : 'N/A'; ?> / <?php echo $user->cel2 ? $user->cel2 : 'N/A'?></p>
            
            
            
            <?php if($user->usa_tel):?>
                <p class="user-presentation-card-summary-title">Telefono desde USA:</p>
                <p><?php echo $user->usa_tel;?></p>
            <?php endif;?>
            
            <?php if($user->bbpin):?>
                <p class="user-presentation-card-summary-title">BBpin:</p>
                <p><?php echo $user->bbpin;?></p>
            <?php endif;?>

                  
            <?php if($user->address):?>
                <p class="user-presentation-card-summary-title"> Direcci&oacute;n</p>
                <p><?php echo $user->address; ?></p>
            <?php endif;?>
                
        </div>



    </div>
    <p id="user-presentation-card-edit">
        <a id="user-presentation-card-edit-button" class="green-button" href="<?php base_url();?>/usuario/editar"> Editar Informaci&oacute;n</a>
    </p>
    </div>
</div>