<div id="user-viewer-container">

    <div id="user-viewer">
        <h2 id="user-viewer-company"><?php echo array_search($owner->type,Environment_vars::$maps['texts_to_id']['user_types']);?></h2><img class="itemCorner" src="/images/common/lightGreenItemCorner.png"/>
        <div id="user-viewer-data">
            <div id="user-viewer-photo-container">
                <img id="user-viewer-photo" src="<?php echo $owner->photo;?>" alt="Foto del Usuario"/>
            </div>
            <div id="user-viewer-info">
                <h2 id="user-viewer-user-name-header"><?php echo $owner->name;?></h2>
                               
                <p>Celular: <br/> <?php echo $owner->cel;?></p>
                
                
            </div>
                <p id="user-viewer-user-email"><span>Email:</span> <?php echo $owner->email;?></p>
                <?php if($owner->website):?>
                <p id="user-viewer-user-webpage">Website: <?php echo $owner->website;?></p>
                <?php endif;?>
            
        </div>
    </div>



    <a class="green-button" href="/miembros/ver/<?php echo $owner->id;?>" id="user-viewer-user-propiedades">Ver todas mis propiedades</a>
</div>
