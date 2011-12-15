<?php
$company = isset($company) ? $company : null;
?>

<?php if ($company): ?>
    <div id="belongs-to-company">
        <h2 id="belongs-to-company-header">Agente pertenece a la empresa</h2>
        <?php if ($company): ?>
            <img src="<?php echo $company->photo; ?>" alt="company-image"/>
        <?php endif; ?>
        <a class="green-button" href="/miembros/ver/<?php echo $company->id;?>">Ver propiedades de esta empresa</a>
    </div>
<?php endif; ?>