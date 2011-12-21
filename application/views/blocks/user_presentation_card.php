<?php
$section = isset($section) && $section ? $section : '';

?>


<div id="<?php echo $section; ?>user-presentation-card-container">
    <div id="user-presentation-card">
        
    
    <h2 id="<?php echo $section; ?>user-info-header">Informaci&oacute;n Personal</h2>
    <div id="user-presentation-card-summary">

        <img src="<?php echo $user_photo_thumb; ?>" alt="foto-del-usuario" class="users-photo"/>
        <div>
            <p class="user-presentation-card-summary-title">Nombre</p>
            <p><?php echo $user->name; ?></p>

            <p class="user-presentation-card-summary-title">Email</p>
            <p><?php echo $user->email; ?></p>

            <p class="user-presentation-card-summary-title"> Empresa</p>
            <p><?php echo $user->name; ?></p>


            <p class="user-presentation-card-summary-title">Tel&eacute;fono / Celular 1 / Celular 2</p>
            <p><?php echo $user->tel ? $user->tel : 'N/A'; ?> / <?php echo $user->cel ? $user->cel : 'N/A'; ?> / <?php echo $user->cel2 ? $user->cel2 : 'N/A'?></p>


        </div>



    </div>
    <p>
        <a id="user-presentation-card-edit-button" class="green-button" href="/usuario/editar"> Editar Informaci&oacute;n</a>
    </p>
    </div>
</div>