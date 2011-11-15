<div id="panels-account-wrapper">

    <div id="panels-account">
        <p id="panels-account-available">Actualmente usted dispone de <span><?php echo $user->posts_left; ?></span> espacios disponibles para publicar sus propiedades</p>
        <h2>Precio</h2>
        <p id="panels-account-recomendation">Adquiere m&aacute;s espacios y disfruta de todos nuestros beneficios.</p>

        <div id="panels-account-plans-container">
        <table id="panels-account-plans">
            <thead>
                <tr id="panels-account-plans-header-row">
                    <th id="panels-account-plans-header-row-plan">Plan</th>
                    <th id="panels-account-plans-header-row-poperties">Propiedades</th>
                    <th id="panels-account-plans-header-row-price">Precio</th>
                    <th id="panels-account-plans-header-row-empty"></th>
                </tr>
            </thead>

            <tbody>
                <tr  id="panels-account-plans-first-row">
                    <td>
                        B&aacute;sico
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        <span>RD$ 1,500 </span>

                    </td>
                    <td>
                        <a class="green-button" href="/usuario/comprar_plan/basico">Comprar</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        Plus
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        <span>RD$ 6,000</span>  
                    </td>

                    <td>
                        <a class="green-button" href="/usuario/comprar_plan/plus">Comprar</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        Agente
                    </td>
                    <td>
                        10
                    </td>
                    <td>
                        <span>RD$ 10,000</span> 

                    </td>

                    <td>
                        <a class="green-button" href="/usuario/comprar_plan/agente">Comprar</a>
                    </td>
                </tr>

                <tr id="panels-account-plans-last-row">
                    <td>
                        Inmobiliaria
                    </td>
                    <td>
                        25
                    </td>
                    <td>
                        <span> RD$ 20,000 </span>
                    </td>

                    <td>
                        <a class="green-button" href="/usuario/comprar_plan/inmobiliaria">Comprar</a>                        
                    </td>
                </tr>
            </tbody>


        </table>
        <p>Nota: Los precios mostrados en los planes incluyen el ITBIS.</p>
        
            
        </div>
        
        <div id="panels-account-offers-container">
        <div id="panels-account-offers">
            <h2>Oferta</h2>
            <div>
                <p>
                    Aprovecha 
                </p>
            </div>
        </div>

        
            
            <a href="#not-yet" class="green-button">
                Cancelar Cuenta
            </a>
        </div>


    </div>


    
    <h2 id="panels-account-user-info-header">Informaci&oacute;n Personal</h2>
    <div id="panels-account-user-info-summary">
        
            <img src="<?php echo $user_photo_thumb;?>"/>
            <div>
                <p class="panels-account-user-info-summary-title">Nombre</p>
                <p><?php echo $user->name;?></p>
                
                <p class="panels-account-user-info-summary-title">Email</p>
                <p><?php echo $user->email;?></p>
                
                <p class="panels-account-user-info-summary-title"> Empresal</p>
                <p><?php echo $user->name;?></p>
                
                
                <p class="panels-account-user-info-summary-title">Tel&eacute;fono / Celular</p>
                <p><?php echo $user->tel? $user->tel : 'N/A';?> / <?php echo $user->cel? $user->cel : 'N/A';?></p>
                
                
        </div>
        
        
        
    </div>
    <p>
        <a id="panels-account-edit-button" class="green-button" href="/usuario/editar"> Editar Informaci&oacute;n</a>
    </p>
    
    
</div>