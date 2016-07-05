<?php include "config.php";  //allows access to the config file for access to database?>

	<?php	
		//php processing to make sure that there are available spaces in the class the child is being signed up for
				$max = 16;	//setting the max number of spaces available for each class 
				
				//a switch statement is used to apply the code to a specific element according to the form submission
				switch ($_POST['class']) {
					//if the "Red" class option was selected in form 
					case "1":
						$redclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 1");	//counts the number of spaces already taken for the red class
						$redclassresult = mysql_fetch_row($redclassquery);	//places result in an array 
						$numred = $redclassresult[0];
						$avail = $max - $numred;	//calculates available spaces by subtracting from the max value 
						
						break;	//break switch to proceed 
						
					//if the "Orange" option was selected in form 
					case "2":
						$orangeclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 2");	//counts the number of spaces already taken for the orange class
						$orangeclassresult = mysql_fetch_row($orangeclassquery);	//places result in an array 
						$numorange = $orangeclassresult[0];
						$avail = $max - $numorange;		//calculates available spaces by subtracting from the max value 
						
						break;	//break switch to proceed 
						
					//if the "Green" option was selected in form 
					case "3":
						$greenclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 3");		//counts the number of spaces already taken for the green class
						$greenclassresult = mysql_fetch_row($greenclassquery);	//places result in an array 
						$numgreen = $greenclassresult[0];
						$avail = $max - $numgreen;		//calculates available spaces by subtracting from the max value 
						
						break;	//break switch to proceed 
		
					default:
						echo "<h1>Error</h1>";
						echo "<p>Sorry, your registration failed.</p>";  
						echo "<p>Please <a href=\"class_sign_up.php\">click here to return to the sign-up page</a>.</p>";
						
				}	
				
				//if the class availability is above 0
				if($avail >0){
					$name = mysql_real_escape_string($_POST['name']);	//escaping special characters and taking the user input for name
					$surname = mysql_real_escape_string($_POST['surname']);		//escaping special characters and taking the user input for surname
					$age = mysql_real_escape_string($_POST['age']);		//escaping special characters and taking the user input for age
					$c = mysql_real_escape_string($_POST['class']);		//escaping special characters and taking the user input for class
					$class = (int)$c; 	//changing the string value for class to an int value for insertion into the database
					
					$username = $_SESSION['Username']; 	
					
					$parentquery = mysql_query("SELECT parent_id FROM parent WHERE username = '$username'");	//querying the database to find the corresponding parent_id to the session username
					
					$result = mysql_fetch_row($parentquery);	//placing results from query into a row 
					$parent = $result[0];
			
					$signupquery = mysql_query("INSERT INTO child (name, surname, age, parent_id, class_id) 
					VALUES('$name', '$surname', '$age', '$parent', '$class')");	//inserting the new users information into the appropriate rows in the database
					
					if($signupquery)	//if the insert was successful
					{
						echo "<h1>Success</h1>";
						echo "<p>Your sign-up was successfully created.</p>";	//if registration successful return to the member page to show updated account info
						echo "<p>Please <a href=\"member.php\">click here to return to your homepage</a>.</p>";
					}
					else	//if an error occurred 
					{
						echo "<h1>Error</h1>";
						echo "<p>Sorry, your registration failed. Please go back and try again.</p>";   
					} 
				}
					
				else{
					echo "<h1>Error</h1>";
					echo "<p>Sorry, your registration failed. There are no more places available in this class.</p>";  
					echo "<p>Please check back as places can  become available again</p>";
					echo "<p>Please <a href=\"index.php\">click here to return to the homepage</a>.</p>";
				}
				 
	?>
