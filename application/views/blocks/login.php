     
<div>
            <div id="login">
                <a id="login-close-button" href="#js"></a>
                <form id="login-form" action="<?php base_url();?>/usuario/login" method="post" class="optional-form">
                    <img src="<?php base_url();?>/images/login/loginTitle.png" alt="Login" id="login-title"/>
                    <input id="login-email" type="text" name="login-email" class="login-input" /><br/>
                    
                    <input id="login-password-clear" type="text" class="login-input" /><br/>
                    <input id="login-password" type="password" name="login-password" class="login-input" style="display:none;"/>
                    <input id="login-submit" class="form-send-button" type="image" src="<?php echo base_url();?>images/login/loginButton.png" alt="login"/> 
                    <a href="#" id="login-password-reset-button">&iquest;Olvido su contrase&ntilde;a?</a>
                </form>
            </div>
        </div>
        