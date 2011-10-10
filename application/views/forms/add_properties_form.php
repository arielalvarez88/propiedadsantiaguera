<form id="property-form">
    <div id="property-form-description">
        <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber1.png"/><span>Descripci&oacute;n de Propiedad</span></p>
        
        <lable for="property-form-description-type">Tipo</lable> 
        <select id="property-form-description-type" name="property-type">
            <option value="casa">
                Casa
            </option>
            
            <option value="apartamento">
                Apartamento
            </option>
            
            <option value="solar">
                Solar
            </option>
            
            <option value="penthouse">
                Penthouse
            </option>
            
             <option value="local-comercial">
                Local Comercial
            </option>
            
            <option value="edificio">
                Edificio
            </option>
            
                
            <option value="nave-industrial">
                Nave Industrial
            </option>
            
            
            <option value="oficina">
                Oficina
            </option>
            
            <option value="finca">
                Finca
            </option>
        </select>
        
        
        <lable for="property-form-description-terrain">Terreno:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-terrain" name="property-terrain"/>
        
        <lable for="property-form-description-bathrooms">Ba&nacute;os:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-bathromms" name="property-bathrooms"/>
        
        
        
        <lable for="property-form-description-sector">Sector:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-sector" name="property-sector"/>
        
        <lable for="property-form-description-construction">Construcci&oacute;n:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-construction" name="property-construction"/>
        
        <lable for="property-form-description-livinroom">Salas:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-livingroom" name="property-livingroom"/>
        
        <lable for="property-form-description-address">Direcci&oacute;n:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-address" name="property-address"/>
        
        <lable for="property-form-description-sotries">Niveles:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-stories" name="property-stories"/>
        
        <lable for="property-form-description-kitchens">Cocinas:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-kitchens" name="property-kitchens"/>
        
        <lable for="property-form-description-status">Vender/Alquilar:<span class="required">*</span></lable> 
        <select id="property-form-description-status" name="property-status">
            <option selected="selected">
                Vender
            </option>
            <option>
                Alquilar
            </option>
            <option>
                Vender/Alquilar
            </option>
        </select>
        
        <lable for="property-form-description-rooms">Habitiaciones:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-rooms" name="property-rooms"/>
        
        <lable for="property-form-description-parkings">Parqueos:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-parkings" name="property-rooms"/>
        
        <lable for="property-form-description-price">Precio:<span class="required">*</span></lable> 
        <input type="text" id="property-form-description-price" name="property-price"/>
        
        <div id="property-form-description-characteristics">
            
            <input id="property-form-description-service-room" type="checkbox" name="property-service-room"/>
            <lable for="property-form-description-service-room">Cuarto de Servicio:<span class="required">*</span></lable> 
            
            <input id="property-form-description-service-room" type="checkbox" name="property-service-room"/>
            <lable for="property-form-description-service-room">Cuarto de Servicio:<span class="required">*</span></lable> 
            
            <input id="property-form-description-service-room" type="checkbox" name="property-service-room"/>
            <lable for="property-form-description-service-room">Cuarto de Servicio:<span class="required">*</span></lable> 
            
        </div>
        
        <div id="property-form-description-description">
            
            <lable for="property-form-description-price">Descripci&oacute;n de la propiedad:<span class="required">*</span></lable> 
            <textarea id="property-form-description-price" name="property-description"></textarea>
        </div>
        
        
        
        
    </div>
    
    <div id="property-form-close-places">
        <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber2.png"/><span>Lugares de Inter&eacute;s Cercanos</span></p>
        
        <ul id="property-form-close-places-column1">
            <li>
                <input type="checkbox" name="property-close-malls" id="property-form-close-places-mall"/>
                <lable for="property-close-mall">Centros Comerciales</lable>
            </li>
            
             <li>
                <input type="checkbox" name="property-close-supermarkets" id="property-form-close-places-supermarkets"/>
                <lable for="property-form-close-places-supermarkets">Supermercados</lable>
             </li>
            
            <li>
                <input type="checkbox" name="property-close-grocery-stores" id="property-form-close-places-grocery-stores"/>
                <lable for="property-form-close-places-grocery-stores">Colmados</lable>
            </li>
            
            <li>
                <input type="checkbox" name="property-close-schools" id="property-form-close-supermercados"/>
                <lable for="property-form-close-supermaket">Centros Educativos</lable>
            </li>
            
        </ul>
        
        
        <ul id="property-form-close-places-column2">
            <li>
                <input type="checkbox" name="property-close-bakeries" id="property-form-close-bakeries"/>
                <lable for="property-form-close-bakeries">Panaderias</lable>
            </li>
            
            <li>
                <input type="checkbox" name="property-close-gyms" id="property-form-close-gyms"/>
                <lable for="property-form-close-gyms">Gimnasios</lable>
            </li>
            
            <li>
                <input type="checkbox" name="property-close-public-transport" id="property-form-close-public-transport"/>
                <lable for="property-form-close-public-transport">Rutas de transporte P&ublico</lable>
            </li>
            
            <li>
                <input type="checkbox" name="property-close-hardware-stores" id="property-form-close-hardware-stores"/>
                <lable for="property-form-close-hardware-stores">Ferreterias</lable>
            </li>
        </ul>
        
        <ul id="property-close-places-column3">
            <li>
                <input type="checkbox" name="property-close-drug-stores" id="property-form-close-drug-stores"/>
                <lable for="property-form-close-drug-stores">Farmacias</lable>
            </li>
            
            <li>
                <input type="checkbox" name="property-close-restaurants" id="property-form-close-restaurants"/>
                <lable for="property-form-close-restaurants">Establecimientos de comida</lable>
            </li>
        </ul>
    </div>
    
    <div id="property-form-photos">
        <p class="form-section-header"><img class="form-section-number" src="/images/common/greenNumber3.png"/><span>Fotos</span></p>
        
        <ul id="property-form-photos-first-column">
            <?php for($i=1; $i<=5; $i++):?>
            <li>
                <span><?php echo $i;?>.</span> <input value="Buscar" type="file" name="property-photo-<?php echo $i;?>"/>
            </li>
            <?php endfor;?>
        
        </ul>
        
               <ul id="property-form-photos-first-column">
            <?php for($i=6; $i<=10; $i++):?>
            <li>
                <span><?php echo $i;?>.</span> <input value="Buscar" type="file" name="property-photo-<?php echo $i;?>"/>
            </li>
            <?php endfor;?>
        </ul>
        
        
        
    </div>
    
</form>