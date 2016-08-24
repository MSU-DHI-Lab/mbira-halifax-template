<?php
	require "lib/site.php";
	
    ob_start();	
	
	$pagename = "All Areas";
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
Area Icon & Title
================================-->
<section id='main'>
	<img src="assets/svgs/areas.svg"/>
	<h2>Areas</h2>
</section>

<!--===============================
Areas Grid
================================-->
<section id='collections' class="main">
	<div id='collections-layout' class='collections-grid'>

        
        
        
        <?php 
            $id_table = $exhibits->getIDs();
            $area_ids = array();
                
            // each exhibit
            for($x=0; $x < count($id_table); $x++)
            {
                // get locations at exhibit 
                $temp_area_ids = $exhibits->getAreaID($id_table[$x]);

                for($j=0; $j<count($temp_area_ids); $j++){
                    if(!in_array($temp_area_ids[$j], $area_ids)){
                        array_push($area_ids, $temp_area_ids[$j]);   
                    }
                }
            }

        ?>

        <?php for($i=0; $i<count($area_ids); $i++){ ?>
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='<?php echo $source.$areas->get($area_ids[$i])->getThumbPath()?>' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'><?php echo $areas->get($area_ids[$i])->getName()?></h2>
								<a href="placeSingle.php?id=<?php echo $area_ids[$i];?>&type=A" class='collection-link'>View Project</a>
				</div>
			</div>
                        
        <?php } ?>
        
        
            <div class='collection-container'>
                    <div class='collection-image-surprise'>
                            <img src='assets/svgs/surpriseMe.svg' />
                    </div> 
                    <a href="placeSingle.php?id=<?php
                             echo $areas->get_random();                             
                             ?>&type=A">
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
