<?php
$user_to_view = isset($user_to_view) ? $user_to_view : null;
$user_company = isset($user_company) ? $user_company : null;
?>


<div id="user-info">


    <img id="user-info-card-photo" src="<?php echo $user_to_view->photo; ?>"/>               
    <div id="user-info-name-description">
        <?php $user_full_name = $user_to_view->name; ?>
        <?php $user_full_name .= $user_to_view->lastname ? ' ' . $user_to_view->lastname : ''; ?>

        <h2 id="user-info-name"><?php echo $user_full_name; ?></h2>
        <p id="user-info-role"><?php echo array_search($user_to_view->type, Environment_vars::$maps['texts_to_id']['user_types']); ?></p>
        <p id="user-info-description-text"><?php echo $user_to_view->description; ?></p>

    </div>



    <?php if ($user_company): ?>

        <div id="user-info-company">
            <h3><?php echo $user_company->name;?></h3>

            <img alt="company-photo" src="<?php echo $user_company->photo;?>"/>
            <p>
                <?php if(!empty($user_company->tel)):?>
                    <span class="bold">T.</span> <?php echo $user_company->tel;?>
                <?php endif;?>
                    
                    <?php if(!empty($user_company->cel)):?>
                    /  <span class="bold">T.</span> <?php echo $user_company->cel;?>
                <?php endif;?>
                    
           <span class="bold">EMAIL.</span> <?php echo $user_company->email;?>
           
                               <?php if(!empty($user_company->website)):?>
                    <span class="bold">Website.</span> <?php echo $user_company->website;?>
                <?php endif;?>
                
                    <?php if(!empty($user_company->website)):?>
                    <span class="bold">Direcci&oacute;n.</span> <?php echo $user_company->address;?>
                <?php endif;?>
                    
                
            </p>

        </div>
    <?php endif; ?>


</div>

