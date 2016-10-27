<?php

  $login = false;
  ob_start();

  require_once "lib/site.php";

  $controller = new ValidationController($site);
  $msg = $controller->validatePassword(
    strip_tags($_POST['v']),
    strip_tags($_POST['password']),
    strip_tags($_POST['repeatPassword']));

  if ($msg !== null) {
    $_SESSION['newpass-error'] = $msg;
    header("location: resetpassword.php?v=".$_POST['v']);
    exit;
  } else {
    $_SESSION['login-error'] = "Successfully reset password.";
  }

  header("location: signIn.php");
  exit;
