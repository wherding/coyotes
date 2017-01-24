<!DOCTYPE html>
<?php
include('local-connect.php');

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
		<title>Arizona Coyotes Foundation - Images</title>
	</head>
	
	<body>
		<?php include('../php/header.php'); ?>
			
		<div id="body">
			<?php
				if(isset($_GET['id'])) {
				//$sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . $_GET['image_id'];
				$result = mysqli_query($dbc, "Select image from test_image where id=" . $_GET['id']."") 
				or die('DB write error: '. mysqli_error($dbc));				
				$row = mysqli_fetch_array($result);
				header("Content-type: image/bin");
				echo $row["image"];
				}
				mysqli_close($dbc);
			?>
		</div>
	</body>
</html>