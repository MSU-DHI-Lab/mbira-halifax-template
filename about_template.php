<?php
	$pagename = 'Purpose';
	include('includes/head.php');	
	include('includes/header.php');
	include_once('/matrix/www/kora/kora/includes/koraSearch.php');
	$purposeContent = KORA_Search('0436b72e7d185b2824012120','104','828',new KORA_Clause('Section','=','Purpose'),array('ALL'),array(),0,0)['68-33C-2'];
?>
<main id='purpose' class='about-main'>
	<?php
		include('includes/aboutNav.php');
	?>
	<div class='about-content'>
		<section>
			<h1 class='about-title'>Purpose</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</section>
		<section>
			<h1 class='about-title'>Header Looks Like This!</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</section>
		<figure>
			<img src='assets/imgs/LandingBackgroundImage.jpg' />
			<figcaption>This is what a caption would look like.</figcaption>
		</figure>
		<section>
			<h1 class='about-title'>Header Looks Like This!</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</section>
	<?php
		var_dump($purposeContent);
	?>
	</div>
</main>
<!--===============================
Modals Include
================================-->
<?php
	include('includes/modals.php');	
?>
<!--===============================
Scripts & Footer
================================-->
	<script src='js/aboutNav.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');	
?>