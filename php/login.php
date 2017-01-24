<!DOCTYPE html>

<?php
	//start a php session

	session_start();

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
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - Login</title>
	</head>
	
	<body>
		<?php include('../php/header.php'); ?>
			
		<div id="body">
			<form id="logform" action="php/process.php" method="post">
				<p id="title">Login</p>
				
				<?php
					//check return codes from process.php
					if(isset($_GET['rc']))
					{
						if($_GET['rc'] == 1)
							echo '<p class="logerror">Invalid email!</p>';
						if($_GET['rc'] == 2)
							echo '<p class="logerror">Invalid Password!</p>';
						if($_GET['rc'] == 3)
							echo '<p class="logerror">Fell through logic</p>';
					}
				?>
				
				<fieldset class="login">
					<!-- email -->
					<label for ="email">Email:</label>
					<input type="email" id="email" name="email"
					required autofocus
					title="Enter your email address)"
					pattern="[a-zA-Z0-9-_!$.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z.]{2,20}"
					maxlength="50"
					/>
					<br />
					
					<!-- password -->
					<label for ="password">Password:</label>
					<input type="password" id="password" name="password" 
					required
					title="Password: 3-15 characters (letters, - _ ! $ only)"
					pattern="[a-zA-Z0-9-_!$]{5,15}"
					/>
					<br />
				</fieldset>
				<div id="submit">
					<input class="submitButton" type="submit" value="SUBMIT" />
					<input class="resetButton" type="reset" value="CLEAR " onclick="history.go(0)"/>		
				</div>
				
				<div id="registerhere"><a href="php/register.php">Register Here</a></div>				<div id="registerhere"><a href="php/changePass.php">Forgot Password</a></div>
				
			</form>
		</div>
	</body>
</html>