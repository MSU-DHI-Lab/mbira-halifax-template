<?php
	$pagename = 'Contact';
	include('includes/head.php');
	include('includes/header.php');
	include_once('/matrix/www/kora/kora/includes/koraSearch.php');
	$contactContent = KORA_Search('0436b72e7d185b2824012120','104','828',new KORA_Clause('Section','=','Contact'),array('ALL'),array(),0,0)['68-33C-1'];
?>
<main id='contact' class='about-main'>
	<?php
		include('includes/aboutNav.php');
	?>
	<div class='about-content'>
		<section>
			<?php
				$contactTitle = $contactContent['Title'];
				$contactDesc = $contactContent['Description'];
				echo "<h1 class='about-title'>$contactTitle</h1>";
				echo "<p>$contactDesc</p>";
			?>
		</section>
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
