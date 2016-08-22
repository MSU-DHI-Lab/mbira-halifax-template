<?php
	$pagename = 'Contributors';
	include('includes/head.php');
	include('includes/header.php');
	include_once('/matrix/www/kora/kora/includes/koraSearch.php');
	$contributorsContent = KORA_Search('0436b72e7d185b2824012120','104','828',new KORA_Clause('Section','=','Contributors'),array('ALL'),array(),0,0)['68-33C-4'];
?>
<main id='contributors' class='about-main'>
  <?php
		include('includes/aboutNav.php');
	?>
  <div class='about-content'>
    <section>
			<?php
				$contributorsTitle = $contributorsContent['Title'];
				$contributorsDesc = $contributorsContent['Description'];
				echo "<h1 class='about-title'>$contributorsTitle</h1>";
				echo "<p>$contributorsDesc</p>";
			?>
			<!-- <p>AODL is possible only because of the generous contributions of individuals [link to anchor beginning of individual list] and organizations [link to top of list] willing to partner with Michigan State University to provide free access to digital collections about and from Africa.</p>

			<h2>Funders</h2>

			<p>British Library [London, England] (http://www.bl.uk)</p>
			<p>International Development Research Center (IDRC) [Ottowa, Canada] (http://www.idrc.ca/EN/Pages/default.aspx)</p>


			<h2>Michigan State University Units</h2>

			<p>British Library [London, England] (http://www.bl.uk)</p>
			<p>International Development Research Center (IDRC) [Ottowa, Canada] (http://www.idrc.ca/EN/Pages/default.aspx)</p>


			<h2>International Contributors</h2>

			<p>British Library [London, England] (http://www.bl.uk)</p>
			<p>International Development Research Center (IDRC) [Ottowa, Canada] (http://www.idrc.ca/EN/Pages/default.aspx)</p>

			<h2>Individual Contributors</h2>

			<p>AODL would not have been possible without the contributions of the following individuals. Some people acknowledged here provided access to their own personal research collections, identified materials for inclusion in this digital library, digitized, scanned, or described resources in AODL. Others contributed to AODL as researchers and content experts. Students provided a range of specialized support from coding and designing websites to maintaining technical infrastructure and translating materials. Contributors are listed by the projects in which they participated.</p>


			<h3>Africa Past and Present Podcast</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>

			<h3>African Activist Archive</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>


			<h3>African e-Journals Project</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>

			<h3>African Internet Collaborations Initiative</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>

			<h3>African Media Program</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>

			<h3>African Oral Narratives</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>

			<h3>MATRIX</h3>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p>
			<p>Abdilatif Abdalla</p>
			<p>Nwando Achebe</p> -->
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
