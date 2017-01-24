<?php

	//Coyotes

	//confirmPassPHP.php

	//Summer 2016

	//William Herding

	

	//password

	$work =  $_POST['password'];

	$pword= password_hash($work, PASSWORD_DEFAULT);

	//get the posted name value
	$work = $_POST['email'];
	
	//email	
	$email=$work;
	
	//build query

	$query = 

	"UPDATE `donor` SET `password` ='$pword'WHERE email ='$email'";

	

	//run query

	$result = mysqli_query($dbc, $query) or die('DB write error: '. mysqli_error($dbc));

	

	//close the db connection

	mysqli_close($dbc);

?>