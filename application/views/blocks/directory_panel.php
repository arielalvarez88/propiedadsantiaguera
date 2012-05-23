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
$basic_filter_view = isset($basic_filter_view) ? $basic_filter_view : '';
$properties_results_view = isset($properties_results_view) ?$properties_results_view : '';
?>

<div id="directory-panel">


    <div id="panels-property-section-tab-tabs" class="tabs">
        <span class="green-text bold">Buscar por :</span>
        <a id="directory-properties-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "propiedades" ? 'selected' : ''; ?>" href="/directorio/propiedades">Propiedades</a>
        <a id="directory-agents-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "agentes" ? 'selected' : ''; ?>" href="/directorio/agentes">Agentes</a>
        <a id="directory-compnanies-selector" class="tab-item no-decoration-anchor directory-panel-tab-item <?php echo $section == "empresas" ? 'selected' : ''; ?>" href="/directorio/empresas">Empresas</a>
    </div>
    
</div>