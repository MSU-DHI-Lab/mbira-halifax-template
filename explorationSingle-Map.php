<?php

    require "lib/site.php";
	
    ob_start();		 

    $exploration;
	$stops;
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exploration = $explorations->get($id);
        $stops = $exploration->getStops();
	}else {
		header('Location: /explorationSingle-Map.php');
	}
?>

<?php
    
    $pagename = $exploration->getName();
	include('includes/head.php');
	include('includes/header.php');
?>

<div class='findMyLocation' style="bottom: 71px;"></div>

<link rel="stylesheet" href="js/leaflet/leaflet.css" />

<!--===============================
Place NavBar
================================-->
<div class="placeNavBar">
	<a class="back" href="explorationSingle.php?id=<?php echo $_GET['id'];?>"><img class="backArrow" src="assets/svgs/arrow.svg"/><p class="backExhibitTitle"><?php echo $exploration->getName(); ?></p></a>
	<div class="right">
		<a class="active" href="explorationSingle-Map.php?id=<?php echo $_GET['id'];?>">Map</a>
		<a href="explorationSingle-Conversations.php?id=<?php echo $_GET['id'];?>">Conversations</a></div>
</div>

<!--===============================
Map
================================-->
<div class='custom-popup' id="mapid"></div>

 <script src="js/leaflet/leaflet.js"></script>

<script>
var mymap = L.map('mapid').setView([44.6488, -63.5752], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/austintruchan/cinjdipo0001rb9nkjjhlaquk/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ', {
    attribution: 'Map data &copy; <a href=\"http://openstreetmap.org\">OpenStreetMap</a> contributors, <a href=\"http://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, Imagery © <a href=\"http://mapbox.com\">Mapbox</a>',
    maxZoom: 18,
    id: 'austintruchan.cinjdipo0001rb9nkjjhlaquk',
    accessToken: 'pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ'
}).addTo(mymap);

/* var iconCircle = L.icon({
    iconUrl: 'js/leaflet/images/marker-icon.svg',
		iconSize:     [16, 16], // size of the icon
		iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
}); */

/*
L.marker([44.6488, -63.5752], {icon: iconCircle}).addTo(mymap)
.bindPopup("<h2>Location Name Goes Here. Looks Pretty Cool!</h2><br /><p>Place description Decipherment dream of the mind's eye brain is the seed of intelligence. Science courage of our questions decipherment? Sea of Tranquility another world bits of moving fluff vastness is bearable only through love the only home we've ever known light years?Place description Decipherment dream of the mind's eye brain is the seed of intelligence. Science courage of our questions decipherment? Sea of Tranquility another world bits of moving fluff vastness is bearable only through love the only home we've ever known light years?</p><br /><a href='placeSingle.php'>VIEW LOCATION</a>");
*/
         
     

     function getAreaCenter(coords) {
         console.log(coords);
        var coordsArray = coords.split(','),
            center = [];

            // For rect and poly areas we need to loop through the coordinates
            var coord,
                minX = maxX = parseInt(coordsArray[0], 10),
                minY = maxY = parseInt(coordsArray[1], 10);
            for (var i = 0, l = coordsArray.length; i < l; i++) {
                coord = parseInt(coordsArray[i], 10);
                if (i%2 == 0) { // Even values are X coordinates
                    if (coord < minX) {
                        minX = coord;
                    } else if (coord > maxX) {
                        maxX = coord;
                    }
                } else { // Odd values are Y coordinates
                    if (coord < minY) {
                        minY = coord;
                    } else if (coord > maxY) {
                        maxY = coord;
                    }
                }
            }
            center = [parseInt((minX + maxX) / 2, 10), parseInt((minY + maxY) / 2, 10)];
        
        return(center);
    }
     
     
     
     
     
    
    var pointsArry = Array();
    var latlng = Array();
     
    <?php             
        for ($x = 0; $x < count($stops); $x++) {
			/* 
            $stops[$x] = str_replace("A", "", $stops[$x]); 
			*/
			
            // locations
			if($locations->get($stops[$x]) != null){
				$stop = $locations->get($stops[$x]);
    ?>
     
				var iconCircle = L.icon({
					iconUrl: 'assets/imgs/markers/<?php echo ($x+1)?>.svg',
						/*iconSize:     [16, 16],*/ // size of the icon
                        iconSize:     [25, 25],
						iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
					popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
				});
	 
	 
                m = L.marker([<?php echo $stop->getLatitude() ;?>, <?php echo $stop->getLongitude();?>], {icon: iconCircle}).addTo(mymap)
                        .bindPopup("<h2><?php echo $stop->getName();?></h2><br /><p><?php echo $stop->getDes(); ?></p><br /><a href='placeSingle.php?id=<?php echo $stop->getID();?>&type=L&s=<?php echo ($x+1)?>&t=<?php echo count($stops)?>&expid=<?php echo $_GET['id'] ?>'>Start Exploration (Stop <?php echo ($x+1) ;?> of <?php echo ' '.count($stops)?>)</a>");
               /* m.bindLabel("My Label");*/
    
                m.openPopup();
                m.closePopup();    

                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.background = "linear-gradient(               rgba(10,38,61,.8), rgba(10,38,61,.8)), url('<?php echo $source.$stop->getHeaderPath()?>')";

                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundSize = "cover";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundRepeat = "no-repeat";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundPosition = "center center";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.position = "relative";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.overflow = "hidden";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.color = "#fff";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontFamily = "'montserratlight' !important";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontSize = "16px";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.lineHeight = "24px";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.borderRadius = "0px !important";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.boxShadow = "0 11px14px rgba(0, 0, 0, 0.2) !important;";
    
    
    
                pointsArry.push(m);
                latlng.push([<?php echo $stop->getLatitude() ;?>, <?php echo $stop->getLongitude();?>]);
                /*m.addTo(mymap);*/
     <?php } ?>
     
     <?php            
            // areas
            /* if($areas->get($stops[$x]) != null){ */
			
			if($areas->get(str_replace("A", "", $stops[$x])) != null){
                $stop = $areas->get(str_replace("A", "", $stops[$x])); 
    ?>
	
	
				var iconCircle = L.icon({
					iconUrl: 'assets/imgs/markers/<?php echo ($x+1)?>.svg',
						/*iconSize:     [16, 16],*/ // size of the icon
                        iconSize:     [25, 25], // size of the icon
						iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
					popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
				});
	
                var coords = <?php echo $stop->getCoordinates(); ?>;
                
                var area  = L.polygon(coords, {
                color: '#3EB9FD',
                fillColor: '#3EB9FD',
                fillOpacity: 0.6
              }).addTo(mymap).bindPopup("<h2><?php echo $stop->getName()?></h2><br /><p><?php echo $stop->getDes();?></p><br /><a href='placeSingle.php?id=<?php echo $stop->getID();?>&type=A&s=<?php echo ($x+1)?>&t=<?php echo count($stops)?>&expid=<?php echo $_GET['id'] ?>'>Start Exploration (Stop <?php echo ($x+1) ;?> of <?php echo ' '.count($stops)?>)</a>");
     
	   m = L.marker([area.getBounds().getCenter().lat, area.getBounds().getCenter().lng], {icon: iconCircle}).addTo(mymap)
                        .bindPopup("<h2><?php echo $stop->getName();?></h2><br /><p><?php echo $stop->getDes(); ?></p><br /><a href='placeSingle.php?id=<?php echo $stop->getID();?>&type=A&s=<?php echo ($x+1)?>&t=<?php echo count($stops)?>&expid=<?php echo $_GET['id'] ?>'>Start Exploration (Stop <?php echo ($x+1) ;?> of <?php echo ' '.count($stops)?>)</a>");
             
    
                m.openPopup();
                m.closePopup();    

                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.background = "linear-gradient(               rgba(10,38,61,.8), rgba(10,38,61,.8)), url('<?php echo $source.$stop->getHeaderPath()?>')";

                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundSize = "cover";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundRepeat = "no-repeat";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundPosition = "center center";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.position = "relative";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.overflow = "hidden";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.color = "#fff";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontFamily = "'montserratlight' !important";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontSize = "16px";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.lineHeight = "24px";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.borderRadius = "0px !important";
                m.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.boxShadow = "0 11px14px rgba(0, 0, 0, 0.2) !important;";
    
    
                area.openPopup();
                area.closePopup();

                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.background = "linear-gradient(               rgba(10,38,61,.8), rgba(10,38,61,.8)), url('<?php echo $source.$stop->getHeaderPath()?>')";
                
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundSize = "cover";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundRepeat = "no-repeat";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.backgroundPosition = "center center";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.position = "relative";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.overflow = "hidden";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.color = "#fff";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontFamily = "'montserratlight' !important";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.fontSize = "16px";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.lineHeight = "24px";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.borderRadius = "0px !important";
                area.getPopup().getElement().querySelector('.leaflet-popup-content-wrapper').style.boxShadow = "0 11px14px rgba(0, 0, 0, 0.2) !important;"
    
            
            latlng.push([area.getBounds().getCenter().lat, area.getBounds().getCenter().lng]);
         <?php } ?>     
    <?php } ?>
     
    var polyline = L.polyline(latlng, {color: 'white', weight: 2}).addTo(mymap);
    var group = new L.featureGroup(pointsArry);
    mymap.fitBounds(group.getBounds());
     
</script>

<a href="placeSingle.php?id=<?php
         if($areas->get(str_replace("A", "", $stops[0])) != null){
                echo $areas->get(str_replace("A", "", $stops[0]))->getID().'&type=A';
         }
         
         else if($locations->get($stops[0]) != null){
                echo $locations->get($stops[0])->getID().'&type=L';
         }
                  

            echo '&s=1'.'&t='.count($stops).'&expid='.$_GET['id'];
   
        ?>" class="bottomButton">Start EXPLORATION</a>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
