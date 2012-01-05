<?php
$user_to_view = isset($user_to_view) ? $user_to_view : null;
$user_company = isset($user_company) ? $user_company : null;


$company_agent_view_object = $user_to_view instanceof Company_agent_user ? $user_to_view : null;
$company_view_object = $user_to_view instanceof Company_user || $user_to_view instanceof Agent_user || $user_to_view instanceof Particular_user ? $user_to_view : $user_company;



?>


<div id="user-info">
    
    
    <?php if($company_agent_view_object):?>
    <div id="user-info-company-agent">
        <img id="user-info-company-agent-photo" src="<?php echo "/thumbnail_creator/resize_per_user_type/". urlencode(base64_encode($company_agent_view_object->photo)).'/'.$company_agent_view_object->type?>" alt="foto-agente-de-empresa"/>
        <div id="user-info-company-agent-info-container">
            <h2><?php echo $company_agent_view_object->name.' '.$company_agent_view_object->lastname;?></h2>
            <p id="user-info-company-agent-type"><?php echo $company_agent_view_object->get_type_text();?></p>
            
            <div id="user-info-company-agent-info">
                <?php if($company_agent_view_object->email):?>
                <p>
                        <span class="bold">Email: </span><?php echo $company_agent_view_object->email;?>
                </p>
                <?php endif;?>
                
                <?php if($company_agent_view_object->cel):?>
                <p>
                        <span class="bold">Celular 1:</span> <?php echo $company_agent_view_object->cel;?>
                </p>
                <?php endif;?>
                
                
                <?php if($company_agent_view_object->cel2):?>
                <p>
                        <span class="bold">Celular 2:</span> <?php echo $company_agent_view_object->cel2;?>
                </p>
                <?php endif;?>
                
                
                <?php if($company_agent_view_object->address):?>
                    <p> <span class="bold">Dirección:</span> <?php echo $company_agent_view_object->address;?> </p>
                <?php endif;?>
                
                
            </div>
        </div>
    </div>
    
    <?php endif;?>
    
    
    
    <div id="user-info-particular-or-company">
        <h2><?php echo $company_view_object->name.' '.$company_view_object->lastname;?></h2>
            <p><?php echo $company_view_object->get_type_text();?></p>
            
        <img id="user-info-particular-or-company-photo" src="<?php echo "/thumbnail_creator/resize_per_user_type/". urlencode(base64_encode($company_view_object->photo)).'/'.$company_view_object->type?>" alt="foto-agente-de-empresa"/>
        <div id="user-info-company-agent-info-container">
            
           
                <?php if($company_view_object->tel ):?>
                
                  <p><span class="bold">Tel&eacute;fono:</span> <?php echo $company_view_object->tel ;?>  </p>

                <?php endif;?>
                  
                   <?php if($company_view_object->cel && !$company_view_object instanceof Company_user):?>
                <p>
                        <span class="bold">Celular 1:</span> <?php echo $company_view_object->cel;?>
                </p>
                <?php endif;?>
                
                <?php if($company_view_object->cel2 && !$company_view_object instanceof Company_user):?>
                <p>
                        <span class="bold">Celular 2:</span> <?php echo $company_view_object->cel2;?>
                </p>
                <?php endif;?>
                        
          <?php if($company_view_object->fax):?>
                <p> <span class="bold">Fax:</span> <?php echo $company_view_object->fax;?> </p>
                <?php endif;?>
            
            <p><span class="bold">Email:</span> <?php echo $company_view_object->email;?></p>
            
            <?php if($company_view_object->website):?>
                <p> <span class="bold">Website:</span> <?php echo $company_view_object->website;?> </p>
            <?php endif;?>
                            
                
                <?php if($company_view_object->address):?>
                <p> <span class="bold">Dirección:</span> <?php echo $company_view_object->address;?> </p>
                <?php endif;?>
                
                
                
                
            
            
        </div>
    </div>



</div>

