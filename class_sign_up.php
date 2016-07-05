<?php include "config.php"; //allows access to the config file for access to database?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
		<title>DM Academy Class Sign-Up</title>	 <!-- page title -->
		<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- link to my external CSS -->
		<script type="text/javascript" src="myjs.js"></script>	<!-- link to my external javascript file -->
	</head>  
	<body>  
	<div class="container">
	
			
			<?php
			//checks to see if the Session variables have been set to indicate the user is logged in as a member
			if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
			{
				 include("/layout/headerloggedin.php"); 	//includes the html code for the header from another file
				 include("/layout/nav.php");			//includes the html code for the nav bar from another file
				?>
				
				<div class="main">
				
					<div class="section">
						
						<h1>Class Sign-Up</h1>
						
						</br>
					
						<h3><center><u>Child's Information</u></center></h3>
						
						<!-- html form for class sign-up -->
						<div class="forms">
							<!-- using post to send it to another php file for validation. using onsubmit for external javascript validation -->
							<form method="post" action="sign_up_auth.php" name="sign_up_form" id="sign_up_form" onsubmit="return validateSignUp()">	
							<fieldset>
								<label for="name">First Name</label><input type="text" name="name" id="name" />
								<span id="fnameerror"></span>	<!-- space provided to display an error message from javascript validation -->
								<br />
						
								<label for="surname">Surname</label><input type="text" name="surname" id="surname" />
								<span id="snameerror"></span>	<!-- space provided to display an error message from javascript validation -->
								<br />
								
								<label for="class">Class</label><select name="class"  id="class" />
								<span id="classerror"></span>	<!-- space provided to display an error message from javascript validation -->
								</br>
								<option value= "1" selected="selected">Red: Monday 3-4pm  Age: 5-7</option>
								<option value= "2">Orange: Wednesday 3-4pm  Age: 8-9</option>
								<option value= "3">Green: Friday 3-4pm  Age: 10-11 </option></select>
								
								<label for="age">Age</label><select name="age" name="age" id="age" />
								<span id="ageerror"></span>	<!-- space provided to display an error message from javascript validation -->
								</br>
								<option value= "5" selected="selected"> 5 </option>
								<option value= "6"> 6 </option>
								<option value= "7"> 7 </option>
								<option value= "8"> 8 </option>
								<option value= "9"> 9 </option>
								<option value= "10"> 10 </option>
								<option value= "11"> 11 </option></select>
						
								
								
								<span id="ageerror"></span>	<!-- space provided to display an error message from javascript validation -->
								
								
								</br>
								</br>
								<input type="submit" name="book" id="book" value="Book" />
							</fieldset>
							</form>
						</div>
					</div>
					
				</div>
				 		 
			<?php
			}	//closing the php 
			?>
			
			<?php include("/layout/footer.php");?>	<!-- including the html code for the footer from another php file -->
		</div>
	</body>
</html>