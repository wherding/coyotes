<!--
Coyotes
header.php
Summer 2016
Brian Eurich
-->
<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
?>

<div id="header">
	<ul>
		<li><a href="">Home</a></li>
		<?php
			if(isset($_SESSION['email']) && ($_SESSION['email'] != ''))
				echo '<li><a href="php/logout.php">Logout</a></li>';
			else
				echo '<li><a href="php/login.php">Login</a></li>';
		?>
		<li><a href="php/auction.php">Auction</a></li>
		<li><a href="php/donation.php">Donation</a></li>
		<li><a href="php/zamboni.php">Zamboni</a></li>
</div>