<?php
    require "lib/site.php";
    ob_start();	
	$pagename = 'Sign Up';
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
Sign Up Title
================================-->
<section id='main' class="signInUp">
	<h2 class="signInUp">Sign Up</h2>
</section>

<!--===============================
Sign Up Form & Submit
================================-->
<section id='signInUp' class="main">
	<form class="signInUpForm" name="login" action="profile.php" method="post" accept-charset="utf-8">
			<label for="usermail">First Name</label>
			<input class="loginField" type="text" name="firstname" placeholder="FIRST NAME"><br>
			<label for="usermail">Last Name</label>
			<input class="loginField" type="text" name="lastname" placeholder="LAST NAME"><br>
			 <label for="usermail">Email</label>
			 <input class="loginField" type="email" name="usermail" placeholder="EMAIL"><br>
			 <label for="password">Password</label>
			 <input class="loginField" type="password" name="password" placeholder="PASSWORD"><br>
			 <div id="captcha">
					<div class="g-recaptcha" data-sitekey="6LchXgwTAAAAAEeWIcvzsYI4JEpgRP7tAvuWiOph"></div></div>
			 <input class="Submit signUp" type="submit" value="SIGN UP">
			 <a href="signIn.php" class="signUpButton">BACK TO SIGN IN</a>

</section>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
