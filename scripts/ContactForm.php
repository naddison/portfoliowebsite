<?php
/*	Copyright 2012, Nikolas Harris.
	Last updated: January 02 / 2013.
	Desription: This is a basic form to e-mail script. It draws data from the form and constructs the message
	sending it to the desired recipient. The editable variables are marked thoughout with comments.
	This script is available for download at http://www.nikolasaddison.com                            */
	
//Global variable declarations.
$to = "e-mail"; //Enter your e-mail here.

require_once('../recaptcha/recaptchalib.php');
  $privatekey = "xxxxx";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Code here to handle a successful verification
  	
	  //Get the form information.
	  $email = $_POST["email"];
	  $name = $_POST["name"];
	  $message = $_POST["message"];
	  $subject = $_POST["topic"];
	  
	  //Validate the email address.
	  $spamcheck = validateMe($email);
	  
	  //Control statement on validation.
	  if ($spamcheck == false) {
		  echo "Invalid E-mail Address"; }
	  else {
		  //Send the mail.
	  $headers = "From: " . $email;
	  mail ($to, $subject, $message, "From: " . $name);
	  echo "<h1>Your e-mail has been sent to Nikolas, click back on your browswer to get back to the site.</h1>"; }
}

//Validate e-mail function.
	function validateMe ($input) {
		$input=filter_var($input, FILTER_SANITIZE_EMAIL);
		if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
			  return true; }
	 	else {
			  return false; }
		  }
?>
