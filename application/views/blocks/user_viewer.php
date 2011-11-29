<div id="user-viewer-container">

    <div id="user-viewer">
        <h2 id="user-viewer-company"><?php echo isset($owner->company) && !empty ($owner->company)? $owner->company : 'Agente Independiente';?></h2><img class="itemCorner" src="/images/common/lightGreenItemCorner.png"/>
        <div id="user-viewer-data">
            <div id="user-viewer-photo-container">
                <img id="user-viewer-photo" src="<?php echo $owner->photo;?>" alt="Foto del Usuario"/>
            </div>
            <div id="user-viewer-info">
                <h2 id="user-viewer-user-name-header">Agente</h2>
                <p id="user-viewer-user-name"><?php echo $owner->name;?></p>

                <p>T. <?php echo $owner->tel;?></p>
                <p>C. <?php echo $owner->cel;?></p>

                

                
            </div>
                <p id="user-viewer-user-email"><?php echo $owner->email;?></p>
            <p id="user-viewer-user-webpage"><?php echo $owner->webpage;;?></p>
        </div>
    </div>



    <a href="/miembros/ver/<?php echo $owner->id;?>" id="user-viewer-user-propiedades">Ver todas mis propiedades</a>
</div>
