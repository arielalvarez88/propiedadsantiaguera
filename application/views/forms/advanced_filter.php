<div id="advanced-filter-container">
    <img id="advanced-filter-close-button" src="/images/common/fancy_close.png"/>
    <h2>B&uacute;squeda Avanzada</h2>

    <form id ="advanced-filter" method="get">

        <p>Seleccione los criterios que usted considere m&aacute;s importantes para que la b&uacute;squeda avanzada le presente los resultados m&aacute;s precisos.</p>
        <div id="advanced-filter-first-inputs">

            <lable class=" house-field apartment-field lot-field penthouse-field mall-field building-field warehouse-field office-field land-field" for="advanced-filter-property-type">Tipo:</lable> 
            <select  class="house-field apartment-field lot-field penthouse-field mall-field building-field warehouse-field office-field land-field" id="advanced-filter-property-type" name="property-type">
                <option value="house">Casa</option>
                <option value="apartment">Apartamento</option>
                <option value="penthouse">Penthouse</option>
                <option value="mall"> Local Comercial</option>
                <option value="building">Edificio</option>
                <option value="warehouse">Nave Industrial</option>
                <option value="office">Oficina</option>
                <option value="lot">Solar</option>
                <option value="lot">Finca</option>
            </select>





            <lable class="house-field apartment-field lot-field penthouse-field mall-field building-field warehouse-field office-field land-field" for="advanced-filter-sector">Sector:</lable> 

            <select class="house-field apartment-field lot-field penthouse-field mall-field building-field warehouse-field office-field land-field" id="advanced-filter-sector" name="property-sector">
                <option>Cerro Alto</option>                    
            </select>




        </div>

        <div id="advanced-filter-left-inputs">


            <lable  for="advanced-filter-property-min-price">Precio Min:</lable>
            <input  type="text" id="advanced-filter-property-min-price" name="property-min-price"/>



            <lable  for="advanced-filter-property-max-price" >Precio Max:</lable>
            <input  type="text"  id="advanced-filter-property-min-price" name="property-max-price"/>




            <lable class="hiddable house-field apartment-field  penthouse-field  land-field" for="advanced-filter-property-bedrooms">Habitaciones:</lable>
            <input class="hiddable house-field apartment-field  penthouse-field  land-field" type="text"  id="advanced-filter-property-bedrooms" name="property-bedrooms"/>



            <lable class="hiddable house-field apartment-field  penthouse-field mall-field  warehouse-field office-field land-field" for="advanced-filter-property-bathrooms">Ba&ntilde;os:</lable>
            <input class="hiddable house-field apartment-field  penthouse-field mall-field  warehouse-field office-field land-field" type="text" id="advanced-filter-property-bathrooms" name="property-bathrooms"/>



            <lable class="hiddable house-field apartment-field penthouse-field building-field office-field land-field" for="advanced-filter-property-parkings">Parqueo:</lable>
            <input class="hiddable house-field apartment-field penthouse-field building-field office-field land-field" type="text" id="advanced-filter-property-parkings" name="property-parkings"/>


        </div>

        <div id="advanced-filter-right-inputs">

            <lable  class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field land-field" for="advanced-filter-property-kitchens">Cocinas:</lable>
            <input  class="hiddable house-field apartment-field penthouse-field   warehouse-field office-field land-field" type="text" id="advanced-filter-property-kitchen" name="property-terrain"/>

            <lable class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field land-field" for="advanced-filter-property-livingroom">Salas:</lable>
            <input class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field land-field" type="text" id="advanced-filter-property-livingroom" name="property-livingroom"/>

            <lable  class="hiddable house-field apartment-field  penthouse-field  mall-field building-field warehouse-field office-field land-field" for="advanced-filter-property-stories">Niveles:</lable>
            <input  class="hiddable house-field apartment-field penthouse-field  mall-field building-field warehouse-field office-field " type="text" id="advanced-filter-property-stories" name="property-stories"/>


            <lable  class="hiddable house-field apartment-field  penthouse-field  lot-field building-field warehouse-field office-field land-field" for="advanced-filter-property-terrain">Terreno:</lable>
            <input  class="hiddable house-field apartment-field  penthouse-field  lot-field  building-field warehouse-field office-field land-field" type="text" id="advanced-filter-property-terrain" name="property-terrain"/>





            <lable class="hiddable house-field apartment-field penthouse-field  mall-field building-field warehouse-field office-field land-field" for="advanced-filter-property-construction">Construcci&oacute;n:</lable>
            <input class="hiddable house-field apartment-field  penthouse-field mall-field building-field warehouse-field office-field land-field"  type="text" id="advanced-filter-property-construction" name="property-construction"/>




        </div>

        <input id="advanced-filter-search-button" type="image" src="/images/advancedFilter/searchButton.png"/>



        <p id="advanced-filter-footer">Copyright 2011 propiedadesantiagueras.com | Todos los derechos reservados.</p>

    </form>

</div>
