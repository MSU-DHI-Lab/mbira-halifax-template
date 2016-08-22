<?php 
    require "lib/site.php";
	
    ob_start();		 
    
    $exhIDs = $exhibits->getIDs();

	$pagename = 'Exhibits';
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
Exhibit Icon & Title
================================-->
<section id='main'>
	<img src="assets/svgs/exhibits.svg"/>
	<h2>Exhibits</h2>
</section>

<!--===============================
Exhibits Grid
================================-->
<section id='collections' class="main">
	<div id='collections-layout' class='collections-grid'>

            <?php for($x=0; $x<count($exhIDs); $x++) { ?>
                <div class='collection-container'>
                    <div class='collection-image'>
                            <img src='<?php echo $source.$exhibits->get($exhIDs[$x])->getThumbPath(); ?>' />
                    </div>
                    <div class='collection-info'>
                            <h2 class='collection-title'><?php echo $exhibits->get($exhIDs[$x])->getName();?></h2>
                                    <a href="exhibitSingle.php?id=<?php echo $exhIDs[$x];?>" class='collection-link'>View Project</a>
                    </div>
                </div>
            <?php } ?>
        
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
