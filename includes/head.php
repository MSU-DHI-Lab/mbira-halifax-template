<!DOCTYPE html>
<html lang="en">
<head>
	<!--http://stackoverflow.com/questions/6771258/whats-the-difference-if-meta-http-equiv-x-ua-compatible-content-ie-edge-e-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0">
	<title><?php echo $pagename; ?> | <?php echo $projects->get(PROJID)->getName(); ?></title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navMenu.css">

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src='js/js.cookie.js'></script>
	<script src="js/modernizr.js"></script>
	<script src="js/navMenu.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
