<?php
    require "lib/site.php";
    /*ob_start();	*/
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
	<form class="signInUpForm" name="login" action="signup-post.php" method="post" accept-charset="utf-8">

      <?php
      if(isset($_SESSION['newuser-error'])) {
          echo "<p>" . $_SESSION['newuser-error'] . "</p>";
          unset($_SESSION['newuser-error']);
      }
      ?>

      <label for="username">Username</label>
			<input class="loginField" type="text" name="username" placeholder="USERNAME"><br>
			<label for="firstName">First Name</label>
			<input class="loginField" type="text" name="firstName" placeholder="FIRST NAME"><br>
			<label for="lastName">Last Name</label>
			<input class="loginField" type="text" name="lastName" placeholder="LAST NAME"><br>
      <label for="email">Email</label>
      <input class="loginField" type="email" name="email" placeholder="EMAIL"><br>
      <label for="password">Password</label>
      <input class="loginField" type="password" name="password" placeholder="PASSWORD"><br>
      <label for="repeatPassword">Password Confirmation</label>
      <input class="loginField" type="password" name="repeatPassword" placeholder="Repeat Password" /><br/>
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
