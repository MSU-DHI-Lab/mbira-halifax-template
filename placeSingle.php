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
		header('Location: /placeSingle.php');
	}

    
    $count = $exhibits->getCount();
	$titles = $exhibits->getTitles();
	$id_table = $exhibits->getIDs();
	$paths = $exhibits->getPaths();
    
    $countExp = $explorations->getCount();
    $titleExp = $explorations->getTitles();
    $id_tableExp = $explorations->getIDs();
    $pathsExp = $explorations->getPaths();
    
    // "L" for location
    // "A" for area
    $placeType = "";

    if($location != null){
        $placeType = "L";
    }
    else if($area != null){
         $placeType = "A";
    }
?>

<?php
    $pagename;
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
<div id='landing' class="main" style="background: url('<?php 
    if($placeType == "L") {
        echo $source.$location->getHeaderPath();
    }
    else if($placeType == "A") {
        echo $source.$area->getHeaderPath();
    }
    ?>') center center">
    <div id='landing-overlay-blend' class="main"></div>
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


<div class="onExploration">
    <a class="previousStop" href="placeSingle.php?id=<?php 
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
    <a class="nextStop" href="placeSingle.php?id=<?php 
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
Exhibit Nave & About
================================-->
<section id='main'>
	<h2><?php 
        if($placeType == "L") {
            echo $location->getName();
        }
        else if($placeType == "A") {
            echo $area->getName();
        }
    ?></h2>
	<div class="placeNav">
		<a href="placeSingle-Map.php?id=<?php echo $_GET['id']; ?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {?>&s=<?php echo $_GET['s']?>&t=<?php echo $_GET['t']?>&expid=<?php echo $_GET['expid']?><?php } ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/map.svg"/>
				<p class="placeNavItemTitle">VIEW ON MAP</p>
			</div>
		</a>
		<a href="placeSingle-Media.php?id=<?php echo $_GET['id']; ?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {?>&s=<?php echo $_GET['s']?>&t=<?php echo $_GET['t']?>&expid=<?php echo $_GET['expid']?><?php } ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/media.svg"/>
				<p class="placeNavItemTitle">VIEW MEDIA</p>
			</div>
		</a>
		<a href="placeSingle-Conversations.php?id=<?php echo $_GET['id']; ?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {?>&s=<?php echo $_GET['s']?>&t=<?php echo $_GET['t']?>&expid=<?php echo $_GET['expid']?><?php } ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/conversations.svg"/>
				<p class="placeNavItemTitle">VIEW CONVERSATIONS</p>
			</div>
		</a>
		<a href="placeSingle-DigDeeper.php?id=<?php echo $_GET['id']; ?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {?>&s=<?php echo $_GET['s']?>&t=<?php echo $_GET['t']?>&expid=<?php echo $_GET['expid']?><?php } ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/digDeeper.svg"/>
				<p class="placeNavItemTitle">DIG DEEPER</p>
			</div>
		</a>
	</div>
	<p>
        <?php 
        if($placeType == "L") {
            echo $location->getDes();
        }
        else if($placeType == "A") {
            echo $area->getDes();
        }?>
    </p>
</section>

<!--===============================
Connected Exhibits
================================-->
<?php if($placeType == "L") { ?>
    <?php
        $connectedExhibits = array();
        // for all the exhibits
        foreach($id_table as $ex_id){
            // for all the locations in each exhibit
            foreach((array)$exhibits->getLocationID($ex_id) as $loc_id){
                // if location ids match
                if($loc_id == $location->getId()){
                    array_push($connectedExhibits, $ex_id);
                }
            }
        }
    ?>
<?php } ?>

<?php if($placeType == "A") { ?>
    <?php
        $connectedExhibits = array();
        // for all the exhibits
        foreach($id_table as $ex_id){
            // for all the locations in each exhibit
            foreach((array)$exhibits->getAreaID($ex_id) as $loc_id){
                // if location ids match
                if($loc_id == $area->getId()){
                    array_push($connectedExhibits, $ex_id);
                }
            }
        }
    ?>
<?php } ?>

<?php if( count($connectedExhibits) > 0 ) {?>
<section id='collections' class="singlePlace">
    <div class="collectionTitle"><h4>Connected Exhibits</h4></div>
    <div id='collections-layout' class='collections-grid'>        
            <?php    
                foreach($connectedExhibits as $ex_id){
                    // if this is not the current exhibit
                   echo 
                       "<div class='collection-container'>
                            <div class='collection-image'>
                                    <img src='".$source.$exhibits->get($ex_id)->getHeaderPath()."' />
                            </div>
                            <div class='collection-info'>
                                    <h2 class='collection-title'>".$exhibits->get($ex_id)->getName()."</h2>
                                            <a href='exhibitSingle.php?id=".$ex_id."' class='collection-link'>View Project</a>
                            </div>
                        </div>"; 

                }
            ?>
    </div>
</section>
<?php } ?>

<!--===============================
Connected Explorations
================================-->
<?php
if($placeType == "L") {
    $connectedExplorations = array();
    // exploration ids
    foreach($id_tableExp as $exp_id){
        // location ids in all the exploration ids
        foreach($explorations->get($exp_id)->getStops() as $loc_id){
            // if location ids match
            if($loc_id == $location->getId()){
                array_push($connectedExplorations, $exp_id);
            }
        }
    }  
}
?>

<?php
if($placeType == "A") {
    $connectedExplorations = array();
    // exploration ids
    foreach($id_tableExp as $exp_id){
        // location ids in all the exploration ids
        foreach($explorations->get($exp_id)->getStops() as $loc_id){
            // if location ids match
            if($loc_id == $area->getId()){
                array_push($connectedExplorations, $exp_id);
            }
        }
    }
}
?>

<?php if( count($connectedExplorations) > 0 ) {?>
<section id='collections' class="singlePlace">
	<div class="collectionTitle"><h4 class="secondTitle">Connected Explorations</h4></div>
	<div id='collections-layout' class='collections-grid'>
        <?php
            foreach($connectedExplorations as $ex_id){
                // if this is not the current exhibit
               echo 
                   "<div class='collection-container'>
                        <div class='collection-image'>
                                <img src='".$source.$explorations->get($ex_id)->getHeaderPath()."' />
                        </div>
                        <div class='collection-info'>
                                <h2 class='collection-title'>".$explorations->get($ex_id)->getName()."</h2>
                                        <a href='explorationSingle.php?id=".$ex_id."' class='collection-link'>View Project</a>
                        </div>
                    </div>"; 

            }
        ?>
	</div>
</section>
<?php } ?>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
