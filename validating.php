<?php

$login = false;
require_once "lib/site.php";
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
	<h2 class="signInUp">Validating</h2>
</section>

<h1 id="loginHeader">Validating</h1>
<p>
<?php
  echo $_SESSION['validating-text'];
  unset($_SESSION['validating-text']);
?></p>
<p><a href="signIn.php">Back to Login</a> </p>

</form>
