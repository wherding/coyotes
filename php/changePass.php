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

		<title>Arizona Coyotes Foundation - Register</title>

	</head>

	

	<body>

		<?php include('../php/header.php'); ?>

			

		<div id="body">

			<form id="regform" action="php/confirmPass.php" method="post">

				<p id="title">Change Password</p>

				

				<fieldset class="registration">

					
					<!-- email -->

					<label for="email">Email: </label>

					<input type="email" id="email" name="email"

					required

					title="Email: Valid email address only (6-50 characters)"

					pattern="[a-zA-Z0-9-_!$.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z.]{2,20}"

					maxlength="50"

					/>

					<br />

					<!-- password -->

					<label for ="password">Password: </label>

					<input type="password" id="password" name="password" 

					required

					title="Password: 5-15 characters (letters, - _ ! $ only)"

					pattern="[a-zA-Z0-9-_!$]{5,15}"

					onchange="form.reenter.pattern=this.value"

					/>

					<br />

					

					<!-- Reenter -->

					<label for ="reenter">Re-enter Password: </label>

					<input type="password" id="reenter" name="reenter" 

					required

					title="Passwords must match!"

					/>

					<br />

					

					
					

				</fieldset>

				

				<div id="submit">

					<input class="submitButton" type="submit" value="SUBMIT" />

					<input class="resetButton" type="reset" value="CLEAR " onclick="history.go(0)"/>		

				</div>

				

			</form>

		</div>

	</body>

</html>