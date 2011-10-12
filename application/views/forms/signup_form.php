<?php

?>

<div id="signup-form-step-two" class="optional-form">
    

<p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Informacion General</span></p>
 <?php if (isset($errores) && $errores): ?>
        <div class="error-messages"><?php echo $errores; ?></div>
    <?php endif; ?>
      
            
            <form id="signup-informacion-general" method="post" action="<?php echo base_url();?>usuario/validate" accept-charset="utf-8">
                
   
    <div id="signup-info-text">
        
        <?php if ($clientType== 'company'): ?>
        
            <label for="signup-company-name">Empresa:<span class="required">*</span></label> 
            <input <?php echo isset($companyname) ? 'value="' . $companyName . '"' : ''; ?> class="required" name="signup-company-name" type="text" id="signup-company-name"/>
            
        <?php else: ?>        
            <label for="signup-client-name">Nombre:<span class="required">*</span></label> 
            <input <?php echo isset($clientName) ? 'value="' . $clientName . '"' : ''; ?> name="signup-client-name" class="required" type="text" id="signup-client-name"/>
            
            <label for="signup-client-lastname">Apellido:<span class="required">*</span></label> 
            <input <?php echo isset($clientLastname) ? 'value="' . $clientLastname . '"' : ''; ?> name="signup-client-lastname" class="required" type="text" id="signup-client-lastname"/>
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
        
        <label for="signup-address">Direcci&oacute;n:</label> 
        <textarea id="signup-address" name="signup-address" id="signup-address"></textarea>
        

        <label for="signup-desription">Descripci&oacute;n del usuario:</label> 
        <textarea <?php echo isset($description) ? 'value="' . $description . '"' : ''; ?> id="signup-descripcion" name="signup-description"></textarea>
        
        <input type="hidden" value="<?php echo $clientType; ?>" name="signup-client-type"/>

        <div class="form-buttons">
            <input id="signup-form-send-button" type="image" src="/images/common/formSubmitButton.png"/>
            <img id="signup-form-clear-button" src="/images/common/formCleanButton.png"/>
        </div>
         
    </div>


    <div id="signup-info-fotos">
        <div id="signup-info-profile-picture">
<!--            <img id="signup-upload-photo-preview" src=""/> <h3>Foto del usuario</h3>-->
            <input name="signup-upload-photo-textbox" type="text" id="signup-upload-photo-textbox"/> <a href="#javascript" id="signup-upload-photo-button" >Elegir un Archivo<a/>
            <p id="signup-upload-photo-status"></p>
        </div>

        <p id="signup-descripcion-ejemplo">
                    Somos una agencia inmobiliaria que pone a disposición del mercado Dominicano, una amplia variedad de propiedades localizadas en las principales ciudades del país. Contamos con un equipo de agentes comprometidos en asesorar a las personas interesadas en adquirir una propiedad, para lograr una buena inversión.
        </p>

            
    </div>

            </form>

        
</div>