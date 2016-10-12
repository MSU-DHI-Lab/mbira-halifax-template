<?php
  require "lib/site.php";
	include('includes/head.php');
	include('includes/header.php');
  unset($_SESSION['search-error']);

  $response = $search->newSearch(
      strip_tags($_POST['query'])
    );

  if(isset($response["errors"])) {
      $_SESSION['search-error'] = $response;
      header("location: index.php");
  }

?>

<!--===============================
Landing Image
================================-->
	<div id='landing'>
		<div id='landing-overlay-blend' class="main"></div>
	</div>

<!--===============================
Search Results Based of Query
================================-->
<section id='main'>
	<h2 class="searchResults">
    <?php
        $total_string = "";
        $count_array = [
        "Location" => count($response['locations']),
        "Area" => count($response['areas']),
        "Exhibit" => count($response['exhibits']),
        "Exploration" => count($response['explorations']
        )];
        arsort($count_array);

        foreach($count_array as $place=>$place_value) {
          if ($place_value > 1) {
            $total_string .= $place_value." ".$place."s, ";
          } elseif ($place_value == 1) {
            $total_string .= $place_value." ".$place.", ";
          }
        }

        $pieces = explode(", ", $total_string);
        array_pop($pieces);

        if (count($pieces) > 1) {
          if (count($pieces) == 2) {
            $total_string = "We found ".$pieces[0]." and ".$pieces[1]." related to the term “".$_POST['query']."”.";
          } else {
            $total_string_temp = "";
            for ($i=0; $i < count($pieces) - 1; $i++) {
              $total_string_temp .= $pieces[$i] . ", ";
            }
            $total_string = "We found ".$total_string_temp."and ".end($pieces)." related to the term “".$_POST['query']."”.";
          }
        } elseif (count($pieces) == 1) {
          $total_string = "We found ".$pieces[0]." related to the term “".$_POST['query']."”.";
        } else {
          $total_string = "We found nothing related to the term “".$_POST['query']."”.";
        }

        echo $total_string;
        // echo "We found ".count($response['exhibits'])." Exhibits, ".count($response['locations'])." Locations, ".count($response['areas'])." Areas, and ".count($response['explorations'])." Explorations related to the term “".$_POST['query']."”." ?></h2>
</section>

<!--===============================
Areas Grid
================================-->
<section id='collections' class="main">
<?php if (count($response['exhibits']) > 0) { ?>
	<div class="collectionTitle"><h4>Exhibits</h4></div>
	<div id='collections-layout' class='collections-grid'>

    <?php for ($x = 0; $x < count($response['exhibits']); $x++) {
      echo "
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='".$source.$response['exhibits'][$x]['thumb_path']."' alt=''/>
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>".$response['exhibits'][$x]['name']."</h2>
								<a href='exhibitSingle.php?id=".$response['exhibits'][$x]['id']."' class='collection-link'>View Exhibit</a>
				</div>
			</div>
        ";
      }

    ?>

	</div>
<?php } ?>
<?php if (count($response['locations']) > 0) { ?>
	<div class="collectionTitle"><h4 class="secondTitle">Locations</h4></div>
	<div id='collections-layout' class='collections-grid'>

    <?php for ($x = 0; $x < count($response['locations']); $x++) {
      echo "
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='".$source.$response['locations'][$x]['thumb_path']."' alt=''/>
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>".$response['locations'][$x]['name']."</h2>
								<a href='placeSingle.php?id=".$response['locations'][$x]['id']."&type=L' class='collection-link'>View Location</a>
				</div>
			</div>
        ";
      }

    ?>

	</div>
<?php } ?>
<?php if (count($response['areas']) > 0) { ?>
	<div class="collectionTitle"><h4 class="secondTitle">Areas</h4></div>
	<div id='collections-layout' class='collections-grid'>

    <?php for ($x = 0; $x < count($response['areas']); $x++) {
      echo "
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='".$source.$response['areas'][$x]['thumb_path']."' alt=''/>
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>".$response['areas'][$x]['name']."</h2>
								<a href='placeSingle.php?id=".$response['areas'][$x]['id']."&type=A' class='collection-link'>View Area</a>
				</div>
			</div>
        ";
      }

    ?>

	</div>
<?php } ?>
<?php if (count($response['explorations']) > 0) { ?>
	<div class="collectionTitle"><h4 class="secondTitle">Explorations</h4></div>
	<div id='collections-layout' class='collections-grid'>

    <?php for ($x = 0; $x < count($response['explorations']); $x++) {
      echo "
			<div class='collection-container'>
				<div class='collection-image'>
						<img src='".$source.$response['explorations'][$x]['thumb_path']."' alt=''/>
				</div>
				<div class='collection-info'>
						<h2 class='collection-title'>".$response['explorations'][$x]['name']."</h2>
								<a href='explorationSingle.php?id=".$response['explorations'][$x]['id']."' class='collection-link'>View Exploration</a>
				</div>
			</div>
        ";
      }

    ?>

	</div>
<?php } ?>

</section>

<!--===============================
Scripts & Footer
================================-->
	<script src='js/index.js'></script>
	<script src='js/modals.js'></script>
<?php
	include('includes/footer.php');
?>
