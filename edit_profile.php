<?php include "config.php";  //allows access to the config file for access to database?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 
	<title>DM Academy Edit Profile</title>		<!-- page title -->
	<link rel="stylesheet" href="mystyle.css" type="text/css" />		<!-- linking to external CSS file -->
	<script type="text/javascript" src="myjs.js"></script>		<!-- linking to javascript file -->
	</head>  
	<body>  
		<div class ="container">
		
			<?php
			//checking to see if the user is logged in
			if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
			{
				include("/layout/headerloggedin.php");		//if user logged in display this header file 
			}
			
			else
			{
				include("/layout/header.php");			//if not logged in display this header file
			}
			?>
			
			<?php include("/layout/nav.php");?>		<!-- display the html code for the navigation bar -->
			
			<?php
			//php validation test to make sure that user has both of the fields filled in
			if(!empty($_POST['e_name']) && !empty($_POST['e_surname']))	
			{
				$name = mysql_real_escape_string($_POST['e_name']);	//escaping special characters and taking the user input for name change
				$surname = mysql_real_escape_string($_POST['e_surname']);	//escaping special characters and taking the input for surname change
				
				$username = $_SESSION['Username']; 	//getting the user's username from SESSION
				$parentquery = mysql_query("SELECT parent_id FROM parent WHERE username = '$username'");	//querying the database to find the corresponding parent_id to the session username
				$parentresult = mysql_fetch_row($parentquery);		//placing the results (parent_id) into an array
				$parent = $parentresult[0];		//assigning the parent_id to a variable
				
				 
				$editname = mysql_query("UPDATE parent SET name = '$name', surname = '$surname' WHERE parent_id = '$parent'");	//updating the specific fields with the new information
				
				if($editname)	//if the UPDATE was successful
					{
						echo "</br>";
						echo "<h1>Success</h1>";
						echo "<p>Your account was successfully changed. <a href=\"member.php\">Click here to return to your member page</a>.</p>";	//if UPDATE successful link to home
						echo "</br>";
					}
					
					else	//if an error occurred 
					{
						echo "<h1>Error</h1>";
						echo "<p>Sorry, your edit failed. Please go back and try again.</p>";    
					}       
			}
			else //what will display on the page as nothing has been POST
			{
				?>
					
					
				<div class="main">
					
					<div class="section" style="background-color:#E84C3D; position:relative; color: #2D3E50; height:auto; margin-top:0px">
						
						<div class="forms">
							<h1>Edit Profile</h1>
					 
							<p>Enter any changes you want to make below</p>
							
							<?php
							//getting username from SESSION
							$username = $_SESSION['Username'];
					 		
							$parentquery = mysql_query("SELECT * FROM parent WHERE username = '$username'");	//querying the database to find the corresponding parent_id to the session username
							$parentresult = mysql_fetch_row($parentquery);		//placing the answer into an accesible array
							$name = $parentresult[1];	//assigning a variable for use in the html form
							$surname = $parentresult[2];	//assigning a variable for use in the html form
							?>
					 
							 <!--creating a form for users to edit their profile info with-->
							<form method="post" action="edit_profile.php" id="editform" onsubmit="return validateEdit()">	<!--submitting the form data to the same file for processing-->
							<fieldset>
								<label>Name</label><input type="text" name="e_name" id="e_name" value="<?=$name?>">	<!-- value autofills the field with data extracted from database -->
								<span id="e_nameerror"></span>		<!-- space for javascript validation to place error message -->
								<br/>
								<label>Surname</label><input type="text" name="e_surname" id="e_surname" value="<?=$surname?>"/>	<!-- value autofills the field with data extracted from database -->
								<span id="e_snameerror"></span>		<!-- space for javascript validation to place error message -->
								</br>
								<input type="submit" name="submit" id="submit" value="Submit" />
							</fieldset>
							</form>
						</div>
					</div>
				</div>
				<?php
			}	//closing the php 
			?>
			
			<?php include("/layout/footer.php");?>		<!-- inserting html code for the footer from another php file -->
 
		</div>
	</body>
</html>