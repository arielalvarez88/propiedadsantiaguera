    
<?php
$section = isset($section) ? $section : null;
$names_initials = isset($names_initials) ? $names_initials : null;
$searched_agent_name = isset($searched_agent_name) ? $searched_agent_name : null;
$names_initials = isset($names_initials) ? $names_initials : null;
?>        
  
        <div id="directory-search-agent-header">
            <form id="directory-search-agent-name" method="get" action="/directorio/agentes">
                <input id="directory-search-agent-name-field" type="text" value="<?php echo $searched_agent_name;?>"  name="nombre" />
                <input type="submit"  value="Buscar" class="green-button"/>

            </form>   
            <ul id="initials-container">
                <?php foreach ($names_initials  as $names_initial): ?>
                    <li><?php echo $names_initial; ?></li>
                <?php endforeach; ?>

            </ul> 
        </div> 
       

 