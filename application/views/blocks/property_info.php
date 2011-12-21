<?php
$property_address = isset($property_address) ? $property_address : null;
$property_features = isset($property_features) && is_array($property_features) ? $property_features : null;
$property_close_places = isset($property_close_places) && is_array($property_close_places) ? $property_close_places : null;
$property_description = isset($property_description) ? $property_description : null;
?>

<div id="property-info">

<?php if ($property_description): ?>
        <h2 id="property-info-descripcion-title">Descripci&oacute;n</h2>
        <p id="property-info-descripcion">
    <?php echo $property_description; ?>
        </p>
        <?php endif; ?>

    <?php if ($property_features): ?>
        <?php $number_of_property_features = count($property_features); ?>
        <div id="property-info-caracteristicas">
            <h2 id="property-info-caracteristicas-tile">Caracter&iacute;sticas</h2>
            <ul id="property-info-caracteristicas-list">
    <?php for ($i = 0; $i < $number_of_property_features; $i++): ?>
                    <li>- <?php echo $property_features[$i]->name; ?></li>
                    <?php if (($i + 1) % 14 == 0 && $i != $number_of_property_features - 1): ?>
                    </ul>
                    <ul>
        <?php endif; ?>

                    <?php if ($i == $number_of_property_features - 1): ?>
                    </ul>
                    <?php endif; ?>

            <?php endfor; ?>

        </div>
<?php endif; ?>

    <div id="property-info-address-close-places-container">
<?php if ($property_close_places): ?>
            <?php $number_of_close_places = count($property_close_places); ?>
            <div id="property-info-close-places">
                <h2>Lugares Cercanos de Inter&eacute;s</h2>
                <ul>

    <?php for ($i = 0; $i < $number_of_close_places; $i++): ?>
                        <li>- <?php echo $property_close_places[$i]->name; ?></li>

        <?php if (($i + 1) % 5 == 0 && $i != $number_of_close_places - 1): ?>
                        </ul>
                        <ul>
        <?php endif; ?>

                        <?php if ($i == $number_of_close_places - 1): ?>
                        </ul>
                        <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endif; ?>

        <?php if ($property_address): ?>
            <div id="property-info-address">
                <h2>Direcci&oacute;n</h2>
            <?php echo $property_address; ?>
            </div>
            <?php endif; ?>
    </div>


</div>