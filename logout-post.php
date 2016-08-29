<?php

    require "lib/site.php";
    $login = false;
    unset($_SESSION['user']);

    header("Location: signIn.php");

?>