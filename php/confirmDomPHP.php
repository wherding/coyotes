<?php
	//Coyotes
	//confirmPHP.php
	//Summer 2016
	//William Herding
	
	//amount
	$Damount =  $_POST['Damount'];
	
	//username	
	$unameR = mysqli_query($dbc, "Select * from donor where email = '".$_SESSION['email']."'") 
	or die('DB write error: '. mysqli_error($dbc));
	
	$row = mysqli_fetch_array($unameR);
	
	$email = $row['email'];
	
	//build query
	$query = 
	"insert into donate(email, amount)" .
	"values('$email', '$Damount')";
	
	//run query
	$result = mysqli_query($dbc, $query) or die('DB write error: '. mysqli_error($dbc));
	
	//set email to doner email
	//set from???????????????
	$headers = 'From: noreply@cis440team4.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
   
	$lemail=$row['email'];
		// the message
		$msg = "Thank you for your donation of $$Damount!";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		
		//subject
		$subject="Donation confirmation";
		
		//send msg
			mail($lemail,$subject,$msg,$headers);
	
	//close the db connection
	mysqli_close($dbc);
?>