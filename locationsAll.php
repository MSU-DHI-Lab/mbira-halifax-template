<?php
    require "lib/site.php";
	
    ob_start();		 

	$pagename = 'Locations';
	include('includes/head.php');
	include('includes/header.php');
?>

<!--===============================
Landing Image
================================-->
	<div id='landing'>
		<div id='landing-overlay' class="main"></div>
	</div>

<!--===============================
Location Icon & Title
================================-->
<section id='main'>
	<img src="assets/svgs/locations.svg"/>
	<h2>Locations</h2>
</section>

<!--===============================
Locations Grid
================================-->
<section id='collections' class="main">
	<div id='collections-layout' class='collections-grid'>

        
        <?php 
            $id_table = $exhibits->getIDs();
            $loc_ids = array();
                
            // each exhibit
            for($x=0; $x < count($id_table); $x++)
            {
                // get locations at exhibit 
                $temp_loc_ids = $exhibits->getLocationID($id_table[$x]);

                for($j=0; $j<count($temp_loc_ids); $j++){
                    if(!in_array($temp_loc_ids[$j], $loc_ids)){
                        array_push($loc_ids, $temp_loc_ids[$j]);   
                    }
                }
            }

        ?>

        <?php for($i=0; $i<count($loc_ids); $i++){ ?>
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='<?php echo $source.$locations->get($loc_ids[$i])->getThumbPath()?>' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'><?php echo $locations->get($loc_ids[$i])->getName()?></h2>
								<a href="placeSingle.php?id=<?php echo $loc_ids[$i];?>" class='collection-link'>View Project</a>
				</div>
			</div>
                        
        <?php } ?>
                
            <div class='collection-container'>
                    <div class='collection-image-surprise'>
                            <img src='assets/svgs/surpriseMe.svg' />
                    </div> 
                    <a href="placeSingle.php?id=<?php
                             echo $loc_ids[array_rand($loc_ids)];                             
                             ?>">
                        <div class='collection-info-surprise'>
                            <h2 class='collection-title'>SURPRISE ME</h2>  
                        </div>
                    </a>
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
