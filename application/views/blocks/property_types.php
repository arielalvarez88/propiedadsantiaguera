<?php
$number_of_houses = isset($number_of_houses)? $number_of_houses : 0;
$number_of_apartments = isset($number_of_apartments)? $number_of_apartments : 0;
$number_of_buildings = isset($number_of_buildings)? $number_of_buildings : 0;
$number_of_penthouses = isset($number_of_penthouses)? $number_of_penthouses : 0;
$number_of_offices = isset($number_of_offices)? $number_of_offices : 0;
$number_of_malls = isset($number_of_malls)? $number_of_malls : 0;
$house_warehouses= isset($house_warehouses)? $house_warehouses : 0;
$number_of_in_construction_propjects = isset($number_of_in_construction_propjects)? $number_of_in_construction_propjects : 0;
$number_of_lots = isset($number_of_lots)? $number_of_lots : 0;
$number_of_lands = isset($number_of_lands)? $number_of_lands : 0;


?>
<h2 id="property_types_title"><img src="/images/green_rarrow.png" alt="" /> Elige el tipo de propiedad de tu preferencia</h2>
<div id="property_types_holder">
<table>
<tr>

    <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Casa'];?>" id="casas"><img src="/images/casa.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Apartamento'];?>" id="aptos"><img src="/images/apto.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Edificio'];?>" id="edf"><img src="/images/edificio.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Penthouse'];?>" id="penthouse"><img src="/images/penthouse.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Oficina'];?>" id="oficinas"><img src="/images/oficina.png" alt="" /></a></td>
        
</tr>
<tr class="text-row">
        <td>Casas(<?php echo $number_of_houses;?>)</td>
        
        <td>Apartamentos(<?php echo $number_of_apartments;?>)</td>
        
        <td>Edificios(<?php echo $number_of_buildings;?>)</td>
        
        <td>Pent House(<?php echo $number_of_penthouses;?>)</td>
        
        <td>Oficinas(<?php echo $number_of_offices;?>)</td>
        
</tr>
<tr >        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Local Comercial'];?>" id="locales_comerciales"><img src="/images/locales.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Nave Industrial'];?>" id="naves"><img src="/images/nave.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Proyecto en Construcción'];?>" id="pro_construccion"><img src="/images/proyecto.png" alt="" /></a></td>
        
        <td><a href="/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Solar'];?>" id="solares"><img src="/images/solar.png" alt="" /></a></td>
        
        <td><a href="/propiedades//buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Finca'];?>" id="fincas"><img src="/images/finca.png" alt="" /></a></td>
</tr>
<tr class="text-row">        
        <td>Locales<br>Comerciales(<?php echo $number_of_malls;?>)</td>
        
        <td>Naves<br>Industriales(<?php echo $house_warehouses;?>)</td>
        
        <td>Proyectos en<br>Construci&oacute;n(<?php echo $number_of_in_construction_propjects;?>)</td>
        
        <td>Solares(<?php echo $number_of_lots;?>)</br></td>
        
        <td>Fincas(<?php echo $number_of_lands;?>)</br></td>
</tr>
</table>
</div>
