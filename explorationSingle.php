<?php
	require "lib/site.php";

	$count = $explorations->getCount();
	$titles = $explorations->getTitles();
	$id_table = $explorations->getIDs();
	$paths = $explorations->getPaths();
?>

<?php
	ob_start();

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
	$exploration = $explorations->get($id);
        $stops = $exploration->getStops();
		$area = $areas->get($id);
	}else {
		header('Location: /explorationSingle.php');
	}

?>

<?php

	$pagename = $exploration->getName();
	$name = $pagename;

	include('includes/head.php');
	include('includes/header.php');
?>

<!--===============================
Landing Image
================================-->
<div id='landing' class="main" style="background: url('<?php echo $source.$exploration->getHeaderPath();?>') center center;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    overflow: hidden;">
    <div id='landing-overlay-blend' class="main"></div>
</div>

<!--===============================
Exploration Nav & About
================================-->
<section id='main'>
	<h2><?php echo $exploration->getName(); ?></h2>
	<div class="placeNav">
		<a href="explorationSingle-Map.php?id=<?php echo $_GET['id']; ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/map.svg"/>
				<p class="placeNavItemTitle">START EXPLORATION</p>
			</div>
		</a>


    <?php
        foreach($explorations->getCommentsToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){
    ?>
    <a href="explorationSingle-Conversations.php?id=<?php echo $_GET['id']; ?>">
      <div class="placeNavItem">
        <img src="assets/svgs/conversations.svg"/>
        <p class="placeNavItemTitle">VIEW CONVERSATIONS</p>
      </div>
    </a>
    <?php
                break;
            }
        }
    ?>

	</div>
	<div id="description_place"><?php $exploration->getDes();?></div>
</section>

<!--===============================
Exploration Stops
================================-->
<section id='collections' class="main">
	<div class="collectionTitle"><h4>Stops</h4></div>
	<div id='collections-layout' class='collections-grid'>

    <?php
        for ($x = 0; $x < count($stops); $x++) {

            /*$stops[$x] = str_replace("A", "", $stops[$x]);*/
            $stopsArray = array();
            $type = array();

            if($locations->get($stops[$x]) == null || $areas->get(str_replace("A", "", $stops[$x])) == null){

                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                        echo '
                            <div class="collection-container">
                                <div class="collection-image">
                                        <img src='.$source.$stop->getThumbPath().' />
                                </div>
                                <div class="collection-info">
                                        <h2 class="collection-title">'.$stop->getName().'</h2>
                                                <a href="placeSingle.php?id='.$stops[$x].'&type=L&s='.($x+1).'&t='.count($stops).'&expid='.$_GET['id'].'" class="collection-link">View Project</a>
                                </div>
                            </div>
                        ';
                }

                if($areas->get(str_replace("A", "", $stops[$x])) != null){
                    $stop = $areas->get(str_replace("A", "", $stops[$x]));
                        echo '
                            <div class="collection-container">
                                <div class="collection-image">
                                        <img src='.$source.$stop->getThumbPath().' />
                                </div>
                                <div class="collection-info">
                                        <h2 class="collection-title">'.$stop->getName().'</h2>
                                                <a href="placeSingle.php?id='.str_replace("A", "", $stops[$x]).'&type=A&s='.($x+1).'&t='.count($stops).'&expid='.$_GET['id'].'" class="collection-link">View Project</a>
                                </div>
                            </div>
                        ';
                }
            }

            if($locations->get($stops[$x]) != null && $areas->get(str_replace("A", "", $stops[$x])) != null){

                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                        echo '
                            <div class="collection-container">
                                <div class="collection-image">
                                        <img src='.$source.$stop->getThumbPath().' />
                                </div>
                                <div class="collection-info">
                                        <h2 class="collection-title">'.$stop->getName().'</h2>
                                                <a href="placeSingle.php?id='.$stops[$x].'&type=L&s='.($x+1).'&t='.count($stops).'&expid='.$_GET['id'].'" class="collection-link">View Project</a>
                                </div>
                            </div>
                        ';
                }

                if($areas->get(str_replace("A", "", $stops[$x])) != null){
                    $stop = $areas->get(str_replace("A", "", $stops[$x]));
                        echo '
                            <div class="collection-container">
                                <div class="collection-image">
                                        <img src='.$source.$stop->getThumbPath().' />
                                </div>
                                <div class="collection-info">
                                        <h2 class="collection-title">'.$stop->getName().'</h2>
                                                <a href="placeSingle.php?id='.str_replace("A", "", $stops[$x]).'&type=A&s='.($x+1).'&t='.count($stops).'&expid='.$_GET['id'].'" class="collection-link">View Project</a>
                                </div>
                            </div>
                        ';
                }


                $x++;
            }

		}
    ?>
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
