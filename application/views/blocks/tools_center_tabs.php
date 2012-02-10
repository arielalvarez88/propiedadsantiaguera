<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$cms_documents_pager_view = isset($cms_documents_pager_view) ? $cms_documents_pager_view : null;

?>

<div id="tools-center-tabs">
    
    <div id="tools-center-tabs-item-container">
        <a class="selected tab-item tool-center-tab-item">Art&iacute;culo</a>
        <a class="tab-item tool-center-tab-item">Tutoriales</a>
        <a class="tab-item tool-center-tab-item" data-show-selector="#tools-center-documents-pager-container">Documentos de inter&eacute;s</a>
    </div>
    
    
    <div  class="tool-center-tab-body hidden" id="tools-center-documents-pager-container">
        <?php echo $cms_documents_pager_view;?>
    </div>
    
</div>
