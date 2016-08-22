<?php
	require 'lib/site.php';

	if(is_null($projects->get(PROJID))) {
		echo "Invalid project id";
		if (is_null(PROJID)) {
			die("You haven't chosen project id");
		} else {
			die("Wrong project id selected, check your project list");
		}
	}
    
    $project = $projects->get(PROJID);  	///< Load the project
    $pagename = $project->getName();        		///< Get project name
    $des = $project->getDes();          		///< Get project description
    $short_des = $project->getShortdes();   	///< Get project short description
	$header_path = $project->getHeaderPath(); 	///< Get project header image path
    include('includes/head.php');
    include('includes/header.php');
?>

<?php
	/*require "lib/site.php";*/
	$count = $exhibits->getCount();
	$titles = $exhibits->getTitles();
	$id_table = $exhibits->getIDs();
	$paths = $exhibits->getPaths();

    $countExpl = $explorations->getCount();
	$titlesExpl = $explorations->getTitles();
	$id_tableExpl = $explorations->getIDs();
	$pathsExpl = $explorations->getPaths();
?>



<main id='home'>

<!--===============================
Landing Image/Logo/Arrow
================================-->
	<div id='landing' style="background: url('<?php echo $source.$project->getHeaderPath();?>') center center;    
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    overflow: hidden;">
		<div id='landing-overlay-blend'>
			<h2 class="landing-h2"><?php echo $pagename ?></h2>
			<h3 class="landing-h3">
                <?php 
                        echo $short_des;
                ?>
            </h3>
		</div>
		<img src='assets/svgs/ArrowDown.svg' id='landing-arrow' />
	</div>

<!--===============================
Project About
================================-->
	<section id='summary'>
		<p>
		<?php 
		$ct = 0;
		$str_ary = explode(" ", $des);
		foreach($str_ary as $word)
		{
			if($ct < 100){
				echo $word.' ';
			}
			if($ct == 100) {
				echo $word.'...';
			}
			$ct++;
		}
		?>
		</p>
		<a href='about.php'><button type='button' class='button'>Learn More</button></a>
	</section>

<!--===============================
Exhibits Grid
================================-->
	<section id='collections'>
		<div class="collectionTitle"><h4>Explore an Exhibit</h4></div>
		<div id='collections-layout' class='collections-grid'>
            <?php
                // replace this loop with actual exhibit tiles following the same HTML formatting
                // formatting for tiles found in main.css

                for ($x = 0; $x < $count; $x++) {
                    echo '
                        <div class="collection-container">
                            <div class="collection-image">
                                    <img src='.$source.$paths[$x].' />
                            </div>
                            <div class="collection-info">
                                    <h2 class="collection-title">'.$titles[$x].'</h2>
                                            <a href="exhibitSingle.php?id='.$id_table[$x].'" class="collection-link">View Project</a>
                            </div>
                        </div>
                    ';
                }
            ?>
		</div>

<!--===============================
Explorations Grid
================================-->
		<div class="collectionTitle"><h4 class="secondTitle">Start an Exploration</h4></div>
		<div id='collections-layout' class='collections-grid'>
            <?php
                // replace this loop with actual exhibit tiles following the same HTML formatting
                // formatting for tiles found in main.css

                for ($x = 0; $x < $countExpl; $x++) {
                    echo '
                        <div class="collection-container">
                            <div class="collection-image">
                                    <img src='.$source.$pathsExpl[$x].' />
                            </div>
                            <div class="collection-info">
                                    <h2 class="collection-title">'.$titlesExpl[$x].'</h2>
                                            <a href="explorationSingle.php?id='.$id_tableExpl[$x].'" class="collection-link">View Project</a>
                            </div>
                        </div>
                    ';
                }
            ?>
		</div>
	</section>
</main>

<!--===============================
Scroll-To-Top Arrow
================================
<div id='scroll-to-top'>
	<img src='assets/svgs/NextArrow.svg' />
</div>-->
<!--===============================
Modals Include
================================-->
<?php
	include('includes/modals.php');
?>
<!--===============================
Scripts & Footer
================================-->
<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
