<?php
    require "lib/site.php";
	
    ob_start();		 

    $expIDs = $explorations->getIDs();

	$pagename = 'Explorations';
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
Explorations Icon & Title
================================-->
<section id='main'>
	<img src="assets/svgs/explorations.svg"/>
	<h2>Explorations</h2>
</section>

<!--===============================
Explorations Grid
================================-->
<section id='collections' class="main">
	<div id='collections-layout' class='collections-grid'>

            <?php for($x=0; $x<count($expIDs); $x++) { ?>
                <div class='collection-container'>
                    <div class='collection-image'>
                            <img src='<?php echo $source.$explorations->get($expIDs[$x])->getThumbPath(); ?>' />
                    </div>
                    <div class='collection-info'>
                            <h2 class='collection-title'><?php echo $explorations->get($expIDs[$x])->getName();?></h2>
                                    <a href="explorationSingle.php?id=<?php echo $expIDs[$x];?>" class='collection-link'>View Project</a>
                    </div>
                </div>
            <?php } ?>
        
<!--            <div class='collection-container'>
				<div class='collection-image-surprise'>
						<img src='assets/svgs/surpriseMe.svg'/>
				</div>
				<div class='collection-info-surprise'>
						<h2 class='collection-title'>SURPRISE ME</h2>
								<a href="" class='collection-link'>View Project</a>
				</div>
			</div>-->

            <div class='collection-container'>
                    <div class='collection-image-surprise'>
                            <img src='assets/svgs/surpriseMe.svg' />
                    </div> 
                    <a href="explorationSingle.php?id=<?php
                             echo $expIDs[array_rand($expIDs)];                             
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
