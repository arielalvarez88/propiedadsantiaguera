
<?php
$skip_step_one = isset($skip_step_one);
$step_one_form = isset($step_one_form) ? $step_one_form : null;
$plan = isset($plan) ? $plan : null;
$upgrade = isset($upgrade) ? $upgrade : null;

?>



<div id="buy-form-container">

    <form id="buy-form" action="<?php echo base_url();?>ajax/buy_form_handler/validate_and_save_user<?php echo $upgrade? "/upgrade": '';?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        
    
    

    <ul id="purchase-steps">
        <li >Proceso de Compra :</li>
        <li id="buy-form-step-one-indicator" <?php echo $skip_step_one ? '' : 'class="selected"'; ?>>1 - Registro  </li>
        <li id="buy-form-step-two-indicator"  <?php echo $skip_step_one ? 'class="selected"' : ''; ?>>2 - Informaci&oacute;n de Pago  </li>
        <li id="buy-form-step-three-indicator" class="">3 - Compra  </li>
    </ul>




    <div id="buy-form-step-one" <?php echo $skip_step_one ? 'class="hidden"' : ''; ?>>

        <div id="buy-form-step-one-error-messages" class="error-messages hidden"></div>
        <h3 class="main-title" id="buy-form-step-one">Informaci&oacute;n Personal</h3>

        <div id="buy-form-step-one-form">
            
        <?php if ($step_one_form): ?>


            <?php echo $step_one_form; ?>
  

        <?php endif; ?>
        </div>


        <div id="purchase-steps-message">
            <h3>Gracias por registrate con nosotros!</h3>
            <dl>
                <dt>Confianza y Seguridad</dt>
                <dd>Su informaci&oacute;n esta segura con nosotros.</dd>
                <dt>Servicio al cliente</dt>
                <dd>Personal disponible para ayudarle en la brevedad posible.</dd>
                <dt>Interfaz Intuitiva</dt>
                <dd>Informaci&oacute;n clara y f&aacute;cil de manipular.</dd>
            </dl>
        </div>


        <img id="buy-form-step-one-submit-button" class="form-send-button purchase-form-button" data-reciving-script="/ajax/buy_form_handler/validate_user_info_ajax<?php echo $upgrade? '/upgrade' : '';?>" src="/images/continuar.png"/>

    </div>

    <div id="buy-form-step-two" <?php echo $skip_step_one ? '' : 'class="hidden"'; ?>>


        <h3 class="main-title" id="purchase-step-2">Informaci&oacute;n de pago</h3>

        <div id="purchase-plan-details"><p>Tipo de plan : <span><?php echo $plan->name; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $plan->number_of_posts; ?> Publicacion(es)</span></p><span  id="buttons"><!--<a hre="" id=""><img src="/images/ver-ejemplo-btn.png" alt=""/></a> <a hre="" id=""><img src="/images/como-func-btn.png" alt=""/></a>--></span></div>

        <input type="hidden" id="buy-form-post-number" name="number-of-posts" value="<?php echo $plan->number_of_posts; ?>"/>
        <input type="hidden" id="buy-form-plan-price" name="plan-price" value="<?php echo $plan->price; ?>"/>
        <input type="hidden" id="buy-form-post-plan-id" name="plan-id" value="<?php echo $plan->id; ?>"/>


        <div class="purchase-form" id="purchase-form-2" action="" method="">
            <label>Cantidad: </label>
            <select id="buy-form-plan-factor" name="plan-factor">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br>


            <p id="buy-form-post-number-container"><label>Total de publicaciones: </label> <span id="buy-form-post-number-display"><?php echo $plan->number_of_posts; ?></span> </p>
            <label>C&oacute;digo de descuento: </label><input type="text" name="disccount-code" id=""/>

            <!--        <label>Fotos y video profesional: </label>
                    <select name="">
                        <option value="">Sector...</option>
                    </select><br>-->

        </div>

        <div id="purchase-steps-total">Total a pagar :<span> RD$ <span id="buy-form-buy-result"><?php echo Numerizer::numerize($plan->price); ?></span> <span id="buy-form-included-itbis">(ITBIS incluido)</span></span></div>


<!--        <h3>Tarjeta de cr&eacute;dito:</h3>

        <form class="purchase-form" id="purchase-form-3" action="" method="">
            <label>Nombre: </label><input type="text" name="" id=""/><br>        
            <label>Numero de Tarjeta: </label><input type="text" name="" id=""/><span id="cards"><img src="/images/cards.png" /></span><br>
            <label>Fecha de Expiracion: </label>

            <select name="card-expiration-year">
                <option value="">A&ntilde;o</option>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo 2011 + $i; ?></option>
                <?php endfor; ?>
            </select>  

            <select name="card-expiration-month">
                <option value="">Mes</option>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>  

            <br>
            <label>Codigo (CVV2): </label><input type="password" name="" id=""/><span id="cvv-question">(Que es el codigo de seguridad?)</span><br>
        </form>

        <div id="purchase-steps-contact-us">
            <p>Necesitas ayuda? <a href="/contacto">Cont&aacute;ctanos.</a></p>
            <img src="/images/phone.png" />
        </div>
        <div id="purchase-steps-politicas">
            <h3 class="main-title">Politicas de uso.</h3>
            <p>Desde el momento en que se editen las fotos y el video, su propiedad estará disponible para ser vista por todos los usuarios que visiten el portal. Cuando nuestro equipo termine de actualizar su propiedad, se le enviará una notificación de que su propiedad está lista, y , a partir de ese momento comienzan a correr los días.</p>
        </div>   
        <form class="purchase-form" id="purchase-form-4" action="" method="">

            

        </form>-->

<p id="buy-form-policy-and-terms">Aqu&iacute; les detallamos los <a id="buy-form-terms" href="/terminos/ajax">T&eacute;rminos de uso</a> y las pol&iacute;ticas de <a href="/politicas/ajax" id="buy-form-policy">Privacidad, seguridad y reembolso</a>.</p>
            <input type="checkbox" name="accept-terms" id="buy-form-accept-terms"/> <label id="buy-form-accept-terms-label" for="buy-form-accept-terms">Acepto las condiciones de uso.</label><br><br><br>
            
 
            
            
            
            <input type="image" id="buy-form-buy-button" class="form-send-button purchase-form-button" src="/images/comprar-btn.png"/>
    </div>


<!--    <div id="buy-form-step-three" class="hidden">

        <div id="purchase-steps-receit">
            <h3 class="main-title">Gracias por hacer su orden</h3>
            <p>Agradecemos su reciente compra en Propiedom. Le enviaremos un email de confirmaci&oacute;n de la orden que acaba de realizar.</p>
            <br>
            <p><strong>Su numero de confirmacion de su orden es:</strong> 4838468</p>
            <h3 class="purchase-detail-title">Orden realizada por:</h3>
            <table>
                <tr><td>Jos&eacute; Miguel Infante</td></tr>
            </table>
            <h3 class="purchase-detail-title">La descripci&oacute;n de su orden se detalla a continuacion:</h3>
            <table>
                <thead><tr><th>Detalle</th><th>Cantidad</th><th>Total de publicaciones</th></tr></thead>
                <tr><td>Paquete plus</td><td>1</td><td>5</td></tr>
            </table> 

            <ul>
                <li><strong>Subtotal:</strong>RD$ 4,131.00</li>
                <li><strong>Impuesto:</strong>RD$ 687.00</li>
                <li><strong>Subtotal:</strong>RD$ 5,000.00</li>
            </ul>

            <p>Si necesita asistencia o tiene alguna pregunta relacionada con su reciente compra, no dude en enviarnos un e-mail a servicios@propiedom.com
                <br>o llamarnos al 809.582.2690. Por favor incluir su numero de orden en su comunicado.<br><br>
                Servicio al cliente<br><br> Propiedom.com
            </p>
        </div>

    </div>-->

    </form>
</div>