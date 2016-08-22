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
			<?php
				$purposeTitle = $purposeContent['Title'];
				$purposeDesc = $purposeContent['Description'];
				echo "<h1 class='about-title'>$purposeTitle</h1>";
				echo "<p>$purposeDesc</p>";
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