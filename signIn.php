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
<section id='main' class="signInUp">
	<h2 class="signInUp">Sign In</h2>
</section>

<?php if(!isset($_SESSION['user'])) { ?>

<!--===============================
Sign In Form & Submit
================================-->
<section id='signInUp' class="main">
	<!--<form class="signInUpForm" name="login" action="loggedIn.php" method="post" accept-charset="utf-8">-->
    <form class="signInUpForm" name="login" action="login-post.php" method="post" accept-charset="utf-8">
			 <label for="usermail">Email</label>
			 <input class="loginField" type="email" name="usermail" placeholder="EMAIL"><br>
			 <label for="password">Password</label>
			 <input class="loginField" type="password" name="password" placeholder="PASSWORD"><br>
			 <input class="Submit" type="submit" value="LOGIN"><br>
			 <a href="#WillBringUpAModal" class="forgotPassword">FORGOT PASSWORD?</a>
			 <a href="signUp.php" class="signUpButton">SIGN UP?</a>

</section>
<?php  } ?>

    

<?php if(isset($_SESSION['user'])){ ?>
    <form id="loginForm" action="post/logout-post.php" method="post">
        <p>You're already logged in, click the button below to logout.</p>
        <input type="submit" value="Log out">
    </form>
<?php } ?>
<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
