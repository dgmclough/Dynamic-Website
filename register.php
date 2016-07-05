<?php include "config.php";  //allows access to the config file for access to database?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 
	<title>DM Academy Registration</title>	<!-- page title -->
	<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- link to my external CSS -->
	<script type="text/javascript" src="/JS/myjs.js"></script>	<!-- link to my external javascript file -->
	</head>  
	<body>  
		<div class ="container">
		
			<?php
			//checks to see if the Session variables have been set to indicate the user is logged in as a member
			if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
			{
				include("/layout/headerloggedin.php");	//includes the html code for the header from another file if logged in 
			}
			
			else
			{
				include("/layout/header.php");		//includes the html code for the header from another file
			}
			?>
			
			<?php include("/layout/nav.php");?><!-- includes the html code for the nav bar from another file -->
			
			<?php
			//checking to make sure that all of the necessary fields from the registration form are filled in 
			if(!empty($_POST['r_name']) && !empty($_POST['r_surname']) && !empty($_POST['r_username']) && !empty($_POST['r_password']) && !empty($_POST['r_email']))
			{
				$name = mysql_real_escape_string($_POST['r_name']);		//escaping special characters and taking the user input for name
				$surname = mysql_real_escape_string($_POST['r_surname']);		//escaping special characters and taking the user input for surname
				$username = mysql_real_escape_string($_POST['r_username']);		//escaping special characters and taking the user input for username
				$password = md5(mysql_real_escape_string($_POST['r_password']));	//escaping special characters and taking the user input for password
				$email = mysql_real_escape_string($_POST['r_email']);		//escaping special characters and taking the user input for username
				 
				$checkusername = mysql_query("SELECT * FROM parent WHERE username = '".$username."'");	//checking to see if username is already in use
				$checkemail = mysql_query("SELECT * FROM parent WHERE email = '".$email."'");	//checking to see if email is already registered

				
				if(mysql_num_rows($checkusername) == 1)	//if the username is already taken 
				{
					echo "</br>";
					echo "<h1>Error</h1>";
					echo "<p>Sorry, that username is taken. Please <a href=\"register.php\">go back</a> and try again.</p>";
					echo "</br>";
				}
				
				else if(mysql_num_rows($checkemail) == 1) //if the user has already registered with the email before
				{
					echo "</br>";
					echo "<h1>Error</h1>";
					echo "<p>Sorry, but this email has already been assigned to an account.</p>";
					echo "</br>";
				}
				
				else	//if the username is available
				{
					//inserting the new users information into the database
					$registerquery = mysql_query("INSERT INTO parent (name, surname, email, username, password) VALUES('".$name."', '".$surname."', '".$email."','".$username."', '".$password."')");	
					if($registerquery)	//if the insert was successful
					{
						echo "</br>";
						echo "<h1>Success</h1>";
						echo "<p>Your account was successfully created. Please <a href=\"login.php\">click here to login</a>.</p>";	//if registration successful, redirect to the login page
						echo "</br>";
					}
					
					else	//if an error occurred 
					{
						echo "<h1>Error</h1>";
						echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
					}       
				}
			}
			else
			{
				?>
					
					
				<div class="main">
					
					<div class="section" style="background-color:#E84C3D; position:relative; color: #2D3E50; height:auto; margin-top:0px">
						
						<div class="forms">
							<h1>Register</h1>
					 
							<p>Please enter your details below to register.</p>
					 
							 <!--creating a form for users to register with-->
							<form method="post" action="register.php" id="registerform" onsubmit="return validateRegistration()">	<!--submitting the form data to the same file for processing and a javascript function for validation-->
							<fieldset>
								<label>Name</label><input type="text" name="r_name" id="r_name"/>
								<span id="nameerror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								<label>Surname</label><input type="text" name="r_surname" id="r_surname"/>
								<span id="snameerror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								<label>Username</label><input type="text" name="r_username" id="r_username" />
								<span id="usernameerror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								<label>Password</label><input type="password" name="r_password" id="r_password" />
								<span id="passworderror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								<label>Confirm Password</label><input type="password" name="c_password" id="c_password"/>
								<span id="c_passworderror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								<label>Email Address</label><input type="text" name="r_email" id="r_email" />
								<span id="emailerror"></span>	<!-- space for javascript validation to place error message -->
								<br/>
								</br>
								<input type="submit" name="submit" id="submit" value="Submit" />
							</fieldset>
							</form>
						</div>
					</div>
				</div>
				<?php
			}		//closing the php 
			?>
			
			<?php include("/layout/footer.php");?>	<!-- including the html code for the footer -->
 
		</div>
	</body>
</html>