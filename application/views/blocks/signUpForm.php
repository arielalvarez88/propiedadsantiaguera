<div id="signup-form">
    <h2 id="new-user-type-header" class="section-header">Inscripci&oacute;n de usuario</h2>
          
        <?php if (isset($messages) && $messages): ?>
        <div class="info-messages"><?php echo $messages; ?></div>
    <?php endif; ?>

    <?php echo $signUpForm;?>
    
    
</div>