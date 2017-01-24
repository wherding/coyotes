<?php
	//start a php session
	session_start();
	//if user not already logged in, send them back to login page
	if(!isset($_SESSION['email']))
		{
			header("Location: login.php");
			exit;
		}
	//connect to db
	include('local-connect.php');
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
			
			<!-- web-page title -->
			<title>Arizona Coyotes Foundation - Zamboni Rides</title>
		</head>
	<body>
		<?php include('../php/header.php'); ?>
		<div id="body">
			<form id="regform" action="php/confirmZamboni.php" method="post">
				<p id="title">Zamboni Selection</p>
				<fieldset class="zamboni">
				<?php
					$result = mysqli_query($dbc, "SELECT game, opponent FROM test WHERE game NOT IN ( SELECT game FROM reservation);") 
						or die('DB write error: '. mysqli_error($dbc));
						echo "<select name='zamboniSelection[]'>";
						while ($row = mysqli_fetch_array($result))
							{
								$game = $row['game'];
				                $opponent = $row['opponent'];
				                echo '<option value='.$row['game'].'>'.$game.' '.$opponent.'</option>';
							}
							echo "</select>";
							mysqli_close($dbc);
				?>
				</fieldset>
				<div id="submit">
					<input class="submitButton" type="submit" value="SUBMIT" />
					<input class="resetButton" type="reset" value="CLEAR " onclick="history.go(0)"/>
				</div>
			</form>
		</div>
	</body>
</html>