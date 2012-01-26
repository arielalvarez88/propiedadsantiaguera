<?php
$message = $message ? $message : null;
$yes_href = $yes_href ? $yes_href : null;
$no_href = $no_href ? $no_href : null;
$yes_target = isset($yes_target)? $yes_target : "_self";
$no_target = isset($no_target)? $no_target : "_self";

?>

<?php if ($message): ?>
    <div id="are-you-sure">
        <h2><?php echo $message; ?></h2>
        <div>
            <a class="green-button" href="<?php echo $yes_href; ?>" target="<?php echo $yes_target?>">Si</a>
            <a class="green-button" href="<?php echo $no_href; ?>" target="<?php echo $no_target?>">No</a>
        </div>

    </div>
<?php endif; ?>