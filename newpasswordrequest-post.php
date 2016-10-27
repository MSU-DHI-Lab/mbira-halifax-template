<?php

$login = false;
ob_start();

require_once "lib/site.php";

unset($_SESSION['newpass-error']);

$msg = $users->sendNewPwdEmail(strip_tags($_POST['email']));

if($msg !== null) {
    $_SESSION['newpass-error'] = $msg;
    header("location: newpasswordrequest.php");
    exit;
}

$_SESSION['validating-text'] = "An email has been sent to you for validation. Please click on the validation link to access the reset password form.";
header("location: validating.php");
exit;
