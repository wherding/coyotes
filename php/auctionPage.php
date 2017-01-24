<?php	
	//start a php session
	session_start();
	// connect to db
	include('local-connect.php');
	//if user not already logged in, send them back to login page
	if(!isset($_SESSION['email']))
		{
			header('Location: login.php');
			exit;
		}
	$auctionID = $_GET['auction'];
	$_SESSION['auctionID'] = $auctionID;
	$endDateQ = mysqli_query($dbc, "Select * from auctions where auctionID = '".$auctionID."'")
		or die('DB write error: '. mysqli_error($dbc));
	$row = mysqli_fetch_array($endDateQ);
	$endDate = $row['endDate'];
	$startDate = $row['startDate'];
	$date = date('Y-m-d');
	if($date > $endDate)
	{
		header('Location: auction.php');
		exit;
	}
	if($date < $startDate)
	{
		header('Location: auction.php');
		exit;
	}
	
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
		<title>Arizona Coyotes Foundation - AuctionPage</title>
	</head>
	
	<body>
		<?php include('../php/header.php');?>			
			
		<div id="auctionform">
			<form action="php/confirmBid.php" method="post">
				<p style="text-decoration: underline">Auction - <?php 
						$itemQ = mysqli_query($dbc, "Select item from auctions where auctionID = '".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
						$row = mysqli_fetch_array($itemQ);
						$item = $row['item'];
						echo $item;
					?></p>
				
				<p>
					<?php 
						$imageQ = mysqli_query($dbc, "Select image from auctions where auctionID = '".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
						$row = mysqli_fetch_array($imageQ);
						$image = $row['image'];
						echo '<img src="images/'.$image.'" alt="'.$image.'" height="90%" width="90%" />';
					?>
				</p>
				
				<p>
					Item Description: <?php 
						$itemQ = mysqli_query($dbc, "Select itemDescription from auctions where auctionID = '".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
						$row = mysqli_fetch_array($itemQ);
						$itemDescription = $row['itemDescription'];
						echo $itemDescription;
					?>
				</p>
				
				<p>
					Highest Bid: $<?php					
						$maxBid = mysqli_query($dbc, "Select MAX(amount) AS high From bid where auctionID='".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
						$row = mysqli_fetch_array($maxBid);
						$highbid = $row['high'];
						$startingPriceQ = mysqli_query($dbc, "Select startingPrice From auctions where auctionID='".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
						$row = mysqli_fetch_array($startingPriceQ);
						$startingPrice = $row['startingPrice'];
						//close the db connection
						mysqli_close($dbc);
						if($highbid == "")
						{
							echo $startingPrice;
						}
						else
						{
							echo $highbid;
						}
					?>	
				</p>
				
				<p>
					
					
					<script>
						var deadline = '<?php echo $endDate?> MST';

						function getTimeRemaining(endtime){
						  var t = Date.parse(endtime) - Date.parse(new Date());
						  var seconds = Math.floor( (t/1000) % 60 );
						  var minutes = Math.floor( (t/1000/60) % 60 );
						  var hours = Math.floor( (t/(1000*60*60)) % 24 );
						  var days = Math.floor( t/(1000*60*60*24) );
						  return {
							'total': t,
							'days': days,
							'hours': hours,
							'minutes': minutes,
							'seconds': seconds
						  };
						}
					</script>
						<div id="clockdiv"></div>
					<script>
						function initializeClock(id, endtime){
						  var clock = document.getElementById(id);
						  var timeinterval = setInterval(function(){
							var t = getTimeRemaining(endtime);
							clock.innerHTML = t.days + ':' + t.hours + ':' + t.minutes + ':' + t.seconds + 's '
							if(t.total<=0){
							  clearInterval(timeinterval);
							}
						  },1000);
						}
						initializeClock('clockdiv', deadline);
					</script>
					
				</p>
				
				<p>
					<!-- amount -->
					<label for ="amount">Amount:</label>
					<input type="number" id="amount" name="amount"
					min="<?php 
					if($highbid == "")
					{
						echo $startingPrice+0.01;
					}
					else
					{
						echo $highbid+0.01;
					}
					?>"
						max="1000000" step="any" value="<?php if($highbid == "")
					{
						echo $startingPrice+0.05;
					}
					else
					{
						echo $highbid+0.05;
					}
					?>"
					required autofocus
					/>
					<br />
				</p>
				
				<div id="submit">
					<input class="submitButton" type="submit" value="SUBMIT" />
					<input class="resetButton" type="reset" value="CLEAR " onclick="history.go(0)"/>		
				</div>		
			
			</form>
		</div>
	</body>
</html>