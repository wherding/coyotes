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
			<form id="regform" action="php/confirm.php" method="post">
				<p id="title">Registration</p>
				
				<fieldset class="registration">
					<!-- First Name -->
					<label for ="fname">First Name: </label>
					<input type="text" id="fname" name="fname"
					required autofocus
					title="First Name: 2-15 characters (letters only)"
					pattern = "[a-zA-Z]{2,15}"
					/>
					<br />
					
					<!-- Last Name -->
					<label for ="lname">Last Name: </label>
					<input type="text" id="lname" name="lname"
					required 
					title="Last Name: 2-15 characters (letters only)"
					pattern = "[a-zA-Z]{2,15}"
					/>
					<br />
					
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
					
					<!-- Cell Phone -->
					<label for="cell">Cell#: </label>
					<input type="text" id="cell" name="cell"
					required
					title="Please enter your cell phone number."
					pattern="[0-9]{10}"
					/>
					<br />
					
					<!-- Alt Phone -->
					<label for="alt">Alt Phone# (optional): </label>
					<input type="text" id="alt" name="alt"
					title="Enter an alternative phone number."
					pattern="[0-9]{10}"
					/>
					<br />
					
					<!-- Address -->
					<label for="address">Address: </label>
					<input type="text" id="address" name="address"
					required
					title="Please enter your address."
					pattern="[a-zA-Z0-9 ]{3,100}"
					/>
					<br />
					
					<!-- City -->
					<label for="city">City: </label>
					<input type="text" id="city" name="city"
					required
					title="Please enter your city."
					pattern="[a-zA-Z0-9-_!$]{2,50}"
					/>
					<br />
					
					<!-- State -->
					<label for="state">State:</label>
					<select id="state" name="state"
					required
					title="Please select yor state."
					>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
					<br />
					
					<!-- Zipcode -->
					<label for="zip">Zip: </label>
					<input type="text" id="zip" name="zip"
					required
					title="Please enter your zipcode."
					pattern="[0-9]{5}"
					/>
					<br />
					
					<!-- SeasonTicketHolder -->
					<label for="ticket">Do you have season tickets?</label>
					Yes<input type="radio" id="tickety" name="ticket" value="yes" 
					required
					title="You have season tickets!"
					/>
					No<input type="radio" id="ticketn" name="ticket" value="no" 
					title="You do not have season tickets."
					/>
					<br />
					
					<!-- Relationship -->
					<label for="relationship">Do you have a relationship with a member of the Coyotes?</label>
					Yes<input type="radio" id="rely" name="rel" value="yes" 
					required
					title="You have a relationship with a member of the Coyotes!"
					/>
					No<input type="radio" id="reln" name="rel" value="no" 
					title="You do not have a relationship with a member of the Coyotes."
					/>
					<br />
					
					<!-- Relationship Notes -->
					<label for="notes">Describe your relationship:</label>
					<br />
					<textarea id="notes" name="notes" rows="6" cols="40" 
					title="Tell us about the relationship"
					maxlength="100"></textarea>
					
				</fieldset>
				
				<div id="submit">
					<input class="submitButton" type="submit" value="SUBMIT" />
					<input class="resetButton" type="reset" value="CLEAR " onclick="history.go(0)"/>		
				</div>
				
			</form>
		</div>
	</body>
</html>