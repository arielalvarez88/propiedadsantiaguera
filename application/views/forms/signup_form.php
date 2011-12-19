<?php
$client_type = isset($client_type) ? $client_type : null;
$inscriber_type = isset($inscriber_type) ? $inscriber_type : null;
$edit_client_id = isset($edit_client_id) ? $edit_client_id : null;
$hide_all_fields_except_password = isset($hide_all_fields_except_password) ? $hide_all_fields_except_password : '';
$user_types = isset($user_types) ? $user_types : Environment_vars::$maps['texts_to_id']['user_types'];
?>

<form enctype="multipart/form-data" id="signup-form" accept-charset="utf-8" method="post" action="<?php echo base_url(); ?>usuario/validate<?php echo isset($edit) && $edit ? '/edit' : ''; ?>">
    <?php if($inscriber_type != Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa']):?>
        <div id="new-user-type">    


            <p class="form-section-header"><img class="form-section-number " id="new-user-type-number" src="/images/common/greenNumber1.png"><span>Tipo de usuario</span></p>

            <?php echo  Html_helper::get_select_from_key_value($user_types, array("id" => "new-user-type-value", "name" => "signup-client-type"), '', $client_type) ;?> 
        </div>


        <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Informaci&oacute;n General</span></p>
        
        <?php else:?>
            <p class="form-section-header"><span>Informaci&oacute;n General</span></p>
            
    <?php endif;?>
    
    
    
    <?php if (isset($errors) && $errors): ?>
        <div class="error-messages"><?php echo $errors; ?></div>
    <?php endif; ?>


    <div id="signup-info-text">

        <?php $hidder_class_for_company = $client_type != Environment_vars::$maps['texts_to_id']['user_types']['Empresa'] ? 'hidden' : ''; ?>

        <label for="signup-company-name" class="company-field <?php echo $hidder_class_for_company; ?> <?php echo $hide_all_fields_except_password;?>" >Empresa:<span class="required">*</span></label> 
        <input <?php echo isset($companyName) ? 'value="' . $companyName . '"' : ''; ?> class="required company-field <?php echo $hide_all_fields_except_password;?> <?php echo $hidder_class_for_company; ?>" name="signup-company-name" type="text" id="signup-company-name"/>


        <?php $hidder_class_for_agent_or_particular = $client_type == Environment_vars::$maps['texts_to_id']['user_types']['Empresa'] ? 'hidden' : ''; ?>

        <label for="signup-client-name" class="agent-particular-field company-agent-field <?php echo $hidder_class_for_agent_or_particular; ?> <?php echo $hide_all_fields_except_password;?>" >Nombre:<span class="required">*</span></label> 
        <input <?php echo isset($clientName) ? 'value="' . $clientName . '"' : ''; ?> name="signup-name" class=" agent-particular-field required  company-agent-field <?php echo $hide_all_fields_except_password;?> <?php echo $hidder_class_for_agent_or_particular; ?>" type="text" id="signup-client-name"/>

        <label for="signup-client-lastname" class="agent-particular-field company-agent-field <?php echo $hide_all_fields_except_password;?> <?php echo $hidder_class_for_agent_or_particular; ?>">Apellido:<span class="required">*</span></label> 
        <input <?php echo isset($clientLastname) ? 'value="' . $clientLastname . '"' : ''; ?> name="signup-lastname" class="agent-particular-field required company-agent-field <?php echo $hide_all_fields_except_password;?> <?php echo $hidder_class_for_agent_or_particular; ?>" type="text" id="signup-client-lastname"/>



        <label for="signup-email" class="company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>">Email:<span class="required">*</span></label>
        <input <?php echo isset($email) ? 'value="' . $email . '"' : ''; ?> name="signup-email" class="required company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>" type="text" id="signup-email" name="signup-email"/>

        <label class="company-agent-field agent-particular-field company-field" for="signup-password">Contrase&ntilde;a: <span class="required">*</span></label> 
        <input class="company-agent-field agent-particular-field company-field" <?php echo isset($password) ? 'value="' . $password . '"' : ''; ?> name="signup-password" type="password" id="signup-password" name="signup-password"/>

        <label class="company-agent-field agent-particular-field company-field" for="signup-password-confirmation">Confirmar Contrase&ntilde;a: <span class="required">*</span></label> 
        <input class="company-agent-field agent-particular-field company-field" <?php echo isset($passwordConfirmation) ? 'value="' . $passwordConfirmation . '"' : ''; ?> type="password" id="signup-password-confirmation" name="signup-password-confirmation"/>

        <label for="signup-website" class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>">Web Site:</label> 
        <input class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" <?php echo isset($website) ? 'value="' . $website . '"' : ''; ?> type="text" id="signup-website" name="signup-website"/>

        <label for="signup-tel" class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>">Tel&eacute;fono:</label> 
        <input class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" <?php echo isset($tel) ? 'value="' . $tel . '"' : ''; ?>  type="text" id="signup-telefono" name="signup-tel"/>

        <label class="company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>" for="signup-celular">Celular:</label> 
        <input class="company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>" <?php echo isset($cel) ? 'value="' . $cel . '"' : ''; ?> type="text" id="signup-celular" name="signup-cel"/>

        <label for="signup-fax" class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>">Fax:</label> 
        <input class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" <?php echo isset($fax) ? 'value="' . $fax . '"' : ''; ?> type="text" id="signup-fax" name="signup-fax"/>

        <label class="company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>" for="signup-upload-photo-textbox">Foto de perfil</label>
        <input class="company-agent-field agent-particular-field company-field <?php echo $hide_all_fields_except_password;?>" name="signup-photo" type="file" id="signup-upload-photo-textbox"/>

        <label class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" for="signup-address">Direcci&oacute;n:</label> 
        <textarea class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" id="signup-address" name="signup-address" id="signup-address"><?php echo isset($address) ? $address : ''; ?></textarea>


        <label class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" for="signup-desription">Descripci&oacute;n del usuario:</label> 
        <div>
            <textarea  class="agent-particular-field  company-field <?php echo $hide_all_fields_except_password;?>" id="signup-descripcion" name="signup-description"><?php echo isset($description) ? $description : ''; ?></textarea> 

        </div>

        <?php if ($edit_client_id): ?>
            <input type="hidden" name="edit-client-id" value="<?php echo $edit_client_id; ?>"/>
        <?php endif; ?>
            
        

        <div class="form-buttons">

            <input id="signup-form-send-button" class="form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
            <img id="signup-form-clear-button" src="/images/common/formCleanButton.png"/>
        </div>

    </div>





</form>


</div>