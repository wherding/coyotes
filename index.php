<!DOCTYPE html>

<?php
	//start a php session
	
	session_start();
	
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
	 
		<!-- favicon link -->
		<link type="image/gif" rel="icon" href="images/coyote.png" />
		
		<!-- stylesheet link(s) -->
		<link type="text/css" rel="stylesheet" href="stylesheet/homestyle.css" /> 
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - Home</title>
	</head>
	
	<body>
		<?php include('php/header.php'); ?>
			
		<div id="buttons">
			<a href="php/donation.php" class="donateButton">Donate</a>
			<a href="php/auction.php" class="auctionButton">Auctions</a>
		</div>
	</body>
</html>