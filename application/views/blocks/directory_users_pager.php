<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$users = isset($users) ? $users : null;
?>





<div id="directory-users-pager">





    <div id="directory-users-pager-users-container">
        <?php foreach ($users as $user): ?>

            <div id="panel_user">
                <div id="div_foto" ><img src=<?php echo $user->photo; ?>  alt=""/></div> 

                <div id="datos1"> 
                    <ul >
                        <li><h2><?php echo $user->name;?></h2></li>
                        <?php if($user instanceof Company_agent_user || $user instanceof Company_agent_requester_user):?>
                            <?php echo $user->get_company()->name;?>
                        <?php endif;?>
                        <li> <strong> Email:</strong><?php echo $user->email; ?></li>
                        
                        <?php if( $user->website):?>
                        <li> <strong> Website:</strong><?php echo $user->website; ?></li>
                        <?php endif;?>
                        
                        <?php if($user->adddress):?>
                            <li><strong> Direccion:</strong><?php echo $user->adddress; ?></li>
                        <?php endif;?>

                    </ul>

                </div>
                <div id="datos2">
                    <ul  > 
                        <?php if( $user->tel):?>
                        <li> <strong> Tel:</strong><?php echo $user->tel; ?></li>
                        <?php endif;?>
                        
                        <?php if($user->cel ):?>
                            <li> <strong> Cel:</strong><?php echo $user->cel; ?></li>
                        <?php endif;?>
                        
                        <?php if($user->bbpin):?>
                            <li><strong> BBpin:</strong><?php echo $user->bbpin; ?></li>
                        <?php endif;?>

                    </ul>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</div>