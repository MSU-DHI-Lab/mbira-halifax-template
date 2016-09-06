<?php

    require "lib/site.php";	

	$count = $exhibits->getCount();
	$titles = $exhibits->getTitles();
	$id_table = $exhibits->getIDs();
	$paths = $exhibits->getPaths();
?>

<?php
	ob_start();		 

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exhibit = $exhibits->get($id);
        $location = $locations->get($id);
        $area = $areas->get($id);
        $location_ids = $exhibits->getLocationID($id);
        $area_ids = $exhibits->getAreaID($id);
        
        if($exhibit == null){
            echo "null";
        }
	}else {
		header('Location: /exhibitSingle.php');
	}

?>


<?php
    $pagename = $exhibit->getName();
    /*include "lib/site.php";*/
    
	include('includes/head.php');
	include('includes/header.php');
?>

<!--===============================
Landing Image
================================-->
	<div id='landing' class="main" style="background: url('<?php echo $source.$exhibit->getHeaderPath();?>') center center;    
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    overflow: hidden;">
		<div id='landing-overlay-blend' class="main"></div>
	</div>

<!--===============================
Exhibit Nav & About
================================-->
<section id='main'>
	<h2><?php echo $exhibit->getName(); ?></h2>
	<div class="placeNav">
		<a href="exhibitSingle-Map.php?id=<?php echo $_GET['id']; ?>">
			<div class="placeNavItem">
			<img src="assets/svgs/map.svg"/>
				<p class="placeNavItemTitle">EXPLORE EXHIBIT</p>
			</div>
		</a>
	</div>
	<p><?php echo $exhibit->getDes(); ?></p>
</section>

<!--===============================
Exhibits Connected Places
================================-->
<?php if((count($location_ids) + count($area_ids)) > 0) { ?>
<section id='collections' class="main">
	<div class="collectionTitle"><h4>Connected Places</h4></div>
	<div id='collections-layout' class='collections-grid'>
        <?php
            // replace this loop with actual exhibit tiles following the same HTML formatting
            // formatting for tiles found in main.css
    
    
            // locations
            for ($x = 0; $x < count($location_ids); $x++) {
                                
                $location = $locations->get($location_ids[$x]);
                
                echo '
                    <div class="collection-container">
                        <div class="collection-image">
                                <img src='.$source.''.$location->getThumbPath().' />
                        </div>
                        <div class="collection-info">
                                <h2 class="collection-title">'.$location->getName().'</h2>
                                        <a href="placeSingle.php?id='.$location_ids[$x].'&type=L" class="collection-link">View Project</a>
                        </div>
                    </div>
                ';
            }
        
            // areas
            for ($x = 0; $x < count($area_ids); $x++) {
                $area = $areas->get($area_ids[$x]);
                echo '
                    <div class="collection-container">
                        <div class="collection-image">
                                <img src='.$source.''.$area->getThumbPath().' />
                        </div>
                        <div class="collection-info">
                                <h2 class="collection-title">'.$area->getName().'</h2>
                                        <a href="placeSingle.php?id='.$area_ids[$x].'&type=A" class="collection-link">View Project</a>
                        </div>
                    </div>
                ';
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
