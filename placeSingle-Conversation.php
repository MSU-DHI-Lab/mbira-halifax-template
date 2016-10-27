<?php
    require "lib/site.php";

    ob_start();

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exhibit = $exhibits->get($id);
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
    $pagename = "";
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

<?php if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$convo = $_GET['convo'];
		$type = $_GET['type'];
        $sql ="SELECT id, user_id, location_id, replyTo, isPending, UNIX_TIMESTAMP(created_at), deleted, comment FROM mbira_location_comments WHERE location_id=:location AND (id=:id OR replyTo=:reply)";
        $pdo = new PDO("mysql:dbname=$dbname;host=$dbhost;charset=utf8", $dbuser, $dbpass);
        $statement = $pdo->prepare($sql);
        $statement->execute(array('location' => $id, 'id' => $convo, 'reply' => $convo));
        if($statement->rowCount() === 0) {
            // return null;
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
		$comments[0]['replies'] = array_reverse($comments[0]['replies']);
	}else {
		header('Location: ./index.php'); 		///< go to homepage if the id is unknown
	}
?>

<div class="selectedConversationCard">
<div class="conversationCard selectedConversation">
	<div class="userDate">
		<p class="userName"><?php echo $comments[0]['user']; ?></p>
		<div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
		<div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
		<div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
		<p class="date"><?php echo date("m.d.y", $comments[0]['date']); ?></p></div>
	<div class="conversationPreview">
	<p><?php echo $comments[0]['comment'];?></p></div>
</div></div>

<section id='conversations'>
    <?php for ($i=0; $i < count($comments[0]['replies']); $i++) {  ?>
    <?php if ($comments[0]['replies'][$i]['pending'] != 'yes') {
        ?>
        <div class="conversationCard">
            <div class="userDate">
                <p class="userName"><?php echo $comments[0]['replies'][$i]['user'] ?></p>
                <div class="tooltip"><span class="tooltiptext">Citizen Expert</span><img src="assets/svgs/citizenExpert.svg" /></div>
                <div class="tooltip"><span class="tooltiptext">Project Expert</span><img src="assets/svgs/projectExpert.svg"/></div>
                <div class="tooltip"><span class="tooltiptext">Project Person</span><img src="assets/svgs/projectPerson.svg"/></div>
                <p class="date"><?php echo date("m.d.y", $comments[0]['replies'][$i]['date']) ?></p>
            </div>

            <div class="conversationPreview">
                <p><?php echo $comments[0]['replies'][$i]['comment']; ?></p>
            </div>
        </div>
    <?php }
    } ?>
</section>

<a href="#" class="bottomButton openModalParticipateInConversation">Participate in Conversation</a>

<!--===============================
Modals Include
================================-->
<?php
    $pgType = 'plc';
    if(isset($_SESSION['user'])){
	   include('includes/modalParticipateInConversation.php');
    }
	include('includes/modalLogInPrompt.php');
?>

<?php if(!isset($_SESSION['user'])){ ?>
<script>
$('.openModalParticipateInConversation').click(function() {
	$('#modalLogInPrompt').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
$('.closeModalLogInPrompt').click(function() {
	$('#modalLogInPrompt').removeClass('displayModal');
	$('body').removeClass('modal-open');
});
</script>
<?php } ?>


<?php if(isset($_SESSION['user'])){ ?>
<script>
$('.openModalParticipateInConversation').click(function() {
	$('.modalParticipateInConversation').addClass('displayModal');
	$('body').addClass('modal-open');
	return false;
});
$('.closeModalParticipateInConversation').click(function() {
	$('.modalParticipateInConversation').removeClass('displayModal');
	$('body').removeClass('modal-open');
});
</script>
<?php } ?>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
	<script src='js/map.js'></script>
<?php
	include('includes/footer.php');
?>
<div class="footerSpacer"></div>
