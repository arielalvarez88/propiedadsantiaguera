<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$breadcrumb = isset($breadcrumb) ? $breadcrumb : '';
$back_to_results_link = isset($back_to_results_link) ? $back_to_results_link : '';
?>

<div id="breadcrumb">
    <?php echo $breadcrumb;?>
    <?php if($back_to_results_link):?>
        <a href="<?php echo $back_to_results_link?>" id="breadcrumb-back-to-results">Volver a los resultados</a>                
    <?php endif;?>
</div>