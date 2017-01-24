<?php
	//Coyotes
	//confirmPHP.php
	//Summer 2016
	//Brian Eurich
	
	$_REQUEST['zamboniSelection'];
	$zamboniSelection = $_POST['zamboniSelection'];
	
	$unameR = mysqli_query($dbc, "Select * from donor where email = '".$_SESSION['email']."'") 
		or die('DB write error: '. mysqli_error($dbc));
		
	$row = mysqli_fetch_array($unameR);
	
	$email = $row['email'];
		
	$query = 
		"insert into reservation(email, game)" .
		"values('$email', '$zamboniSelection[0]')";
		
	
	$result = mysqli_query($dbc, $query) or die('DB write error: '. mysqli_error($dbc));
	
	//email confirmation
	$lemail = $row['email'];
	// the message
		$msg = "Thank you! Your zamboni ride has been booked for $zamboniSelection[0]";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		
		//subject
		$subject="Zamboni confirmation ";
		//set from???????????????
	$headers = 'From: noreply@cis440team4.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
		
		//send msg
			mail($lemail,$subject,$msg,$headers);
			
	
	//close the db connection*/
	mysqli_close($dbc);
?>

