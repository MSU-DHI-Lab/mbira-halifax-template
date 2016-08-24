<?php
    $login = false;
    require_once "lib/site.php";
    $controller = new ValidationController($site);
    $msg = $controller->validate($_GET['v']);
    header("location: signIn.php");
    exit;
?>