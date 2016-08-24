<?php	
/*	require "lib/site.php";
    ob_start();
	
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$email = $_POST['usermail'];
	$pwd = $_POST['password'];
	
	$users->newUser($first, $last, $email, $pwd, $pwd);
	
	echo $first.$last;*/


    $login = false;
    ob_start();
    require_once "lib/site.php";
    unset($_SESSION['newuser-error']);
    var_dump($_POST);
    $msg = $users->newUser(
        strip_tags($_POST['usermail']),
        strip_tags($_POST['firstName']),
        strip_tags($_POST['lastName']),
        strip_tags($_POST['usermail']),
        strip_tags($_POST['password']),
        strip_tags($_POST['password']),
        new Email());
    if($msg !== null) {
        $_SESSION['newuser-error'] = $msg;
        header("location: signUp.php");
        exit;
    }
    header("location: validating.php");
    exit;

?>