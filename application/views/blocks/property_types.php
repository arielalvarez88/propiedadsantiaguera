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

$language = Language_handler::get_user_prefered_language();
$this->lang->load("property_types",$language);

?>
<div id="property-types-container">
    

<h2 id="property_types_title"><img src="<?php base_url();?>/images/green_rarrow.png" alt="" /> <?php echo $this->lang->line("proterty_types_header");?></h2>
<div id="property_types_holder">
<table>
<tr>

    <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Casa'];?>" id="casas"><img src="<?php base_url();?>/images/casa.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Apartamento'];?>" id="aptos"><img src="<?php base_url();?>/images/apto.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Edificio'];?>" id="edf"><img src="<?php base_url();?>/images/edificio.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Penthouse'];?>" id="penthouse"><img src="<?php base_url();?>/images/penthouse.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Oficina'];?>" id="oficinas"><img src="<?php base_url();?>/images/oficina.png" alt="" /></a></td>
        
</tr>

<tr class="text-row">
        <td><?php echo $this->lang->line("proterty_types_houses");?>(<?php echo $number_of_houses;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_apartments");?>(<?php echo $number_of_apartments;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_building");?>(<?php echo $number_of_buildings;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_penthouses");?>(<?php echo $number_of_penthouses;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_offices");?>(<?php echo $number_of_offices;?>)</td>
        
</tr>
<tr >        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Local Comercial'];?>" id="locales_comerciales"><img src="<?php base_url();?>/images/locales.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Nave Industrial'];?>" id="naves"><img src="<?php base_url();?>/images/nave.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Proyecto en Construcción'];?>" id="pro_construccion"><img src="<?php base_url();?>/images/proyecto.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades/buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Solar'];?>" id="solares"><img src="<?php base_url();?>/images/solar.png" alt="" /></a></td>
        
        <td><a href="<?php base_url();?>/propiedades//buscar?type=<?php echo Environment_vars::$maps['texts_to_id']['property_types']['Finca'];?>" id="fincas"><img src="<?php base_url();?>/images/finca.png" alt="" /></a></td>
</tr>
<tr class="text-row">   

        <td>Locales<br><?php echo $this->lang->line("proterty_types_malls");?>(<?php echo $number_of_malls;?>)</td>
        
        <td>Naves<br><?php echo $this->lang->line("proterty_types_warehouses");?>(<?php echo $house_warehouses;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_projects");?>(<?php echo $number_of_in_construction_propjects;?>)</td>
        
        <td><?php echo $this->lang->line("proterty_types_lots");?>(<?php echo $number_of_lots;?>)</br></td>
        
        <td><?php echo $this->lang->line("proterty_types_lands");?>(<?php echo $number_of_lands;?>)</br></td>
</tr>
</table>
</div>
</div>