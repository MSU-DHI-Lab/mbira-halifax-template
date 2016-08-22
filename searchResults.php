<?php
	include_once('/matrix/www/kora/kora/includes/koraSearch.php');
	$collections = KORA_Search('0436b72e7d185b2824012120','104','621',new KORA_Clause('kid','!=',''),array('ALL'),array(array('field' => 'Priority', 'direction' => SORT_ASC)),0,0);
	$homeContent = KORA_Search('0436b72e7d185b2824012120','104','828',new KORA_Clause('Section','=','Home'),array('ALL'),array(),0,0);
	$pagename = 'Home';
	include('includes/head.php');
	include('includes/header.php');
?>

<!--===============================
Landing Image
================================-->
	<div id='landing'>
		<div id='landing-overlay-blend' class="main"></div>
	</div>

<!--===============================
Search Results Based of Query
================================-->
<section id='main'>
	<h2 class="searchResults">We found  3 Exhbits, 7 Locations, 2 Areas, and 2 Explorations related to the term “cool”.</h2>
</section>

<!--===============================
Areas Grid
================================-->
<section id='collections' class="main">
	<div class="collectionTitle"><h4>Exhibits</h4></div>
	<div id='collections-layout' class='collections-grid'>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/1.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/2.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php"  class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/3.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

	</div>

	<div class="collectionTitle"><h4 class="secondTitle">Locations</h4></div>
	<div id='collections-layout' class='collections-grid'>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/1.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/2.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php"  class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/3.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

	</div>

	<div class="collectionTitle"><h4 class="secondTitle">Areas</h4></div>
	<div id='collections-layout' class='collections-grid'>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/1.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/2.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php"  class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/3.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

	</div>

	<div class="collectionTitle"><h4 class="secondTitle">Explorations</h4></div>
	<div id='collections-layout' class='collections-grid'>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/1.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/2.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php"  class='collection-link'>View Project</a>
				</div>
			</div>

			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/3.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Exploration Title will go here just like this!</h2>
								<a href="explorationSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>

	</div>

</section>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
