<?php
    require "lib/site.php";
	
    ob_start();		 

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		/*$exhibit = $exhibits->get($id);*/
        $location = $locations->get($id);
        $area = $areas->get($id);

	}else {
		header('Location: /placeSingle-Conversations.php');
	}
	
	$placeType = "";
    if($location != null && $_GET['type'] == "L"){
        $placeType = "L";
    }
    else if($area != null && $_GET['type'] == "A"){
         $placeType = "A";
    }
?>

<?php
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
<div id='landing' class="placeSub" style="background: url('<?php 
    if($placeType == "L") {
        echo $source.$location->getHeaderPath();
    }
    else if($placeType == "A") {
        echo $source.$area->getHeaderPath();
    }
    ?>') center center;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
    overflow: hidden;
    width: 100%;">
    <div id='landing-overlay-blend' class="placeSub"></div>
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


<?php
    // ----- Building data structure to keep track of types of stops in an array  
    if(isset($_GET['expid'])){
        $types = array();
        for ($x = 0; $x < count($stops); $x++) {

            $stops[$x] = str_replace("A", "", $stops[$x]);

            
            if($locations->get($stops[$x]) == null || $areas->get($stops[$x]) == null){ 
                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                    array_push($types, "L");
                }

                if($areas->get($stops[$x]) != null){
                    $stop = $areas->get($stops[$x]);
                    array_push($types, "A");
                }
            }
            
            if($locations->get($stops[$x]) != null && $areas->get($stops[$x]) != null){ 
                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                    array_push($types, "L");
                }

                if($areas->get($stops[$x]) != null){
                    $stop = $areas->get($stops[$x]);
                    array_push($types, "A");
                }
                $x++;
            }            
        }
    }   
    // ----- end
?>


<div class="onExploration sub">
    <a class="previousStop" href="placeSingle-Conversations.php?id=<?php 
            if($step == "1"){
                echo $stopsArry[$total-1];
            }
            else {
                echo $stopsArry[$step - 2];
            }
        ?>&type=<?php 
            if($step == "1"){
                echo $types[$total-1];
            }
            else {
                echo $types[$step - 2];
            }?>&s=<?php
            if($step == "1"){
                echo $total;
            }
            else {
                echo ($step - 1);
            }?>&t=<?php echo $total; ?>&expid=<?php echo $expid; ?>
                              "><img src="assets/svgs/arrow.svg"/></a>
        
        
    <a class="explorationTitle" href="explorationSingle.php?id=<?php echo $expid; ?>"><?php echo $explorations->get($expid)->getName(); ?></a>
    <p class="stopNumberOfNumber"><?php echo $step; ?> of <?php echo $total; ?></p>
    <a class="nextStop" href="placeSingle-Conversations.php?id=<?php 
            if($step == $total){
                echo $stopsArry[0] ;
            }
            else{
                echo $stopsArry[$step] ;
            }
                              ?>&type=<?php 
            if($step == $total){
                echo $types[0];
            }
            else {
                echo $types[$step];
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
Place NavBar
================================-->
<div class="placeNavBar">
	<?php if($placeType == "L") { ?>
        <a class="back" href="placeSingle.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle"><?php echo $location->getName();?></p></a>
	<?php } ?>
	
	<?php if($placeType == "A") { ?>
        <a class="back" href="placeSingle.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle"><?php echo $area->getName();?></p></a>
	<?php } ?>
	
	<div class="right">
	
        
        <a class="active" href="placeSingle-Map.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Map</a>
        
        
        
        <?php if ($placeType == "L") {
        foreach($locations->getMediaToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
                ?>
                <a href="placeSingle-Media.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Media</a>
                <?php
                            break;
                        }
            }
        } ?>
        <?php if ($placeType == "A") {
        foreach($areas->getMediaToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
                ?>
                <a href="placeSingle-Media.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Media</a>
                <?php
                    break;
                }
            }
        } ?>
        
        
        
        
        
        <?php if ($placeType == "L") {
        foreach($locations->getCommentsToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
            ?>
            <a href="placeSingle-Conversations.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Conversations</a>
            <?php
                        break;
                    }
            }
        } ?>
        <?php if ($placeType == "A") {
        foreach($areas->getCommentsToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
                ?>
                <a href="placeSingle-Conversations.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Conversations</a>
                <?php
                    break;
                }
            }
        } ?>
        
        
        
        
        
        <?php if ($placeType == "L") {
        foreach($locations->getDigDeeperToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
                ?>
                <a href="placeSingle-DigDeeper.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Dig Deeper</a>
                <?php
                            break;
                        }
                    }
        } ?>
        <?php if ($placeType == "A") {
        foreach($areas->getDigDeeperToggle($_GET['id'])[0] as $val)
        {
            if($val == "true"){        
            ?>
            <a href="placeSingle-DigDeeper.php?id=<?php echo $_GET['id'];?>&type=<?php echo $_GET['type']?><?php if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) { ?>&s=<?php echo $step;?>&t=<?php echo $total?>&expid=<?php echo $expid;?><?php } ?>">Dig Deeper</a>
            <?php
                        break;
                    }
                }
        } ?>
    
    
    
    </div>
</div>
<!--===============================
Conversations
================================-->

<?php
/*	$user;
	if(isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		$usersName = $user->getEmail();
        
        echo "user: ".$usersName;
	}*/

if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$type = $_GET['type'];
		$table;
		if ($type == 'L') {
			$titleName = $locations->get($id)->getName();
			$type_php = 'placeSingle.php';
        	$sql =<<<SQL
SELECT id, user_id, location_id, replyTo, isPending, UNIX_TIMESTAMP(created_at), deleted, comment from mbira_location_comments
where location_id=?
SQL;
		} else if ($type == 'A') {
			$titleName = $areas->get($id)->getName();
			$type_php = 'placeSingle.php';
        	$sql =<<<SQL
SELECT id, user_id, area_id, replyTo, isPending, UNIX_TIMESTAMP(created_at), deleted, comment from mbira_area_comments
where area_id=?
SQL;
		}
        $pdo = new PDO("mysql:dbname=$dbname;host=$dbhost;charset=utf8", $dbuser, $dbpass);
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
        }
		$comments = array();
        $sql2 =<<<SQL
SELECT firstName, lastName, email, id, username from mbira_users
SQL;
		$statement2 = $pdo->prepare($sql2);
        $statement2->execute();
		$userData = $statement2->fetchAll();
		function checkIfHasReply($i, $idToCheck, $data) {
			global $comments;
		    for ($j = 0; $j < count($data); $j++) {
		        if ($idToCheck == $data[$j]['replyTo']) {
		            $name = idToUser($data[$j]);
		            $tempObj = array(
		                "comment_id" => $data[$j]['id'],
		                "user" => $name,
		                "date" => $data[$j]['UNIX_TIMESTAMP(created_at)'],
		                "comment" => $data[$j]['comment'],
		                "replies" => array() ,
		                "pending" => $data[$j]['isPending'],
		                "deleted" => $data[$j]['deleted']
		            );
		            array_push($comments[$i]['replies'], $tempObj);
		        }
		    }
		}
		function idToUser($commentData) {
			global $userData;
		    for ($q = 0; $q < count($userData); $q++) {
		        if ($userData[$q]['id'] === $commentData['user_id']) {
		            return $userData[$q]['firstName'] . " " . $userData[$q]['lastName'];
		        }
		    }
		}
		function loadComments($data) {
			global $comments;
		    $comments = array();
		    usort($data, function ($x, $y) {
		        if ($x['replyTo'] - $y['replyTo'] === 0) {
		            return $y['UNIX_TIMESTAMP(created_at)'] - $x['UNIX_TIMESTAMP(created_at)'];
		        }
		        else {
		            return $y['replyTo'] - $x['replyTo'];
		        }
		    });
		    for ($i = 0; $i < count($data); $i++) {
		        if ($data[$i]['replyTo'] == 0 || $data[$i]['replyTo'] == null) {
		            $name = idToUser($data[$i]);
		            $tempObj = array(
		                "comment_id" => $data[$i]['id'],
		                "user" => $name,
		                "date" => $data[$i]['UNIX_TIMESTAMP(created_at)'],
		                "comment" => $data[$i]['comment'],
		                "replies" => array() ,
		                "pending" => $data[$i]['isPending'],
		                "deleted" => $data[$i]['deleted']
		            );
		            array_push($comments, $tempObj);
		        }
		    }
		    for ($i = 0; $i < count($comments); $i++) {
		        checkIfHasReply($i, $comments[$i]['comment_id'], $data);
		    }
		}
		$data = $statement->fetchAll();
		loadComments($data);
	}else {
		header('Location: ./index.php'); 		///< go to homepage if the id is unknown
	}
    
?>



<div class="placeSingleSubTitle"><h4>Conversations</h4></div>
<section id='conversations'>

    <?php for ($i=0; $i < count($comments); $i++) { 
        if ($comments[$i]['pending'] != 'yes') {
        ?>
    
        <div class="conversationCard">
            <div class="userDate">
                <p class="userName"><?php echo $user->getEmail(); ?></p>
                <div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
                <div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
                <div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
                <p class="date"><?php echo date("m.d.y", $comments[$i]['date']);?></p>
            </div>

            <div class="conversationPreview">
                <p>
                    <?php echo $comments[$i]['comment'] ?>
                </p>
            </div>

            <div class="viewConversation">
                <p>3 Particpants</p>
                <a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
            </div>
        </div>
    
    <?php
        } 
    }?> 
    
    <?php
        if(count($comments) == 0) {
            echo "No Comments Yet.";
        }
    ?>
    
    <!--	<div class="conversationCard">
		<div class="userDate">
			<p class="userName">User Name</p>
			<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
			<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
			<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
			<p class="date">7.15.16</p></div>
		<div class="conversationPreview">
		<p>From which we spring. Venture from which we spring Vangelis Orion's sword, prime number Tunguska event not a sunrise but a galaxyrise galaxies? Preserve and cherish that pale blue dot as a patch of light. Shores of the cosmic ocean, colonies? Globular star cluster venture cosmic fugue corpus callosum, great turbulent clouds, birth rich in heavy atoms white dwarf, extraplanetary made in the interiors of collapsing stars, star stuff harvesting star light, stirred by starlight?</p></div>
		<div class="viewConversation">
			<p>3 Particpants</p>
			<a href="placeSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	</div></div>-->
</section>

<a href="#" class="bottomButton openModalStartConversation">Start Conversation</a>

<!--===============================
Modals Include
================================-->
<?php
	include('includes/modalStartConversation.php');
	include('includes/modalLogInPrompt.php');
?>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
