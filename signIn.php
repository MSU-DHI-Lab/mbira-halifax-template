<?php
    require "lib/site.php";
    /*ob_start();*/		
	$pagename = 'Sign In';
	include('includes/head.php');
	include('includes/header.php');
?>


<?php
    if (isset($_SESSION['login-error'])) {
        $msg = $_SESSION['login-error'];
    } else {
        $msg = '';
    }
?>

<!--===============================
Landing Image
================================-->
<div id='landing' class="signInUp">
	<div id='landing-overlay-blend' class="main"></div>
</div>

<!--===============================
Sign In Title
================================-->
<?php if(isset($_SESSION['user'])){ ?>
<section id='main' class="signInUp">
	<h2 class="signInUp">You're already logged in, click the button below to logout.</h2>
</section>
<section id='signInUp' class="main">
    <form class="signInUpForm" name="login" action="logout-post.php" method="post" accept-charset="utf-8">
        <input class="Submit signUp" type="submit" value="LOG OUT">
</section>
<?php } ?>


<?php if(!isset($_SESSION['user'])) { ?>
<section id='main' class="signInUp">
	<h2 class="signInUp">Sign In</h2>
</section>    
<!--===============================
Sign In Form & Submit
================================-->
<?php 
$redirectLocation = $_SERVER['REQUEST_URI'];
?>
    
<section id='signInUp' class="main">
	<!--<form class="signInUpForm" name="login" action="loggedIn.php" method="post" accept-charset="utf-8">-->
    <form class="signInUpForm" name="login" action="login-post.php" method="post" accept-charset="utf-8">
			 <label for="usermail">Email</label>
			 <input class="loginField" type="email" name="usermail" placeholder="EMAIL"><br>
			 <label for="password">Password</label>
			 <input class="loginField" type="password" name="password" placeholder="PASSWORD"><br>
			 <input class="Submit" type="submit" value="LOGIN"><br>
             <input type="hidden" name="page" value="signIn.php">
			 <a href="" class="forgotPassword">FORGOT PASSWORD?</a>
			 <a href="signUp.php" class="signUpButton">SIGN UP?</a>
    </form>
    <!--</form>-->
</section>
    
    
    
    
    
    
    
    
    
<?php 
$redirectLocation = $_SERVER['REQUEST_URI'];
$pgType = "";                                     
include('includes/modalForgotPassword.php'); 
?>

<script>
$('.forgotPassword').click(function() {
	$('#modalForgotPasswordPrompt').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
$('.closeModalPwdPrompt').click(function() {
	$('#modalForgotPasswordPrompt').removeClass('displayModal');
	$('body').removeClass('modal-open');
});
</script>

    
    
    
    
<?php  } ?>
<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
