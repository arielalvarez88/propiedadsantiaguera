<?php
$section = isset($section) ? $section : '';
$form_content = isset($form_content) ? $form_content : null;
$edit = isset($edit)? $edit : null;
?>
<div id="<?php echo $section; ?>signup-form-container">
    <form enctype="multipart/form-data" id="signup-form" accept-charset="utf-8" method="post" action="<?php echo Environment_vars::$paths["https_base_site"];?>/usuario/validate<?php echo $edit ? '/edit' : ''; ?>">

        <?php echo $form_content?>
    </form>


</div>    

