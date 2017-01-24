<?php
	//Coyotes
	//process.php
	//Summer 2016
	//Brian Eurich
	
	//connect to db (local or server)
	include('local-connect.php');
	
	//cslashes variable
	$chars = '_%';
	
	//get email
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	
	//escape again
	$email = addcslashes($email, $chars);
	
	//get password
	$pword = mysqli_real_escape_string($dbc, $_POST['password']);
	
	//escape again
	$pword = addcslashes($pword, $chars);
	
	//build query
	$query = "select * from donor where email = '$email'";
	
	//run the query
	$result = mysqli_query($dbc, $query)
		or die('process.php read error: ' .mysqli_error($dbc));
		
	//see if we get a row
	if(mysqli_num_rows($result) == 0)
	{
		header('Location: login.php?rc=1');
		exit;
	}
	
	//if we get here, we can validate username.
	
	//process password
	$row = mysqli_fetch_array($result);
	
	//salt and hash the entered password to compare to the stored password
	if (crypt($pword, $row['password']) == $row['password'])
	{
		//passwords matched
		//name and start php session
		session_start();
		//set our php session variable
		$_SESSION['email'] = $row['email'];
		//close db connection 
		mysqli_close($dbc);
		//transfer control to welcome page
		header('Location: welcome.php');
		exit;
	}
	else
	{
		header('Location: login.php?rc=2');
		exit;
	}
	
	//LEAVE THIS CODE BLOCK AT THE BOTTOM!
	//we fell through
	header('Location: php/login.php?rc=3');
	exit;
?>