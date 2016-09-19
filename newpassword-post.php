<?php
$login = false;
ob_start();
require_once "lib/site.php";
unset($_SESSION['newuser-error']);
var_dump($_POST);

$msg = $users->changePassword(strip_tags($_POST['newpassword']), $_POST['usermail']);
$redirectLocation = $_POST['page'];
if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    header("location: ../signIn.php");
    exit;
}
/*header("location: signIn.php");*/
header("location: ".$redirectLocation);
exit;