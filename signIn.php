<?php
    require "lib/site.php";
    ob_start();		
	$pagename = 'Sign In';
	include('includes/head.php');
	include('includes/header.php');
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

<!--===============================
Sign In Form & Submit
================================-->
<section id='signInUp' class="main">
	<form class="signInUpForm" name="login" action="loggedIn.php" method="post" accept-charset="utf-8">
			 <label for="usermail">Email</label>
			 <input class="loginField" type="email" name="usermail" placeholder="EMAIL"><br>
			 <label for="password">Password</label>
			 <input class="loginField" type="password" name="password" placeholder="PASSWORD"><br>
			 <input class="Submit" type="submit" value="LOGIN"><br>
			 <a href="#WillBringUpAModal" class="forgotPassword">FORGOT PASSWORD?</a>
			 <a href="signUp.php" class="signUpButton">SIGN UP?</a>

</section>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
