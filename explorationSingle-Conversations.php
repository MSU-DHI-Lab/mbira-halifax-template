<?php

    require "lib/site.php";
	
    ob_start();		 

    $exploration;
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exploration = $explorations->get($id);
        $stops = $exploration->getStops();
	}
?>

<?php
    
    $pagename = $exploration->getName();
	include('includes/head.php');
	include('includes/header.php');
?>
<!--===============================
Landing Image
================================-->
<div id='landing' class="placeSub" style="background: url('<?php 
    echo $source.$exploration->getHeaderPath();
    
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
	Place NavBar
	================================-->
	<div class="placeNavBar">
		<a class="back" href="explorationSingle.php?id=<?php echo $_GET['id'];?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backTitle"><?php echo $exploration->getName();?>
		<div class="right">
			<a href="explorationSingle-Map.php?id=<?php echo $_GET['id'];?>">Map</a>
			<a class="active"  href="explorationSingle-Conversations.php?id=<?php echo $_GET['id'];?>">Conversations</a></div>
	</div>



<!--===============================
Conversations
================================-->

<!--<div class="placeSingleSubTitle"><h4>Conversations</h4></div>
<section id='conversations'>
	<div class="conversationCard">
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
			<a href="explorationSingle-Conversation.php">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
	   </div>
    </div>-->
    

    
<!--Print all convos-->
  
        
<?php
        

		$id = $_GET['id'];
        $titleName = $exploration->getName();
        $type_php = 'explorationSingle.php';
        	$sql =<<<SQL
SELECT id, user_id, exploration_id, replyTo, isPending, UNIX_TIMESTAMP(created_at), deleted, comment from mbira_exploration_comments
where exploration_id=?
SQL;
		
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
	    
?>



<div class="placeSingleSubTitle"><h4>Conversations</h4></div>
<section id='conversations'>

    <?php for ($i=0; $i < count($comments); $i++) { 
        if ($comments[$i]['pending'] != 'yes') {
        ?>
    
        <div class="conversationCard">
            <div class="userDate">
                <p class="userName"><?php echo $comments[$i]['user'] ?></p>
                <div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
                <div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
                <div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
                <p class="date"><?php echo date("m.d.y", $comments[$i]['date']);?></p>
            </div>

            <div class="conversationPreview">
                <p>
                    <?php echo $comments[$i]['comment'];?>
                </p>
            </div>

            <div class="viewConversation">
                <p><?php echo count($comments[$i]['replies'])?> Particpants</p>
                <a href="explorationSingle-Conversation.php?id=<?php echo $_GET['id']?>&convo=<?php echo $comments[$i]['comment_id']; ?>">VIEW CONVERSATION <img src="assets/svgs/arrowBlue.svg"/></a>
            </div>
        </div>
    
    <?php
        } 
    }
    ?> 
    
    <?php
        if(count($comments) == 0) {
            echo "No Comments Yet.";
        }
    ?>
    
    
    
<!--- End print all convos -->    
    
        
        </section>
        
        



<a href="" class="bottomButton openModalStartConversation">Start Conversation</a>

<!--===============================
Modals Include
================================-->
<?php
    $pgType = 'exp';
    if(isset($_SESSION['user'])){
        include('includes/modalStartConversation.php');
    }
    else{
        include('includes/modalLogInPrompt.php');   
    }
?>

<?php if(!isset($_SESSION['user'])){?>
<script> 
$('.openModalStartConversation').click(function() {
	$('#modalLogInExpPrompt').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
$('.closeModalLogInPrompt').click(function() {
	$('#modalLogInExpPrompt').removeClass('displayModal');
	$('body').removeClass('modal-open');
});
</script>
<?php } ?>


<?php if(isset($_SESSION['user'])){ ?>
<script>
$('.openModalStartConversation').click(function() {
	$('#modalStartExpConversation').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
$('.closeModalStartConversation').click(function() {
	$('#modalStartExpConversation').removeClass('displayModal');
	$('body').removeClass('modal-open');
});
</script>
<?php } ?>
        
<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
