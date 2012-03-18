<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$properties = isset($properties) ? $properties : null;
$section = isset($section) ? $section : 'propiedades';

$names_initials = isset($names_initials) ? $names_initials : null;

$agents_results = isset($agents_results)? $agents_results : '';
$searched_agent_name = isset($searched_agent_name) ? $searched_agent_name : '';


?>

<div id="directory-panel">


    <div id="panels-property-section-tab-tabs" class="tabs">
        <span class="green-text bold">Buscar por :</span>
        <a id="directory-properties-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "propiedades" ? 'selected' : ''; ?>" href="/directorio/propiedades">Propiedades</a>
        <a id="directory-agents-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "agentes" ? 'selected' : ''; ?>" href="/directorio/agentes">Agentes</a>
        <a id="directory-compnanies-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "empresas" ? 'selected' : ''; ?>" href="/directorio/empresas">Empresas</a>
    </div>
    
    <div id="panels-property-tabs-bodies">
        
  
        
        

    <div id="agents-tab-body" <?php echo $section == "agentes" ? '' : 'class="hidden"'; ?>>



        <div id="directory-search-agent-header">
            <form id="directory-search-agent-name" method="post" action="/directorio/buscar_agentes_por_nombre">
                <input id="directory-search-agent-name-field" type="text" value="<?php echo $searched_agent_name;?>"  name="name" />
                <input type="submit"  value="Buscar" class="green-button"/>

            </form>   
            <ul id="initials-container">
                <?php foreach ($names_initials  as $names_initial): ?>
                    <li><?php echo $names_initial; ?></li>
                <?php endforeach; ?>

            </ul>  

           

        </div> 
                <?php echo $agents_results;?>
        
    </div>

  </div>
</div>