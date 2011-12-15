<?php
$message = $message ? $message : null;
$yes_href = $yes_href ? $yes_href : null;
$no_href = $no_href ? $no_href : null;
?>

<?php if ($message): ?>
    <div id="are-you-sure">
        <h2><?php echo $message; ?></h2>
        <div>
            <a class="green-button" href="<?php echo $yes_href; ?>">Si</a>
            <a class="green-button" href="<?php echo $no_href; ?>">No</a>
        </div>

    </div>
<?php endif; ?>