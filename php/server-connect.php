<?php
	// Coyotes
	// server-connect.php
	// Brian Eurich
	
	//variables for db connection_aborted
	$host	= 'localhost';
	$user	= 'cis440-team4';
	$pw		= 'wpcareyT4';
	$db		= 'azCoyotesFoundation';
	
	//connect to db
	$dbc = mysqli_connect($host, $user, $pw, $db)
		or die('MySQL connect error - LOCAL: '.mysqli_error($dbc));	
?>