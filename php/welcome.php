<?php	
	//start a php session
	session_start();
	//if user not already logged in, send them back to login page
	if(!isset($_SESSION['email']))
		{
			header('Location: login.php');
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
		<title>Arizona Coyotes Foundation - Welcome</title>
	</head>
	<body>
		<?php include('../php/header.php'); ?>
		
		<div id="confirm">
			<p>Hello! You are logged in as 
				<?php echo $_SESSION['email']; ?>
			</p>
		</div>

	</body>
</html>