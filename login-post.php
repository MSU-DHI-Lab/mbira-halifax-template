<?php

require 'lib/site.php';
$login = true;
if(isset($_POST['usermail']) && isset($_POST['password'])) {
    $users = new Users($site);
    $user = $users->login($_POST['usermail'], $_POST['password']);
    if(!is_string($user)) {
        $_SESSION['usermail'] = $user;
        unset($_SESSION['login-error']);
        header("location: ../");
        exit;
    } else {
        $_SESSION['login-error'] = $user;
    }
}
header("location: signIn.php");

?>