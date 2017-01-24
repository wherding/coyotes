<!DOCTYPE html>
<?php
include('local-connect.php');
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
		<link type="text/css" rel="stylesheet" href="stylesheet/style.css" /> 
		
		<!-- javascript tags -->
		<script type="text/javascript" src="php/timerJS.js"></script>
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - timer</title>
	</head>

	<body>	
		<?php include('../php/header.php'); ?>
			
		<div id="body">
			<?php
				$endDateQ = mysqli_query($dbc, "Select endDate From auctions where auctionID=1") or die('DB write error: '. mysqli_error($dbc));
				$row = mysqli_fetch_array($endDateQ);
				$endDate = $row['endDate'];
			?>
			
			<div id="clockdiv"></div>
			<script>
				function initializeClock(id, endtime){
				  var clock = document.getElementById(id);
				  var timeinterval = setInterval(function(){
					var t = getTimeRemaining(endtime);
					clock.innerHTML = 'days: ' + t.days + '<br>' +
									  'hours: '+ t.hours + '<br>' +
									  'minutes: ' + t.minutes + '<br>' +
									  'seconds: ' + t.seconds;
					if(t.total<=0){
					  clearInterval(timeinterval);
					}
				  },1000);
				}
				initializeClock('clockdiv', deadline);
			</script>
			
		</div>	
	</body>
</html>