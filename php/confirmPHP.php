<?php
	//Coyotes
	//confirmPHP.php
	//Summer 2016
	//Brian Eurich
	
	//ssVal variables
	$rub = '_';
	$perc = '%';
	$work = '';
	$chars = '_%';
	$bslash = '\\';
	$fslash = '/';
	
	//first name
		//get the posted name value
		$fname = $_POST['fname'];
		
		//populate work variable
		$work = $fname;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=FIRST NAME");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 2 || strlen($work) > 15)
		{
			header("Location: ssVal.php?work=$work&field=FIRST NAME");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$fname = $work;
		
	//last name
		//get the posted name value
		$lname = $_POST['lname'];
		
		//populate work variable
		$work = $lname;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=LAST NAME");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 2 || strlen($work) > 15)
		{
			header("Location: ssVal.php?work=$work&field=LAST NAME");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$lname = $work;
		
	//email
		//get the posted name value
		$work = $_POST['email'];
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=EMAIL");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 6 || strlen($work) > 50)
		{
			header("Location: ssVal.php?work=$work&field=EMAIL");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//escape again to capture things real_escape_string misses
		$work = addcslashes($work, $chars);
		
		//entry good - store for writing to db
		$email = $work;
	
	//password
		//get the posted name value
		$work = $_POST['password'];
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=PASSWORD");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 5 || strlen($work) > 15)
		{
			header("Location: ssVal.php?work=$work&field=PASSWORD");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//escape again to capture things real_escape_string misses
		$work = addcslashes($work, $chars);
		
		//salt and hash password
		//$work = password_hash($work, PASSWORD_DEFAULT);
		$pword = crypt($work);
		
		//entry good - store for writing to db
		//$pword = $work;
	
	//cellphone
		//get the posted name value
		$cell = $_POST['cell'];
		
		//populate work variable
		$work = $cell;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=CELLPHONE");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) != 10)
		{
			header("Location: ssVal.php?work=$work&field=CELLPHONE");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$cell = $work;
		
	//alt phone
		//get the posted name value
		$alt = $_POST['alt'];
		
		//populate work variable
		$work = $alt;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=ALT PHONE");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 0 || strlen($work) > 10)
		{
			header("Location: ssVal.php?work=$work&field=ALTPHONE");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$alt = $work;	
		
	//address
		//get the posted name value
		$address = $_POST['address'];
		
		//populate work variable
		$work = $address;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=ADDRESS");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 3 || strlen($work) > 100)
		{
			header("Location: ssVal.php?work=$work&field=ADDRESS");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$address = $work;
		
	//city
		//get the posted name value
		$city = $_POST['city'];
		
		//populate work variable
		$work = $city;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=CITY");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) < 2 || strlen($work) > 50)
		{
			header("Location: ssVal.php?work=$work&field=CITY");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$city = $work;
		
	//state
		//post input from html
		$work = $_POST['state'];
		
		//check value - only lower-case letters will be accepted
		for($i = 0; $i < strlen($work); $i++)
		{
			if(ord($work[$i]) < 65 || ord($work[$i]) > 90)
			{
				header("Location: ssVal.php?work=$work&field=STATE");
				exit;
			}
		}
		
		//entry ok
		$state = $work;
		
	//zipcode
		//get the posted name value
		$zip = $_POST['zip'];
		
		//populate work variable
		$work = $zip;
		
		//ssVal: \ / _ and % (BEFORE we escape the entry!)
		if	(strpos($work, $rub) > -1 ||
			 strpos($work, $perc) > -1 ||
			 strpos($work, $bslash) > -1 ||
			 strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=ZIPCODE");
			exit;
		}
		
		//ssVal: Length
		if(strlen($work) != 5)
		{
			header("Location: ssVal.php?work=$work&field=ZIPCODE");
			exit;
		}
		
		//escape entry
		$work = mysqli_real_escape_string($dbc, $work);
		
		//entry good - store for writing to db
		$zip = $work;
		
	//season ticket
		//initialize $seasonticket
		$seasonticket = '';
		
		//post input from html
		if(isset($_POST['ticket']))
		{
			$work = $_POST['ticket'];
			if($work == 'yes' || $work == 'no')
				$seasonticket = $work;
			else
			{
				header("Location: ssVal.php?work=$work&field=SEASONTICKETHOLDER");
				exit;
			}
		}
		
	//Relationship
		//initialize $relationship
		$relationship = '';
		
		//post input from html
		if(isset($_POST['rel']))
		{
			$work = $_POST['rel'];
			if($work == 'yes' || $work == 'no')
				$relationship = $work;
			else
			{
				header("Location: ssVal.php?work=$work&field=RELATIONSHIP");
				exit;
			}
		}		
		
	//relationship notes
		//post input from html
		$work = $_POST['notes'];
		
		//ssVal: \ /
		if(strpos($work, $bslash) > -1 || strpos($work, $fslash) > -1)
		{
			header("Location: ssVal.php?work=$work&field=RELATIONSHIP NOTES");
			exit;
		}
		
		//ssVal: length
		if(strlen($work) < 1 || strlen($work) > 100)
		{
			header("Location: ssVal.php?work=$work&field=RELATIONSHIPNOTES");
			exit;
		}
		
		//escape
		$work = mysqli_real_escape_string($dbc, $work);
		
		//escape again for things real_escape_string misses
		$work = addcslashes($work, $chars);
		
		//entry good
		$notes = $work;
		
		
	//verify unique username
	$unique = mysqli_query($dbc, "select DonorID from donor where email = '$email'")
		or die('confirmPHP.php read error: ' .mysqli_error($dbc));
		
	if (mysqli_num_rows($unique) != 0)
	{
		header("Location: usernameNotAvail.php?uname=$uname");////////////////////////////////////////
		exit;
	}
	
	//build query
	$query = 
	"insert into donor(lname, fname, email, password, cell, altPhone, address, city, state, zip, relationship, relationshipNotes, seasonTicketHolder)" .
	"values('$lname', '$fname', '$email', '$pword', '$cell', '$alt', '$address', '$city', '$state', '$zip', '$relationship', '$notes', '$seasonticket')";	
	
	//run query
	$result = mysqli_query($dbc, $query) or die('DB write error: '. mysqli_error($dbc));
	
	//close the db connection
	mysqli_close($dbc);
?>