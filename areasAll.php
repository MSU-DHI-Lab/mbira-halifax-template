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
								<a href="placeSingle.php?id=<?php echo $area_ids[$i];?>" class='collection-link'>View Project</a>
				</div>
			</div>
                        
        <?php } ?>
        
        
        
        
        
        
        
        
        
        
<!--        
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='assets/imgs/1.jpg' />
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>Area Title will go here just like this!</h2>
								<a href="placeSingle.php" class='collection-link'>View Project</a>
				</div>
			</div>-->
			
			<?php
			// areas
/*			$allProjs = $projects->get_all();
			for($j=0; $j<count($allProjs); $j++)
			{
				// this is not an array - nedes to be fixed
				for($projects->get($allProjs[j]) as  $val)
				{
				$area = $areas->get($val);
                echo '
                    <div class="collection-container">
                        <div class="collection-image">
                                <img src='.$source.''.$area->getThumbPath().' />
                        </div>
                        <div class="collection-info">
                                <h2 class="collection-title">'.$area->getName().'</h2>
                                        <a href="placeSingle.php?id='.$val.'" class="collection-link">View Project</a>
                        </div>
                    </div>
                ';
				}
			}*/
			
/*             for ($x = 0; $x < count($area_ids); $x++) {
                $area = $areas->get($area_ids[$x]);
                echo '
                    <div class="collection-container">
                        <div class="collection-image">
                                <img src='.$source.''.$area->getThumbPath().' />
                        </div>
                        <div class="collection-info">
                                <h2 class="collection-title">'.$area->getName().'</h2>
                                        <a href="placeSingle.php?id='.$area_ids[$x].'" class="collection-link">View Project</a>
                        </div>
                    </div>
                ';
            } */
			?>
			
            <div class='collection-container'>
				<div class='collection-image-surprise'>
						<img src='assets/svgs/surpriseMe.svg'/>
				</div>
				<div class='collection-info-surprise'>
						<h2 class='collection-title'>SURPRISE ME</h2>
								<a href="" class='collection-link'>View Project</a>
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
