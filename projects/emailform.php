<?php

	/* Self-submitting Form Script 
	Date: January 24th, 2013
	Name: Nikolas Harris 
	Student ID: 200210310 */
	
	//Obtain form information from $_POST array.
	$email = $_POST["email"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$city = $_POST["city"];
	$country = $_POST["country"];
	$timeseen = $_POST["timeseen"];
	$story = $_POST["story"];

	$to = "email@address.com"; //The e-mail where the form data will be sent.	
	
	$isValid = false; //Validation of data is initially false.

	if(isset($_POST['submit'])) {
    	//If submit button is set, validate all the fields are filled out.
   		if (empty($_POST["email"])) {
			$error = 'Please fill out the E-mail field.'; }		
		else if (empty($_POST["fname"])) {
			$error = 'Please fill out the First Name field.'; }
		else if (empty($_POST["lname"])) {
			$error = 'Please fill out the Last Name field.'; }
		else if (empty($_POST["city"])) {
			$error = 'Please fill out the City field.'; }
		else if (empty($_POST["country"])) {
			$error = 'Please fill out the Country field.'; }
		else if (empty($_POST["timeseen"])) {
			$error = 'Please fill out the Date Stamp field.'; }
		else if (empty($_POST["story"])) {
			$error = 'Please fill out your story.'; }
		else {
			//All validation passes.
			$isValid = true; 
			//Build the body of the e-mail.
			$message = "City: $city \n Country: $country \n Date Stamp: $timeseen \n Email: $email \n Story: $story";
			$name = $fname . $lname;
			//Send the email.
			$headers = "From: " . $email;
			mail ($to, $city, $message, "From: " . $name);
			//Echo confirmation and summarization.
			echo "<h1>Your message has been succesfully sent.</h1>";
			echo "<p>Your name is $fname $lname and your e-mail address is $email.</p>";
			echo "<p>You said you live in $city, $country and that you have information pertaining to the time of $timeseen.</p>";
			echo "<p>You wrote: $story"; }			  	
	}


	if (!$isValid) {
    	//Validation fails and appropriate error message is displayed with the form again.
    		echo "<h1>$error</h1>";
    	?>
		<form name="fishreport" method="post" action="fishprocess2.php">
			<fieldset>
			<legend>Personal Information</legend>
				<label for="fname">First Name</label>
				<input type="text" id="fname" name="fname" size="30" maxlength="30" value="<?php echo $fname ?>">
				<label for="lname">Last Name</label>
				<input type="text" id="lname" name="lname" size="30" maxlength="30" value="<?php echo $lname ?>">
				<label for="city">City</label>
				<input type="text" id="city" name="city" size="30" maxlength="30" value="<?php echo $city ?>">
				<label for="country">Country</label>
				<input type="text" id="country" name="country" size="30" maxlength="30" value="<?php echo $country ?>">
				<label for="email">E-mail</label>
				<input type="text" id="email" name="email" size="30" maxlength="30" value="<?php echo $email ?>">
			</fieldset>
			<fieldset>
			<legend>Your Story</legend>
				<label for="timeseen">Provide YY/MM/DD of Sighting</label>
				<input type="text" id="timeseen" name="timeseen" size="8" maxlength="8" value="<?php echo $timeseen ?>">
				<label for="story">Your Story</label>
				<textarea name="story" id="story" rows="15" cols="60" value="<?php echo $story ?>">Share your story or information here.</textarea>
			</fieldset>
			<input type="submit" value="Submit Form" name="submit">
		</form>	
	<? } ?>

