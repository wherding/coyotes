<?php
	//Coyotes
	//logout.php
	//Summer 2016
	//Brian Eurich
	
	session_start();
	session_unset();
	session_destroy('email');
	$_SESSION = array();
	header('Location: ../');
	exit;
?>