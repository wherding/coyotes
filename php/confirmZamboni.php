<!DOCTYPE html>

<?php

	session_start();
	
	// connect to db
	include('server-connect.php');
	
	//include extended PHP code
	include ('confirmZamboniPHP.php');
?>

<html lang="en">
	<head>
	
		<!-- Determine Base tag -->
		<?php 
			if(substr($_SERVER['HTTP_HOST'],0,9) == 'localhost')
				echo '<base href="http://localhost/Coyotes/">';
			else
				echo '<base href="http://cis440-team4.wpcarey.asu.edu/">';
		?>
		
		<!-- meta tags -->
		<meta charset="utf-8" />
		<meta name="robots" content="noindex,nofollow" />
	 
		<!-- favicon link -->
		<link type="image/gif" rel="icon" href="images/coyote.png" />
		
		<!-- stylesheet link(s) -->
		<link type="text/css" rel="stylesheet" href="stylesheet/style.css" /> 
		
		<!-- javascript tags -->
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - Zamboni Confirm</title>
	</head>
	
	<body>
		<?php include('../php/header.php'); ?>
			
		<div id="confirm">
			<p>
				Zamboni Ride Reserved!
			</p>
		</div>
	</body>
</html>