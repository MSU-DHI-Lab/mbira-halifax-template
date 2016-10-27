<?php

    require "lib/site.php";
    $login = false;
    unset($_SESSION['user']);
    $_SESSION['login-error'] = "Successfully Logged Out.";

    header("Location: signIn.php");

?>
