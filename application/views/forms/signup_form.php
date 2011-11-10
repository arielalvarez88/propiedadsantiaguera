<?php ?>

<div id="signup-form-step-two" class="optional-form">


    <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Informacion General</span></p>
<?php if (isset($errors) && $errors): ?>
        <div class="error-messages"><?php echo $errors; ?></div>
    <?php endif; ?>


        
        <form enctype="multipart/form-data" id="signup-informacion-general" accept-charset="utf-8" method="post" action="<?php echo base_url();?>usuario/validate<?php echo $edit? '/edit' : '';?>">


        <div id="signup-info-text">

<?php if ($clientType == 'company'): ?>

                <label for="signup-company-name">Empresa:<span class="required">*</span></label> 
                <input <?php echo isset($companyName) ? 'value="' . $companyName . '"' : ''; ?> class="required" name="signup-company-name" type="text" id="signup-company-name"/>

<?php else: ?>        
                <label for="signup-client-name">Nombre:<span class="required">*</span></label> 
                <input <?php echo isset($clientName) ? 'value="' . $clientName . '"' : ''; ?> name="signup-name" class="required" type="text" id="signup-client-name"/>

                <label for="signup-client-lastname">Apellido:<span class="required">*</span></label> 
                <input <?php echo isset($clientLastname) ? 'value="' . $clientLastname . '"' : ''; ?> name="signup-lastname" class="required" type="text" id="signup-client-lastname"/>
<?php endif; ?>


            <label for="signup-email">Email:<span class="required">*</span></label>
            <input <?php echo isset($email) ? 'value="' . $email . '"' : ''; ?> name="signup-email" class="required" type="text" id="signup-email" name="signup-email"/>

            <label for="signup-password">Contrase&ntilde;a: <span class="required">*</span></label> 
            <input <?php echo isset($password) ? 'value="' . $password . '"' : ''; ?> name="signup-password" type="password" id="signup-password" name="signup-password"/>

            <label for="signup-password-confirmation">Confirmar Contrase&ntilde;a: <span class="required">*</span></label> 
            <input <?php echo isset($passwordConfirmation) ? 'value="' . $passwordConfirmation . '"' : ''; ?> type="password" id="signup-password-confirmation" name="signup-password-confirmation"/>

            <label for="signup-website">Web Site:</label> 
            <input <?php echo isset($website) ? 'value="' . $website . '"' : ''; ?> type="text" id="signup-website" name="signup-website"/>

            <label for="signup-tel">Tel&eacute;fono:</label> 
            <input <?php echo isset($tel) ? 'value="' . $tel . '"' : ''; ?>  type="text" id="signup-telefono" name="signup-tel"/>

            <label for="signup-celular">Celular:</label> 
            <input <?php echo isset($cel) ? 'value="' . $cel . '"' : ''; ?> type="text" id="signup-celular" name="signup-cel"/>

            <label for="signup-fax">Fax:</label> 
            <input <?php echo isset($fax) ? 'value="' . $fax . '"' : ''; ?> type="text" id="signup-fax" name="signup-fax"/>


            <label for="signup-rnc">RNC/C&eacute;dula:<span class="required">*</span></label> 
            <input <?php echo isset($rnc) ? 'value="' . $rnc . '"' : ''; ?> class="required" name="signup-rnc" type="text" id="signup-rnc"/>

            <label for="signup-upload-photo-textbox">Archivo</label>
            <input name="signup-photo" type="file" id="signup-upload-photo-textbox"/>

            <label for="signup-address">Direcci&oacute;n:</label> 
            <textarea id="signup-address" name="signup-address" id="signup-address"></textarea>


            <label for="signup-desription">Descripci&oacute;n del usuario:</label> 
            <div>
                <textarea <?php echo isset($description) ? 'value="' . $description . '"' : ''; ?> id="signup-descripcion" name="signup-description"></textarea>

                <div id="signup-descripcion-ejemplo">

                </div>     

            </div>


            <input type="hidden" value="<?php echo $clientType; ?>" name="signup-client-type"/>

            <div class="form-buttons">
                <input id="signup-form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
                <img id="signup-form-clear-button" src="/images/common/formCleanButton.png"/>
            </div>

        </div>





    </form>


</div>