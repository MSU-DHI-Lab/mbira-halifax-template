<?php

    require "lib/site.php";
	
    ob_start();		 

    $exhibit;
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		if($id == 0) {
			$id = 1;
		}
		$exhibit = $exhibits->get($id);
        $location = $locations->get($id);
        $area = $areas->get($id);
        $loc_ids = $exhibits->getLocationID($id);
        $area_ids = $exhibits->getAreaID($id);
        
        if($exhibit == null){
            echo "null";
        }
	}else {
		header('Location: /exhibitSingle-Map.php');
	}
?>

<?php
    $pagename = $exhibit->getName();
	include('includes/head.php');
	include('includes/header.php');
?>

<!--
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.2/leaflet.css" />
<link rel="stylesheet" href="js/MarkerCluster.css" />
<link rel="stylesheet" href="js/MarkerCluster.Default.css" />
-->

<!--===============================
Place NavBar
================================-->
<div class="placeNavBar">
	<a class="back" href="exhibitSingle.php?id=<?php echo $_GET['id']?>"><img class="backArrow" src="assets/svgs/arrow.svg"/>
        <p class="backExhibitTitle">
            <?php echo $exhibit->getName() ?>
        </p>
    </a>
</div>

<!--===============================
Map
================================-->
<div class='custom-popup' id="mapid"></div>
<!--
<div class='custom-popup' id="mapid" style="background:linear-gradient( rgba(10,38,61,.8), rgba(10,38,61,.8) ), url('<?php /*echo $loc->getThumbPath()*/?>')"></div>
-->

<div class='findMyLocation'></div>

<!--<script src="js/leaflet/leaflet.js"></script>
<script src="js/leaflet.markercluster-src.js"></script>-->


	<link rel="stylesheet" href="js/leaflet/leaflet.css" />
	<script src="js/leaflet/leaflet.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="js/leaflet/MarkerCluster.css" />
	<link rel="stylesheet" href="js/leaflet/MarkerCluster.Default.css" />
	<script src="js/leaflet/leaflet.markercluster-src.js"></script>

<script>
	var mymap = L.map('mapid').setView([37.7895, -99.3325], 4);

    var pointsArry = Array();
    $('.findMyLocation').on('click', function(){
      mymap.locate({setView: true, maxZoom: 15});
    });

    
    L.tileLayer('https://api.mapbox.com/styles/v1/austintruchan/cinjdipo0001rb9nkjjhlaquk/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ', {
		attribution: 'Map data &copy; <a href=\"http://openstreetmap.org\">OpenStreetMap</a> contributors, <a href=\"http://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, Imagery © <a href=\"http://mapbox.com\">Mapbox</a>',
		maxZoom: 18,
		id: 'austintruchan.cinjdipo0001rb9nkjjhlaquk',
		accessToken: 'pk.eyJ1IjoiYXVzdGludHJ1Y2hhbiIsImEiOiI2WHhzNWFFIn0.yOkdF1byJMqUuHrn7rJhSQ'
	}).addTo(mymap);

	var iconCircle = L.icon({
		iconUrl: 'js/leaflet/images/marker-icon.svg',

			iconSize:     [16, 16], // size of the icon
			iconAnchor:   [8, 8], // point of the icon which will correspond to marker's location
		popupAnchor:  [0, -15] // point from which the popup should open relative to the iconAnchor
	});
		
	var markerClusters = L.markerClusterGroup();
	
	var points = [
		{"type": "FeatureCollection", "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } }, "features": [] }
	];
		
</script>

<?php for ($x = 0; $x < count($loc_ids); $x++) { ?>
	<?php $loc = $locations->get($loc_ids[$x]); ?>
	
	<script>
	points[0]['features'].push(
		{"type": "Feature", 
		  "id": <?php echo $loc_ids[$x];?>, 
		  "properties": {"ID": <?php echo $loc_ids[$x];?>}, 
		  "geometry":{"type": "Point", "coordinates": [<?php echo $loc->getLatitude();?>, <?php echo $loc->getLongitude();?>]}
		});

	m = L.marker([<?php echo $loc->getLatitude() ;?>, <?php echo $loc->getLongitude();?>], {icon: iconCircle}).addTo(mymap)
			.bindPopup("<h2><?php echo $loc->getName();?></h2><br /><p><?php echo $loc->getDes(); ?></p><br /><a href='placeSingle.php?id=<?php echo $loc->getID();?>'>VIEW LOCATION</a>");
	markerClusters.addLayer(m);
    pointsArry.push(m);
    
        
	</script>
<?php } ?>

<script>
    
    mymap.addLayer(markerClusters);
    
    <?php if($area != null) { ?>
        var coords = <?php echo $area->getCoordinates(); ?>;

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
            }).addTo(mymap).bindPopup("<h2><?php echo $area->getName()?></h2><br /><p><?php echo $area->getDes();?></p><br /><a href='placeSingle.php?id=<?php echo $area->getID();?>'>VIEW AREA</a>");

        pointsArry.push(L.marker([area.getBounds().getCenter().lat, area.getBounds().getCenter().lng], {icon: iconCircle}));
        var group = new L.featureGroup(pointsArry);
    <?php } ?>
    
    
    mymap.addLayer(markerClusters);
    mymap.fitBounds(group.getBounds());
</script>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
