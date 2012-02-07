<?php

$error_messages = isset($error_messages) ? $error_messages : null;
$info_messages = isset($info_messages) ? $info_messages : null

?>

<div id="contact">
    
    
    
    <h2 class="main-title">Contacto</h2>
    <p>
        Nos gustaría escuchar lo que nuestros clientes tienen que decir acerca de la informaci&oacute; que disponemos en nuestro portal. 
        <br/>
        Sientase en libretad de enviarnos cualquier mensaje o sugenrencia.

    </p>


    <div id="contact-info">
        <?php if($error_messages):?>
    <div class="error-messages">
        <?php echo $error_messages;?>
    </div>
    
    <?php endif;?>
        
        <?php if($info_messages):?>
    <div class="info-messages">
        <?php echo $info_messages;?>
    </div>
    
    <?php endif;?>

    <form id="contact-form" action="/contacto/send_email" method="post"  accept-charset="UTF-8">

        <select name="user-type">
            <option>
                Elige el tipo de usuario
            </option>
            
            <option value="Particular">
                Particular
            </option>

            <option value="Agente">
                Agente
            </option>
            
            <option value="Inmobiliaria">
                Inmobiliaria
            </option>
        </select>


        <label>
            Nombre<span class="required">*</span> 
        </label>

        <input type="text" name="name"/>

        <label>
            E-mail<span class="required">*</span> 
        </label>

        <input type="text" name="email"/>

        <label>
            Empresa
        </label>

        <input type="text" name="company"/>

        <label>
            Mensaje<span class="required">*</span> 
        </label>

        <textarea name="message">

        </textarea>

        <input id="contact-form-submit-button"type="image" src="<?php base_url();?>/images/common/formSubmitButton.png" alt="Enviar"/>
    </form>
    
    <div id="contact-information">
        <h2>Informaci&oacute;n de Contacto</h2>
        <div>
            
                
        
        <h3>Ventas</h3>
        <p>
            contacto@propiedom.com
            <br/>
        </p>
        
        <h3>Soporte</h3>
        <p>
            soporte@propiedom.com
            <br/>
        </p>
        
           <h3>Tel&eacute;fono</h3>
        <p>
            809-582-2690
            <br/>
        </p>
        
        <h3>Direcci&oacute;n</h3>
        <p>
            Ave. M&eacute;xico esq. Apeco            
            <br/>
            #32B Segundo Nivel,
            <br/>
            Reparto del Este, Santiago
        </p>
        
        </div>
    </div>

    </div>



</div>