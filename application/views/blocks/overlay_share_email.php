<form id="overlay-share-email" class="overlay-container">
    <h2 class="overlay-header">Propiedom</h2>
    
    <div id="overlay-share-email-error-container" class="error-messages hidden"></div>
    <div id="overlay-share-email-body" lass="overlay-body">
        <div id="overlay-share-email-you">
            <h2>Usted</h2>
            
            <ul>
                <li><label for="overlay-share-email-you-name">Nombre</label> <input id="overlay-share-email-you-name" class="required" type="text" title="Su nombre es requerido<br/>" name="your-name"/></li>
                <li><label for="overlay-share-email-you-name">Email</label> <input id="overlay-share-email-you-email" class="required email" type="text" title="Proporcione un email válido como su email.<br/>" name="your-email"/></li>
            </ul>
            
            
        </div>
        
        <div id="overlay-share-email-friend">
            <h2>Enviar a</h2>
            
            <ul>
                <li><label for="overlay-share-email-friend-name">Nombre</label> <input id="overlay-share-email-friend-name" class="required" type="text" title="El nombre de la persona a la que será enviado el email es requerido.<br/>" name="friend-name"/></li>
                
                <li><label for="overlay-share-email-friend-name">Email</label> <input id="overlay-share-email-friend-email" type="text" class="required email" name="friend-email" title="Proporcione un email válido al cual enviar la información."/></li>
            </ul>
            
            
        </div>
        
        
            <h2>Comentario</h2>
            <textarea name="message"></textarea>
        
    </div>
    <a  href="#javascript" id="overlay-share-email-send" class="green-button">Enviar</a>
        
    
</form>