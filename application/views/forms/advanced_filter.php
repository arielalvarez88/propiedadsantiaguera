<div id="advanced-filter-container">
    <img id="advanced-filter-close-button" class="overlay-close-button" src="/images/common/fancy_close.png"/>
    <h2 class="overlay-header">B&uacute;squeda Avanzada</h2>

    <form id ="advanced-filter" method="get">

        <p>Seleccione los criterios que usted considere m&aacute;s importantes para que la b&uacute;squeda avanzada le presente los resultados m&aacute;s precisos.</p>
        <div id="advanced-filter-first-inputs">

            <label for="advanced-filter-property-type">Tipo:</label>
            <?php echo Html_helper::get_select_from_key_value(Environment_vars::$maps['texts_to_id']['property_types'],array("id"=>"advanced-filter-property-type","name"=>"type"));?>                      


            
              <?php $i=0;?>
            <?php $provinces = array();?>
            <?php $neigborhoods_selects = array();?>
            <?php foreach(Environment_vars::$maps['texts_to_id']['property_neighborhoods'] as $province => $neighborhoods):?>
                
                <?php $class = $i==0? 'advanced-filter-neigborhoods' : 'advanced-filterneigborhoods hidden';?>
                <?php $provinces[$province] =  Environment_vars::$maps['texts_to_id']['provinces'][$province]; ?>
            
                <?php $neigborhoods_selects[] = Html_helper::get_select_from_key_value($neighborhoods, array("id" => "advanced-filter-neighborhood-for-province-".Environment_vars::$maps['texts_to_id']['provinces'][$province], "name" => "neighborhood", "class" => $class, "data-province"=> Environment_vars::$maps['texts_to_id']['provinces'][$province]));?>
            
                <?php $i++;?>
            <?php endforeach;?>
            
            <label for="advanced-filter-sector">Sector:</label> 
            <?php echo implode("",$neigborhoods_selects)?>
            
            <label for="advanced-filter-province">Provinces:</label> 
            <?php echo Html_helper::get_select_from_key_value($provinces, array("id" => "advanced-filter-province", "name" => "province"));?>
            

            
            


        </div>

        <div id="advanced-filter-left-inputs">


            <label  for="advanced-filter-property-min-price">Precio Min:</label>
            <input  type="text" id="advanced-filter-property-min-price" data-null-value="" name="minprice"/>


            <label  for="advanced-filter-property-max-price" >Precio Max:</label>
            <input  type="text"  id="advanced-filter-property-min-price" data-null-value="" name="maxprice"/>




            <label class="hiddable house-field apartment-field  penthouse-field  building-field construction-project-field" for="advanced-filter-property-bedrooms">Habitaciones:</label>
            <input class="hiddable house-field apartment-field  penthouse-field building-field construction-project-field" type="text" data-null-value=""  id="advanced-filter-property-bedrooms" name="bedrooms"/>



            <label class="hiddable house-field apartment-field  penthouse-field mall-field  warehouse-field office-field building-field construction-project-field" for="advanced-filter-property-bathrooms">Ba&ntilde;os:</label>
            <input class="hiddable house-field apartment-field  penthouse-field mall-field  warehouse-field office-field building-field construction-project-field"  data-null-value="" type="text" id="advanced-filter-property-bathrooms" name="bathrooms"/>



            <label class="hiddable house-field apartment-field penthouse-field building-field office-field warehouse-field construction-project-field" for="advanced-filter-property-parkings">Parqueo:</label>
            <input class="hiddable house-field apartment-field penthouse-field building-field office-field warehouse-field construction-project-field" data-null-value="" type="text" id="advanced-filter-property-parkings" name="parkings"/>


        </div>

        <div id="advanced-filter-right-inputs">

            <label  class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field building-field construction-project-field" for="advanced-filter-property-kitchens">Cocinas:</label>
            <input  class="hiddable house-field apartment-field penthouse-field   warehouse-field office-field building-field construction-project-field" data-null-value="" type="text" id="advanced-filter-property-kitchen" name="kitchens"/>

            <label class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field building-field construction-project-field" for="advanced-filter-property-livingroom">Salas:</label>
            <input class="hiddable house-field apartment-field  penthouse-field  warehouse-field office-field building-field construction-project-field" data-null-value="" type="text" id="advanced-filter-property-livingroom" name="livingrooms"/>

            <label  class="hiddable house-field apartment-field  penthouse-field  mall-field building-field warehouse-field office-field construction-project-field" for="advanced-filter-property-stories">Niveles:</label>
            <input  class="hiddable house-field apartment-field penthouse-field  mall-field building-field warehouse-field office-field construction-project-field" data-null-value="" type="text" id="advanced-filter-property-stories" name="stories"/>


            <label  class="hiddable house-field  lot-field building-field warehouse-field office-field land-field construction-project-field" for="advanced-filter-property-terrain">Terreno:</label>
            <input  class="hiddable house-field lot-field  building-field warehouse-field office-field land-field construction-project-field" data-null-value=""  type="text" id="advanced-filter-property-terrain" name="terrain"/>


            <label class="hiddable house-field apartment-field penthouse-field  mall-field building-field warehouse-field office-field construction-project-field" for="advanced-filter-property-construction">Construcci&oacute;n:</label>
            <input class="hiddable house-field apartment-field  penthouse-field mall-field building-field warehouse-field office-field construction-project-field"  data-null-value="" type="text" id="advanced-filter-property-construction" name="construction"/>




        </div>

        <input id="advanced-filter-search-button" type="image" src="/images/advancedFilter/searchButton.png" class="input-button" alt="Buscar"/>



        <p id="advanced-filter-footer">Copyright 2011 propiedadesantiagueras.com | Todos los derechos reservados.</p>

    </form>

</div>
