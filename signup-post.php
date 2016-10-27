<?php

$login = false;
ob_start();

require_once "lib/site.php";

unset($_SESSION['newuser-error']);

$msg = $users->newUser(
    strip_tags($_POST['username']),
    strip_tags($_POST['firstName']),
    strip_tags($_POST['lastName']),
    strip_tags($_POST['email']),
    strip_tags($_POST['password']),
    strip_tags($_POST['repeatPassword']),
    new Email());

if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    header("location: signUp.php");
    exit;
}

$_SESSION['validating-text'] = "An email has been sent to you for validation. Please click on the validation link to be able to log in.";
header("location: validating.php");
exit;
