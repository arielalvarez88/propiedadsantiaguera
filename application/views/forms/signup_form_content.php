<?php
$client_type = isset($client_type) ? $client_type : null;


$inscriber_type = isset($inscriber_type) ? $inscriber_type : null;
$edit_client_id = isset($edit_client_id) ? $edit_client_id : null;




$hide_this_field_if_company_agent_is_editing_his_account = $inscriber_type == Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa'] ? 'hidden' : '';


$user_types = isset($user_types) ? $user_types : Environment_vars::$maps['texts_to_id']["user_types_if_not_company"];
$errors = isset($errors) ? $errors : null;
$info_messages = isset($info_messages) ? $info_messages : null;
$edit = isset($edit) ? $edit : false;

$hide_user_type_field = $edit || $client_type == Environment_vars::$maps['texts_to_id']['user_types']['Agente de Empresa'];

$buy_format = isset($buy_format);

$section = isset($section) ? $section : '';
?>

<div id="signup-form-content"> 
            
        
        <div id="new-user-type" <?php echo $edit ? 'class="hidden"' : ''; ?>>     


            <p id="signup-form-content-user-type-header" class="form-section-header <?php echo $hide_user_type_field ? 'hidden' : ''; ?>"> <img class="form-section-number <?php echo $buy_format ? 'hidden' : ''; ?> " id="new-user-type-number" src="/images/common/greenNumber1.png" > <span>Tipo de usuario</span></p>

            <?php echo Html_helper::get_select_from_key_value($user_types, array("id" => "new-user-type-value", "name" => "signup-client-type", "class" => $hide_user_type_field ? 'hidden' : ''), '', $client_type); ?> 
        </div>


        <p class="form-section-header <?php echo $buy_format ? 'hidden' : '';?>"><img class="form-section-number <?php echo $hide_user_type_field ? 'hidden' : ''; ?>" src="/images/common/greenNumber2.png"/><span>Informaci&oacute;n General</span></p>


        <?php if ($info_messages): ?>
            <div class="info-messages"><?php echo $info_messages; ?></div>
        <?php endif; ?>

        <?php if (isset($errors) && $errors): ?>
            <div class="error-messages"><?php echo $errors; ?></div>
        <?php endif; ?>


        <div id="signup-info-text">

            <?php $hidder_class_for_company = $client_type != Environment_vars::$maps['texts_to_id']['user_types']['Empresa'] && $client_type != Environment_vars::$maps['texts_to_id']['user_types_requesters']['Empresa'] ? 'hidden' : ''; ?>

            <label for="signup-company-name" class="company-field company-requester-field <?php echo $hidder_class_for_company; ?> <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" >Empresa:<span class="required">*</span></label> 
            <input <?php echo isset($companyName) ? 'value="' . $companyName . '"' : ''; ?> class="required company-field company-requester-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?> <?php echo $hidder_class_for_company; ?>" name="signup-company-name" type="text" id="signup-company-name"/>


            <?php $hidder_class_for_agent_or_particular = $client_type == Environment_vars::$maps['texts_to_id']['user_types']['Empresa'] ? 'hidden' : ''; ?>

            <label for="signup-client-name" class="agent-particular-field company-agent-field  agent-particular-requester-field <?php echo $hidder_class_for_agent_or_particular; ?> <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" >Nombre:<span class="required">*</span></label> 
            <input <?php echo isset($clientName) ? 'value="' . $clientName . '"' : ''; ?> name="signup-name" class=" agent-particular-field required  company-agent-field agent-particular-requester-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?> <?php echo $hidder_class_for_agent_or_particular; ?>" type="text" id="signup-client-name"/>



            <label for="signup-email" class="company-agent-field agent-particular-field company-field company-requester-field agent-particular-requester-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>">Email:<span class="required">*</span></label>
            <input <?php echo isset($email) ? 'value="' . $email . '"' : ''; ?> name="signup-email" class="required company-agent-field agent-particular-field company-field company-requester-field agent-particular-requester-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" type="text" id="signup-email" name="signup-email"/>

            <label class="company-agent-field agent-particular-field company-field company-requester-field agent-particular-field agent-particular-requester-field" for="signup-password">Contrase&ntilde;a: <span class="required">*</span></label> 
            <input class="company-agent-field agent-particular-field company-field company-requester-field agent-particular-field agent-particular-requester-field" <?php echo isset($password) ? 'value="' . $password . '"' : ''; ?> name="signup-password" type="password" id="signup-password" name="signup-password"/>

            <label class="company-agent-field agent-particular-field company-field company-requester-field agent-particular-field agent-particular-requester-field" for="signup-password-confirmation">Confirmar Contrase&ntilde;a: <span class="required">*</span></label> 
            <input class="company-agent-field agent-particular-field company-field company-requester-field agent-particular-field agent-particular-requester-field" <?php echo isset($passwordConfirmation) ? 'value="' . $passwordConfirmation . '"' : ''; ?> type="password" id="signup-password-confirmation" name="signup-password-confirmation"/>

            <label for="signup-website" class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>">Web Site:</label> 
            <input class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" <?php echo isset($website) ? 'value="' . $website . '"' : ''; ?> type="text" id="signup-website" name="signup-website"/>

            <label for="signup-tel" class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>">Tel&eacute;fono:</label> 
            <input class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" <?php echo isset($tel) ? 'value="' . $tel . '"' : ''; ?>  type="text" id="signup-telefono" name="signup-tel"/>

            <label class="company-agent-field agent-particular-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" for="signup-celular">Celular 1:</label> 
            <input class="company-agent-field agent-particular-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" <?php echo isset($cel) ? 'value="' . $cel . '"' : ''; ?> type="text" id="signup-celular" name="signup-cel"/>

            <label class="company-agent-field agent-particular-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" for="signup-celular">Celular 2:</label> 
            <input class="company-agent-field agent-particular-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" <?php echo isset($cel2) ? 'value="' . $cel2 . '"' : ''; ?> type="text" id="signup-celular" name="signup-cel2"/>

            <label for="signup-fax" class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>">Fax:</label> 
            <input class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" <?php echo isset($fax) ? 'value="' . $fax . '"' : ''; ?> type="text" id="signup-fax" name="signup-fax"/>

            <label class="company-agent-field agent-particular-field company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" for="signup-upload-photo-textbox">Foto de perfil</label>
            <input class="company-agent-field agent-particular-field company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" name="signup-photo" type="file" id="signup-upload-photo-textbox"/>

            <label class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" for="signup-address">Direcci&oacute;n:</label> 
            <textarea class="agent-particular-field  company-field <?php echo $hide_this_field_if_company_agent_is_editing_his_account; ?>" id="signup-address" name="signup-address" id="signup-address"><?php echo isset($address) ? $address : ''; ?></textarea>
           

            <?php if ($edit_client_id): ?>
                <input type="hidden" name="edit-client-id" value="<?php echo $edit_client_id; ?>"/>
            <?php endif; ?>


                <?php if($buy_format):?>
                
                
                <?php else:?>
                    <div class="form-buttons" >

                        <input id="signup-form-content-send-button" class="form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
                        <img id="signup-form-content-clear-button" src="/images/common/formCleanButton.png"/>
                    </div>
                <?php endif;?>

        </div>




</div>