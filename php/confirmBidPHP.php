<?php
	//Coyotes
	//confirmPHP.php
	//Summer 2016
	//Brian Eurich
	
	//amount
	$amount = mysqli_real_escape_string($dbc, $_POST['amount']);
	
	//Get auction id from session variable
	$auctionID = $_SESSION['auctionID'];

	$maxBid = mysqli_query($dbc, "Select MAX(amount) AS high From bid where auctionID = '".$auctionID."';") or die('DB write error: '. mysqli_error($dbc));
	$row = mysqli_fetch_array($maxBid);
	$highbid = $row['high'];
	
	$startingPriceQ = mysqli_query($dbc, "Select startingPrice From auctions where auctionID='".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
	$row = mysqli_fetch_array($startingPriceQ);
	$startingPrice = $row['startingPrice'];
	
	if($amount > $highbid && $amount > $startingPrice)
	{
		//username	
		$unameR = mysqli_query($dbc, "Select * from donor where email = '".$_SESSION['email']."'") 
		or die('DB write error: '. mysqli_error($dbc));
		$row = mysqli_fetch_array($unameR);
		$email = $row['email'];
		//build query
		$query = 
		"insert into bid(auctionID, email, amount)" .
		"values('$auctionID', '$email', '$amount')";
		
		//get email for user outbid
		$Lemail= mysqli_query($dbc,"SELECT * 
						FROM bid
					WHERE auctionID =$auctionID
					ORDER BY BidID desc ")
				or die('DB write error: '. mysqli_error($dbc));
				$row = mysqli_fetch_array($Lemail);
				$lemail = $row['email'];
		
		//run query
		$result = mysqli_query($dbc, $query) or die('DB write error: '. mysqli_error($dbc));
		
		//build query for number of bids
		$numberOfBidsQ = mysqli_query($dbc, "select numberOfBids from auctions where auctionId = '".$auctionID."'") or die('DB write error: '. mysqli_error($dbc));
		$row = mysqli_fetch_array($numberOfBidsQ);
		$numberOfBids = $row['numberOfBids'];
		
		//increment
		$numberOfBids++;
		
		//query to insert
		$query2 = 
		"Update auctions Set numberOfBids='$numberOfBids' Where auctionId=$auctionID";
		
		//run query
		$result2 = mysqli_query($dbc, $query2) or die('DB write error: '. mysqli_error($dbc));
		
		//tell them what item they have been outbid on
		$Litem= mysqli_query($dbc,"select a.item
		from auctions a
		where a.auctionID = $auctionID")
		or die('DB write error: '. mysqli_error($dbc));
		$row = mysqli_fetch_array($Litem);
		$litem = $row['item'];
		
		//tell them how much the new bid is
		$Oamnt= mysqli_query($dbc,"select max(amount) as high
			from bid
			where auctionID=$auctionID")
			or die('DB write error: '. mysqli_error($dbc));
		$row = mysqli_fetch_array($Oamnt);
		$oamnt = $row['high'];
		
		// the message
		$msg = "You have been outbid. The new bid is $oamnt for item: $litem";
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
	
		//subject
		$subject="you have been out bid on $litem ";
	
		//sent from
			$headers = 'From: noreply@cis440team4.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		//send msg
			mail($lemail,$subject,$msg,$headers);
		
		//close the db connection
		mysqli_close($dbc);
	}
	else
	{
		header('Location: auction.php?lb=1');
		exit;
	}
?>