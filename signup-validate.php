<?php

    $login = false;
    require_once "lib/site.php";
    $pagename = 'Validation Page';


    $controller = new ValidationController($site);
    $user = $controller->validate($_GET['v']);

    if ($user == "Invalid validator") {
      $_SESSION['login-error'] = $user;
      header("location: signIn.php");
      exit;
    } else {
      $_SESSION['user'] = $user;
      unset($_SESSION['login-error']);
    }

    header("location: index.php");
    exit;

?>
