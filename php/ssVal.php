<!DOCTYPE html>

<!--
Coyotes
ssVal.php
Summer 2016
Brian Eurich
-->

<html lang="en">
	<head>
		<!-- base tag-->
		<base href="http://localhost/Coyotes/">
		
		<!-- meta tags -->
		<meta charset="utf-8" />
		<meta name="robots" content="noindex,nofollow" />
	 
		<!-- favicon link -->
		<link type="image/gif" rel="icon" href="images/coyote.png" />
		
		<!-- stylesheet link(s) -->
		<link type="text/css" rel="stylesheet" href="stylesheet/style.css" /> 
		
		<!-- javascript tags -->
		
		<!-- web-page title -->
		<title>Arizona Coyotes Foundation - ssVal</title>
	</head>
	<body>
		<?php include('../php/header.php'); ?>
		
		<div id="body">
			<p class="bold">
				** ERROR! **
			</p>
			<p class="bold">
				Your entry of [<span class="red">
				<?php
					echo @$_GET['work']; ?></span>]
					in the [<span class="red">
					<?php echo @$_GET['field'];?></span>]
					failed server-side validation!
			</p>
			<p class="bold">
				Please click <a href="php/register.php">HERE</a> to return
				to the Registration Form and try again
			</p>
		</div>
	</body>
</html>