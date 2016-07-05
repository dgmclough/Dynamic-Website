<?php
	//php script that the contact page information is passed to.
	// takes the information and uses the php mail function to format and send on the information to the company email
	
	$recipient = "dgmclough@gmail.com";	//assigning variable to the company email
	$subject = "Contact Form Message";	//creating a variable for the subject portion of the mail
	$sender = $_POST["c_name"];		//taking POST variable from the form for posters name
	$senderEmail = $_POST["c_email"];	//taking POST variable from the form for posters email
	$message = $_POST["comment"];		//taking POST variable from the form for posters comment
	
	
	$mailBody="Name: $sender\n Email: $senderEmail\n\n$message";	//formatting and assigning the senders name, email and message into body
	
	mail($recipient,$subject, $mailBody, "From: $sender <$senderEmail>");	//function used to send the information to the company email
	
	echo "<p>Thank you! Your message has been sent.</p>";  

	echo "<p>You will now be redirected back to the home page</p>"; 
	
	header( "refresh:3;url= index.php" );	//after confirmation message the user is directed back to the home page
?>
