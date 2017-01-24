<?php
	// Coyotes
	// local-connect.php
	// Brian Eurich
	
	//variables for db connection_aborted
	$host	= 'localhost';
	$user	= 'root';
	$pw		= '';
	$db		= 'azcoyotesfoundation';
	
	//connect to db
	$dbc = mysqli_connect($host, $user, $pw, $db)
		or die('MySQL connect error - LOCAL: '.mysqli_error($dbc));	
?>