<!--<form id="basic-filter">
    <h2>Busqueda de propiedades</h2>
    <div id="basic-filter-left-size">
        <select id="basic-filter-condition"value="CONDICIÓN">
            <option>Venta</option>
            <option>Alquiler</option>
            <option>Venta/Alquiler</option>
            
        </select>
        
        <select id="basic-filter-sector"value="SECTOR">
            <option>Cerro Alto</option>
            <option>Ciruelitos</option>
        </select>
        
       
        
    </div>
    
    <div id="basic-filter-right-size">
        <select id="basic-filter-type"value="TIPO DE VIVIENDO">
            <option>Casa</option>
            <option>Finca</option>
        </select>
        <p>Precios:</p>
        <div id="basic-filter-price-slider">
            
        </div>
        <p id="basic-filter-price-slider-display"><span id="basic-filter-price-slider-min-display"></span> <span id="basic-filter-price-slider-max-display"></span></p>
    </div>
    
    <input type="image" src="/images/basic_filter/filter_search_button.png"/>
    <a id="basic-filter-advanced-filter-link" href="/ajax/view_loader/forms/advanced_filter">Busqueda Avanzada</a>
</form>-->

<form id="basic-filter">
    <h2>B&uacute;squeda de propiedades</h2>
    <div id="basic-filter-left-size">
        <select id="basic-filter-condition" value="CONDICIÓN">
            <option>Venta</option>
            <option>Alquiler</option>
            <option>Venta/Alquiler</option>

        </select>

        <select id="basic-filter-sector" value="SECTOR">
            <option>Cerro Alto</option>
            <option>Ciruelitos</option>
        </select>

        <input type="text" value="Número de referencia">


    </div>

    <div id="basic-filter-right-size">
        <select value="TIPO DE VIVIENDO" id="basic-filter-type">
            <option>Casa</option>
            <option>Finca</option>
        </select>
        <p>Precios:</p>
        <div id="basic-filter-price-slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
        
        </div>

            
        <p id="basic-filter-price-slider-display"><span id="basic-filter-price-slider-min-display">$1,000,000</span> <span id="basic-filter-price-slider-max-display">Más de $100,000,000</span></p>
        
        
        
        
        <a href="/ajax/view_loader/forms/advanced_filter" id="basic-filter-advanced-filter-link" >B&uacute;squeda Avanzada</a>
        <input id="basic-filter-search-button" type="image" src="/images/basic_filter/filter_search_button.png" />
        

    </div>



</form>