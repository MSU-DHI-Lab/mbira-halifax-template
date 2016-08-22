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
	<div id='landing' class="placeSub">
		<div id='landing-overlay-blend' class="placeSub"></div>
	</div>

	<!--===============================
	Place NavBar
	================================-->
	<div class="placeNavBar">
		<a class="back" href="explorationSingle.php"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backExhibitTitle">Back To Exploration Title</p></a>
		<div class="right">
			<a href="explorationSingle-Map.php">Map</a>
			<a class="active"  href="explorationSingle-Conversations.php">Conversations</a></div>
	</div>

<!--===============================
Conversations
================================-->
<div class="placeSingleSubTitle"><h4>Conversations</h4></div>
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
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>

	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>
</section>

<a href="#" class="bottomButton">Start Conversation</a>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
