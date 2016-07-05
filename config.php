<?php
session_start();	//starting the session for the user
 
$dbhost = 'localhost'; // allocating the host
$dbname = 'db'; // assigning the database created for the project
$dbuser = 'root'; // username to access the database
$dbpass = ''; // password to access the database
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error()); //connects the script to the database server using info from above
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());	//selects the specific database to connect to that was defined above

?>