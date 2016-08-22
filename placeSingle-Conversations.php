<?php
    require "lib/site.php";
	
    ob_start();		 

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		/*$exhibit = $exhibits->get($id);*/
        $location = $locations->get($id);
        $area = $areas->get($id);

	}else {
		header('Location: /placeSingle-Conversations.php');
	}
	
	$placeType = "";
    if($location != null){
        $placeType = "L";
    }
    else if($area != null){
         $placeType = "A";
    }
?>

<?php
    if($placeType == "L"){
        $pagename = $location->getName();
    }
    else if($placeType == "A"){
        $pagename = $area->getName();
    }

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
<?php
$step = null;
$total = null;
$expid = null;
if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {
	$step = $_GET['s'];
    $total = $_GET['t'];
    $expid = $_GET['expid']
?>


<?php
    $exploration = $explorations->get($_GET['expid']);
    $stops = $exploration->getStops();
    $stopsArry = array();

    for ($x = 0; $x < count($stops); $x++) {

        $stops[$x] = str_replace("A", "", $stops[$x]);

        if($locations->get($stops[$x]) != null){
            array_push($stopsArry,$stops[$x]);
        }

        if($areas->get($stops[$x]) != null){
            array_push($stopsArry, $stops[$x]);
        }
    }
?>


<div class="onExploration sub">
    <a class="previousStop" href="placeSingle-Conversations.php?id=<?php 
            if($step == "1"){
                echo $stopsArry[$total-1];
            }
            else {
                echo $stopsArry[$step - 2];
            }
        ?>&s=<?php
            if($step == "1"){
                echo $total;
            }
            else {
                echo ($step - 1);
            }?>&t=<?php echo $total; ?>&expid=<?php echo $expid; ?>
                              "><img src="assets/svgs/arrow.svg"/></a>
        
        
    <a class="explorationTitle" href="explorationSingle.php?id=<?php echo $expid; ?>"><?php echo $explorations->get($expid)->getName(); ?></a>
    <p class="stopNumberOfNumber"><?php echo $step; ?> of <?php echo $total; ?></p>
    <a class="nextStop" href="placeSingle-Conversations.php?id=<?php 
            if($step == $total){
                echo $stopsArry[0] ;
            }
            else{
                echo $stopsArry[$step] ;
            }
                              ?>&s=<?php
            if($step == $total){
                echo "1";
            }
            else {
                echo ($step + 1);
            }?>&t=<?php echo $total; ?>&expid=<?php echo $expid; ?>
                              "><img src="assets/svgs/arrow.svg"/></a>
</div>

<?php } ?>


<!--===============================
Place NavBar
================================-->
<div class="placeNavBar">
	<?php if($placeType == "L") { ?>
		<a class="back" href="placeSingle.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle"><?php echo $location->getName();?></p></a>
	<?php } ?>
	
	<?php if($placeType == "A") { ?>
		<a class="back" href="placeSingle.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle"><?php echo $area->getName();?></p></a>
	<?php } ?>
	
	<div class="right">
		<a class="active" href="placeSingle-Map.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Map</a>
		<a href="placeSingle-Media.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Media</a>
		<a href="placeSingle-Conversations.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Conversations</a>
		<a href="placeSingle-DigDeeper.php?id=<?php echo $_GET['id'];?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Dig Deeper</a></div>
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
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
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
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
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
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
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
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
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
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>
</section>

<a href="#" class="bottomButton openModalStartConversation">Start Conversation</a>

<!--===============================
Modals Include
================================-->
<?php
	include('includes/modalStartConversation.php');
	include('includes/modalLogInPrompt.php');
?>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
