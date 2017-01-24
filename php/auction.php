<?php
	//start a php session
	session_start();
	if(!isset($_SESSION['email']))
		{
			header("Location: login.php");
			exit;
		}
	//connect to db	
	include('local-connect.php');
	//set timezone
	date_default_timezone_set('MST');
?>
<!DOCTYPE html>
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
		<link type="text/css" rel="stylesheet" href="stylesheet/style.css" /> 
		
		<!-- javascript tags -->
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - Auction</title>
	</head>
	
	<body>
		<?php include('../php/header.php'); ?>
			
		<div id="aucform">
			<?php				
				$auctionsQuery = mysqli_query($dbc, "Select * From auctions where '".date("c")."' >= startDate and '".date("c")."' <= endDate;") 
						  or die('DB write error: '. mysqli_error($dbc));
				
				$numberAuctionsQuery = mysqli_query($dbc, "Select Count(auctionID) AS number From auctions where '".date("c")."' >= startDate and '".date("c")."' <= endDate;") 
						  or die('DB write error: '. mysqli_error($dbc));
				
				$row = mysqli_fetch_array($numberAuctionsQuery);
				$numberOfAuctions = $row['number'];
				
				
				echo '<div id="auctions"><ul>';				
				
				for($i = 1; $i < $numberOfAuctions+1; $i++)
				{
					$row = mysqli_fetch_array($auctionsQuery);
					$item = $row['item'];
					$auctionID = $row['auctionID'];
					$endDate = $row['endDate'];
					$image = $row['image'];
					
					$maxBid = mysqli_query($dbc, "Select MAX(amount) AS high From bid where auctionID='".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
					$row = mysqli_fetch_array($maxBid);
					$highbid = $row['high'];
					$startingPriceQ = mysqli_query($dbc, "Select startingPrice From auctions where auctionID='".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
					$row = mysqli_fetch_array($startingPriceQ);
					$startingPrice = $row['startingPrice'];
					//$row = mysqli_fetch_array($auctionsQuery);
					//$endDate = $row['endDate'];
					//echo '<img src="images/'.$image.'" alt="'.$image.'" height="250" width="250" />';
					
					echo 
						'<li>
							<a href="php/auctionPage.php?auction='.$auctionID.'">
								<p style="text-decoration: underline">'.$item.'</p>
								<img src="images/'.$image.'" alt="'.$image.'" height="100%" width="100%" />
								<p>Auction Ends: '.$endDate.'</p>';
								if($highbid == "")
								{
									echo '<p>Starting Price: $'.$startingPrice.'</p>';
								}
								else
								{
									echo '<p>Current Bid: $'.$highbid.'</p>';
								}
							echo '</a>
						</li>';
				}
				
				echo '</ul></div>';			
			?>
		</div>
	</body>
</html>