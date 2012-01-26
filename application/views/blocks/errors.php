<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of errors
 *
 * @author ariel
 */
$errors = isset($errors ) ? $errors  : null;
?>

<?php if($errors ):?>
<div class="error-messages">
    <?php echo $errors;?>
</div>
<?php endif;?>
