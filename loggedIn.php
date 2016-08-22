<?php
	require "lib/site.php";
    ob_start();		
	
	$pagename = 'Home';
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
Logged In Title
================================-->
<section id='main' class="signInUp">
	<h2 class="signInUp"><?php $user->getFirstName().' '.$user->getLastName();?></h2>
</section>

<!--===============================
Sign In Form & Submit
================================-->
<section id='signInUp' class="main">
	<form class="signInUpForm" name="login" action="signIn.php" method="post" accept-charset="utf-8">
			 <input class="Submit" type="submit" value="LOG OUT?"><br>

</section>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
