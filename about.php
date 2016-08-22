<?php
    include('lib/site.php');

    $project = $projects->get(PROJID);  	///< Load the project
    $pagename = 'About';

    include('includes/head.php');
	include('includes/header.php');
?>
<!--===============================
Landing Image
================================-->
<div id='landing' class="about" style="background: url('<?php echo $source.$project->getHeaderPath();?>') center center">>
    <div id='landing-overlay-blend' class="about"></div>
</div>
<!--===============================
Project About
================================-->
<section id='about'>
	<h2><?php echo $projects->get(PROJID)->getName(); ?></h2>
	<p><?php echo nl2br($projects->get(PROJID)->getDes()); ?></p>
</section>

<!--===============================
About Navigation at Bottom of Page
================================-->
<div class="aboutNav">
	<a href="exhibitsAll.php">
		<div class="placeNavItem">
		<img src="assets/svgs/exhibitsBlue.svg"/>
			<p class="placeNavItemTitle">VIEW EXHIBITS</p>
		</div>
	</a>
	<a href="locationsAll.php">
		<div class="placeNavItem">
		<img src="assets/svgs/locationsBlue.svg"/>
			<p class="placeNavItemTitle">VIEW LOCATIONS</p>
		</div>
	</a>
	<a href="areasAll.php">
		<div class="placeNavItem">
		<img src="assets/svgs/areasBlue.svg"/>
			<p class="placeNavItemTitle">VIEW AREAS</p>
		</div>
	</a>
	<a href="explorationsAll.php">
		<div class="placeNavItem">
		<img src="assets/svgs/explorationsBlue.svg"/>
			<p class="placeNavItemTitle">VIEW EXPLORATIONS</p>
		</div>
	</a>
</div>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
