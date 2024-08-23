
<?php require_once('../../../server/config.php') ?>
<?php
session_start();
session_destroy();
header('location: '.hUrl('Home'));
?>