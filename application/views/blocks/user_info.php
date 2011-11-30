<div id="user-info">

    
        <img id="user-info-card-photo" src="<?php echo $user_to_view->photo;?>"/>               
        <div id="user-info-name-description">
            <?php $user_full_name = $user_to_view->name;?>
            <?php $user_full_name .= $user_to_view->lastname ? ' '.$user_to_view->lastname : '';?>
            
            <h2 id="user-info-name"><?php echo $user_full_name;?></h2>
            <p id="user-info-role">Agente inmobiliario</p>
            <p id="user-info-description-text"><?php echo $user_to_view->description;?></p>

        </div>

    

    <div id="user-info-company">
        <h3>Empresa</h3>
        
            <img alt="company-photo" src="/images/common/companyLogo.png"/>
            <p>
                <span class="bold">T.</span>  809.658.5546 /  <span class="bold">T.</span> 809.585.1245 <span class="bold">EMAIL.</span> juan.palotes@palotes.com
                <span class="bold">Website.</span> www.palotes.com
                <span class="bold">Direcci&oacute;n.</span> Av. Juan Pablo Duarte, #3, Santiago, Rem. Dom.
            </p>
        
    </div>

</div>

