<?php include "config.php"; //including the php code for SESSION start and database connection

	session_start();	//starting the user's session 
	session_destroy();	//destroying all the information associated with the current session 
	$_SESSION = array(); 	//filling all session variable with empty variables 
	
	 ?>

	<meta http-equiv="refresh" content="0;index.php">	<!-- refreshing the page imeediatley back to a logged out home page