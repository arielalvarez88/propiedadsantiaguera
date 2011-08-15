<p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Informacion General</span></p>
 <?php if (isset($errores) && $errores): ?>
        <div class="error-messages"><?php echo $errores; ?></div>
    <?php endif; ?>
<form id="signup-informacion-general" method="post" action="<?php echo base_url(); ?>signup/validate" accept-charset="utf-8">

   
    <div id="signup-info-text">
        
        <?php if ($tipoCliente == 'empresa'): ?>
            <label for="signup-empresa">Empresa:<span class="required">*</span></label> <input <?php echo isset($empresa) ? 'value="' . $empresa . '"' : ''; ?> class="required" name="signup-empresa" type="text" id="signup-empresa"/>
        <?php else: ?>        
            <label for="signup-nombre">Nombre:<span class="required">*</span></label> <input <?php echo isset($nombre) ? 'value="' . $nombre . '"' : ''; ?> name="signup-nombre" class="required" type="text" id="signup-nombre"/>
            <label for="signup-apellido">Apellido:<span class="required">*</span></label> <input <?php echo isset($apellido) ? 'value="' . $apellido . '"' : ''; ?> name="signup-apellido" class="required" type="text" id="signup-apellido"/>
        <?php endif; ?>
        <label for="signup-email">Email:<span class="required">*</span></label> <input <?php echo isset($email) ? 'value="' . $email . '"' : ''; ?> name="signup-email" class="required" type="text" id="signup-email" name="signup-email"/>
        <label for="signup-clave">Contrase&ntilde;a: <span class="required">*</span></label> <input <?php echo isset($clave) ? 'value="' . $clave . '"' : ''; ?> name="signup-clave" type="password" id="signup-clave" name="signup-clave"/>
        <label for="signup-confirmar-clave">Confirmar Contrase&ntilde;a: <span class="required">*</span></label> <input <?php echo isset($confirmar_clave) ? 'value="' . $confirmar_clave . '"' : ''; ?> type="password" id="signup-confirmar-clave" name="signup-confirmar-clave"/>
        <label for="signup-website">Web Site:</label> <input <?php echo isset($website) ? 'value="' . $website . '"' : ''; ?> type="text" id="signup-website" name="signup-website"/>
        <label for="signup-telefono">Tel&eacute;fono:</label> <input <?php echo isset($telefono) ? 'value="' . $telefono . '"' : ''; ?>  type="text" id="signup-telefono" name="signup-telefono"/>
        <label for="signup-celular">Celular:</label> <input <?php echo isset($celular) ? 'value="' . $celular . '"' : ''; ?> type="text" id="signup-celular" name="signup-celular"/>


        <label for="signup-desripcion">Descripci&oacute;n del usuario:</label> <textarea <?php echo isset($descripcion) ? 'value="' . $descripcion . '"' : ''; ?> id="signup-descripcion" name="signup-descripcion"></textarea>
        <input type="hidden" value="<?php echo $tipoCliente; ?>" name="signup-tipo-cliente"/>




        <input type="image" src="/images/common/formSubmitButton.png"/>
        <input type="image" src="/images/common/formCleanButton.png"/>
    </div>


    <div id="signup-info-fotos">
        <div id="signup-info-profile-picture">
            <img id="signup-upload-photo-preview" src=""> <h3>Foto del usuario</h3>
            <input name="signup-upload-photo-textbox" type="text" id="signup-upload-photo-textbox"/> <a href="#javascript" id="signup-upload-photo-button" >Elegir un Archivo<a/>
            <p id="signup-upload-photo-status"></p>
        </div>

        <p id="signup-descripcion-ejemplo">
                    Somos una agencia inmobiliaria que pone a disposición del mercado Dominicano, una amplia variedad de propiedades localizadas en las principales ciudades del país. Contamos con un equipo de agentes comprometidos en asesorar a las personas interesadas en adquirir una propiedad, para lograr una buena inversión.
        </p>


    </div>

</form>
