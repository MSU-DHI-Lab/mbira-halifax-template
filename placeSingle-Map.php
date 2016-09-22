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
		
        $area = $areas->get($id);
        $location_ids = $exhibits->getLocationID($id);
        $area_ids = $exhibits->getAreaID($id);
	}else {
		header('Location: /placeSingle-Map.php');
	}
	
	// "L" for location
    // "A" for area
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

<link rel="stylesheet" href="js/leaflet/leaflet.css" />



<?php
if(isset($_GET['s']) && isset($_GET['t']) && isset($_GET['expid'])) {
    $exploration = $explorations->get($_GET['expid']);
    $stops = $exploration->getStops();
    $stopsArry = array();

    for ($x = 0; $x < count($stops); $x++) {

        /*$stops[$x] = str_replace("A", "", $stops[$x]);*/

        if($locations->get($stops[$x]) != null){
            array_push($stopsArry,$stops[$x]);
        }

/*        if($areas->get($stops[$x]) != null){
            array_push($stopsArry, $stops[$x]);
        }*/
        
        if($areas->get(str_replace("A", "", $stops[$x])) != null){
            array_push($stopsArry, str_replace("A", "", $stops[$x]));
        }
    }
}
?>


<!--===============================
Place on Exploration Controls (Only active when user has selected "start Exploration")
================================-->
<!--<div class="onExploration map">
    <a class="previousStop" href="#PreviousStop"><img src="assets/svgs/arrow.svg"/></a>
    <a class="explorationTitle" href="#TakesUserToExploration">Exploration Title</a>
    <p class="stopNumberOfNumber">1 of 4</p>
    <a class="nextStop" href="#NextStop"><img src="assets/svgs/arrow.svg"/></a>
</div>-->

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

        if($locations->get($stops[$x]) != null){
            array_push($stopsArry,$stops[$x]);
        }

/*        if($areas->get($stops[$x]) != null){
            array_push($stopsArry, $stops[$x]);
        }*/
        
        if($areas->get(str_replace("A", "", $stops[$x])) != null){
            array_push($stopsArry, str_replace("A", "", $stops[$x]));
        }
    }
?>



<?php
    // ----- Building data structure to keep track of types of stops in an array  
    if(isset($_GET['expid'])){
        $types = array();
        for ($x = 0; $x < count($stops); $x++) {

            if($locations->get($stops[$x]) == null || $areas->get($stops[$x]) == null){ 
                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                    array_push($types, "L");
                }

/*                if($areas->get($stops[$x]) != null){
                    $stop = $areas->get($stops[$x]);
                    array_push($types, "A");
                }*/
                
                if($areas->get(str_replace("A", "", $stops[$x])) != null){
                    $stop = $areas->get(str_replace("A", "", $stops[$x]));
                    array_push($types, "A");
                }
            }
            
            if($locations->get($stops[$x]) != null && $areas->get($stops[$x]) != null){ 
                if($locations->get($stops[$x]) != null){
                    $stop = $locations->get($stops[$x]);
                    array_push($types, "L");
                }

                if($areas->get(str_replace("A", "", $stops[$x])) != null){
                    $stop = $areas->get(str_replace("A", "", $stops[$x]));
                    array_push($types, "A");
                }
                $x++;
            }             
        }
    }   
    // ----- end
?>


<div class="onExploration sub">
    <a class="previousStop" href="placeSingle-Map.php?id=<?php 
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
            }
        ?>&s=<?php
            if($step == "1"){
                echo $total;
            }
            else {
                echo ($step - 1);
            }?>&t=<?php echo $total; ?>&expid=<?php echo $expid; ?>
                              "><img src="assets/svgs/arrow.svg"/></a>
        
        
    <a class="explorationTitle" href="explorationSingle.php?id=<?php echo $expid; ?>"><?php echo $explorations->get($expid)->getName(); ?></a>
    <p class="stopNumberOfNumber"><?php echo $step; ?> of <?php echo $total; ?></p>
    <a class="nextStop" href="placeSingle-Map.php?id=<?php 
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
Map
================================-->
<div class='custom-popup' id="mapid"></div>
<div class='findMyLocation'></div>

 <script src="js/leaflet/leaflet.js"></script>
<?php if($placeType == "L") { ?>
	<script>
                
	var mymap = L.map('mapid').setView([<?php echo $location->getLatitude() ?>, <?php echo $location->getLongitude() ?>], 13);
	L.tileLayer('https://api.mapbox.com/styles/v1/austintruchan/cinjdipo0001rb9nkjjhlaquk/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ', {
		attribution: 'Map data &copy; <a href=\"http://openstreetmap.org\">OpenStreetMap</a> contributors, <a href=\"http://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, Imagery © <a href=\"http://mapbox.com\">Mapbox</a>',
		maxZoom: 18,
		id: 'austintruchan.cinjdipo0001rb9nkjjhlaquk',
		accessToken: 'pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ'
	}).addTo(mymap);

	var iconCircle = L.icon({
		iconUrl: 'js/leaflet/images/marker-icon.svg',

			iconSize:     [150, 150], // size of the icon
			iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
		popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
	});
     
    

        
    L.marker([<?php echo $location->getLatitude() ?>, <?php echo $location->getLongitude() ?>], {icon: iconCircle}).addTo(mymap)
	.bindPopup("<?php echo $location->getName()?></h2><br /><p><?php echo $location->getDes();?></p><br /><a href='placeSingle.php?id=<?php echo $location->getID();?>&type=L'>VIEW LOCATION</a>");
    
    </script>
<?php } ?>


<?php if($placeType == "A") { ?>
	<script>		
		var mymap = L.map('mapid').setView([<?php echo $area->getCenter()[0];?>, <?php echo $area->getCenter()[1];?>], 13);

		L.tileLayer('https://api.mapbox.com/styles/v1/austintruchan/cinjdipo0001rb9nkjjhlaquk/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ', {
			attribution: 'Map data &copy; <a href=\"http://openstreetmap.org\">OpenStreetMap</a> contributors, <a href=\"http://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, Imagery © <a href=\"http://mapbox.com\">Mapbox</a>',
			maxZoom: 18,
			id: 'austintruchan.cinjdipo0001rb9nkjjhlaquk',
			accessToken: 'pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ'
		}).addTo(mymap);

		var iconCircle = L.icon({
			iconUrl: 'js/leaflet/images/marker-icon.svg',

				iconSize:     [25, 25], // size of the icon
				iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
			popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
		});
			
        var pointsArry = Array();
		var coords = <?php echo $area->getCoordinates(); ?>;
		for(x=0; x<coords.length; x++)
		{	
			m = L.marker([coords[x]["lat"], coords[x]["lng"]]);
            pointsArry.push(m);
		}
        
          var area  = L.polygon(coords, {
    color: '#3EB9FD',
    fillColor: '#3EB9FD',
    fillOpacity: 0.6
  }).addTo(mymap).bindPopup("<h2><?php echo $area->getName()?></h2><br /><p><?php echo $area->getDes();?></p><br /><a href='placeSingle.php?id=<?php echo $area->getID();?>&type=A'>VIEW AREA</a>");


        var group = new L.featureGroup(pointsArry);
        mymap.fitBounds(group.getBounds());
        
	</script>
<?php } ?>


<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
