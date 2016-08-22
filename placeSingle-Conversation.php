<?php
    require "lib/site.php";
	
    ob_start();	

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exhibit = $exhibits->get($id);
        $location = $locations->get($id);
        $area = $areas->get($id);

	}else {
		header('Location: /placeSingle-Conversations.php');
	}
?>

<?php
    $pagename = 'Home';
	include('includes/head.php');
	include('includes/header.php');
?>


<!--===============================
Landing Image
================================-->
<div id='landing' class="placeSub">
    <div id='landing-overlay-blend' class="placeSub"></div>
</div>

<!--===============================
Place on Exploration Controls (Only active when user has selected "start Exploration")
================================-->
<div class="onExploration sub">
    <a class="previousStop" href="#PreviousStop"><img src="assets/svgs/arrow.svg"/></a>
    <a class="explorationTitle" href="#TakesUserToExploration">Exploration Title</a>
    <p class="stopNumberOfNumber">1 of 4</p>
    <a class="nextStop" href="#NextStop"><img src="assets/svgs/arrow.svg"/></a>
</div>

<!--===============================
Place NavBar
================================-->
<div class="placeNavBar">
	<a class="back" href="placeSingle-Conversations.php"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle">Back To All Conversations</p></a>
	<div class="right">
		<a href="placeSingle-Map.php">Map</a>
		<a href="placeSingle-Media.php">Media</a>
		<a class="active" href="placeSingle-Conversations.php">Conversations</a>
		<a href="placeSingle-DigDeeper.php">Dig Deeper</a></div>
</div>

<!--===============================
Conversations
================================-->
<div class="selectedConversationCard">
<div class="conversationCard selectedConversation">
	<div class="userDate">
		<p class="userName">User Name</p>
		<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
		<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
		<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
		<p class="date">7.15.16</p></div>
	<div class="conversationPreview">
	<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
</div></div>

<section id='conversations'>
	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
	</div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		</div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		</div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		</div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		</div>
</section>

<a href="#" class="bottomButton openModalParticipateInConversation">Participate in Conversation</a>

<!--===============================
Modals Include
================================-->
<?php
	include('includes/modalParticipateInConversation.php');
	include('includes/modalLogInPrompt.php');
?>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
	<script src='js/map.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
