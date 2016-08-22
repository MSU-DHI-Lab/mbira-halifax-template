<header>
    <?php require "lib/site.php"; ?>
	<a href="index.php" class="projectTitle">
        <?php 
            echo $projects->get(PROJID)->getName();
/*            $project = $projects->get(PROJID);  	///< Load the project
            $pagename = $project->getName();        		///< Get project name*/
        ?>
    </a>
    
	<nav class="cd-stretchy-nav-search">
	<a class="cd-nav-trigger-search" href="#0">
		Menu
		<span aria-hidden="true"></span>
	</a>

	<ul>
		<li><span>
		<form action="searchResults.php">
				<input id="header_search" type="search" placeholder="Search">
			</form></span></li>
	</ul>

	<span aria-hidden="true" class="stretchy-nav-bg"></span>
	</nav>

	<nav class="cd-stretchy-nav-share">
	<a class="cd-nav-trigger-share" href="#0">
		Menu
		<span aria-hidden="true"></span>
	</a>

	<ul>
		<li><a href="#0" class="active"><span>Message</span></a></li>
		<li><a href="#0"><span>Mail</span></a></li>
		<li><a href="#0"><span>Copy Link</span></a></li>
		<li><a href="#0"><span>Facebook</span></a></li>
		<li><a href="#0"><span>Twitter</span></a></li>
		<li><a href="#0"><span>Google+</span></a></li>
	</ul>

	<span aria-hidden="true" class="stretchy-nav-bg"></span>
</nav>

	<nav class="cd-stretchy-nav">
	<a class="cd-nav-trigger" href="#0">
		Menu
		<span aria-hidden="true"></span>
	</a>
        
	<ul>
		<li><a href="index.php" class="active"><span>Home</span></a></li>
		<li><a href="about.php"><span>About</span></a></li>
		<li><a href="exhibitsAll.php"><span>Exhibits</span></a></li>
		<li><a href="locationsAll.php"><span>Locations</span></a></li>
		<li><a href="areasAll.php"><span>Areas</span></a></li>
		<li><a href="explorationsAll.php"><span>Explorations</span></a></li>
		<li><a href="placeSingle.php?id=<?php
            
				if(rand(0,1000)%2 == 1){
                    echo $locations->get_random();
				}
				else {
					echo $areas->get_random();
				}

                ?>
            
            "><span>Surprise Me</span></a></li>
		<li><a href="signIn.php"><span>Sign In / Sign Up</span></a></li>
	</ul>

	<span aria-hidden="true" class="stretchy-nav-bg"></span>
</nav>



</header>
