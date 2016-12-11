<?php
  $login = false;
  require_once "lib/site.php";
  if (!isset($_SESSION['validating-text'])) {
    header("location: index.php");
    exit;
  }

  $pagename = 'Validating';
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
	<h2 class="signInUp">Validating</h2>

<h1 id="loginHeader">Validating</h1>
<p>
<?php
  echo $_SESSION['validating-text'];
  unset($_SESSION['validating-text']);
?></p>
<p><a style="color: #3EB9FD" href="signIn.php">Back to Login</a> </p>

</section>

<!--===============================
Scripts & Footer
================================-->
  <script src='js/index.js'></script>
  <script src='js/modals.js'></script>
<?php
  include('includes/footer.php');
?>