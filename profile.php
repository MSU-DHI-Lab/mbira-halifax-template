<?php	
	require "lib/site.php";
    ob_start();
	
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$email = $_POST['usermail'];
	$pwd = $_POST['password'];
	
	$users->newUser($first, $last, $email, $pwd, $pwd);
	
	echo $first.$last;
?>