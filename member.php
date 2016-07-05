<?php include "config.php"; //allows access to the config file for access to database?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
		<title>DM Academy Member Page</title>	<!-- page title -->
		<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- link to the style sheet --> 
	</head>  
	<body>  
	<div class= "container">
		<?php
			//checking to see if the user is logged in by checking if the session variables are assigned 
			if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
			{
				 include("/layout/headerloggedin.php"); 	//including the logged in header html code
				 include("/layout/nav.php");				//including the navigation bar html code
				?>	
			
				
			<div class="main">
					
				<div class= "section" style=" height: auto">
					 <h1>Member Area</h1>
					 <!-- displaying the username's username and email -->
					 <p>You are <code><?=$_SESSION['Username']?></code> and your email address is <code><?=$_SESSION['email']?></code>. </p>
					 
					 <!-- link to page for class sign up -->
					 <a href= "class_sign_up.php"><p style="color:yellow">>>Sign your child up for classes<<</p></a>
					
					<!-- link to page that allows user edit profile -->
					 <a href= "edit_profile.php"><p style="color:yellow">>>Edit Profile<<</p></a>
			
					 <h1><?=$_SESSION['Username']?>'s Bookings</h1>		<!--title using the username's session username -->
					 </br>
					 <!-- creating a table to display the member's bookings, if they have been made -->
					 <table class = "membertable">
						<tr>
							<!-- setting all of the column headers -->
							 <td style="width:25%">Child's Name</td>
							 <td style="width 10%">Age</td>
							 <td style="width:15%">Class</td>
							 <td style="width:25%">Start Date/Time</td>
							 <td style="width:10%">Price (euro)</td>
							 <td style="width:15%">Edit</td>
							 
								<?php
								$username = $_SESSION['Username'];	//assigning variable to session username 
								 
								$parentquery = mysql_query("SELECT parent_id FROM parent WHERE username = '$username'");	//querying the database to find the corresponding parent_id to the session username
								$parentresult = mysql_fetch_row($parentquery);		//getting the results from the query in an array 
								$parent = $parentresult[0];		//getting the parent_id from the array 
								$result = mysql_query("SELECT * FROM child WHERE parent_id = '$parent'");	//getting all information from the database table child that is linked to the user's parent_id
								
								//loop over the results of the array to display a new table row for each record 
								 while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
									$classid = $row["class_id"];	//assigning variable to the class_id found in each record 
									$classquery = mysql_query("SELECT class_name, start_time, cost  FROM classlist WHERE class_id = $classid");		//extracting data about the class from the classlist table using the class_id
									$classresult = mysql_fetch_row($classquery);	//returning the results in an array
									$cname = $classresult[0];	//class name placed in new variable 	
									$ctime = $classresult[1];	//class time placed in new variable 
									$ccost = $classresult[2];	//class cost placed in new variable 
									echo "<tr>";
									echo "<td>".$row["name"]. " " .$row["surname"]."</td>";	//displaying new column with child's name and surname taken from database
									echo "<td>".$row["age"]."</td>";	//displaying new column with child's age
									echo "<td>".$cname."</td>";		//displaying new column with class name that child is signed up for 
									echo "<td>".$ctime."</td>";		//displaying class time 
									echo "<td>".$ccost."</td>";		//displaying class cost 
									echo "<td><a style=\"color:yellow\">Delete</a></td>";	//a delete button without functionality yet
									echo "</tr>";
								}
								echo "</table>";	//closing the table 
								?>
				</div>
			
			</div>
				  
			<?php
			}
			//starts the process of logging the user in as a member by checking to see if the login fields were filled in 
			elseif(!empty($_POST['username']) && !empty($_POST['password']))
			{
				$username = mysql_real_escape_string($_POST['username']); //removes unwanted parts of what have been entered in field
				$password = md5(mysql_real_escape_string($_POST['password'])); //removes unwanted parts and encrypts the password entered
				 
				$checklogin = mysql_query("SELECT * FROM parent WHERE username = '".$username."' AND password = '".$password."'"); //database query to find all users who match data entered
				 
				if(mysql_num_rows($checklogin) == 1)	//checking to see if any matches are found for that user
				{
					$row = mysql_fetch_array($checklogin);	//getting an array of the data returned from query
					$email = $row['email'];		//assigning a variable to the users email
					 
					//setting the session
					$_SESSION['Username'] = $username;	//storing user's username in session
					$_SESSION['email'] = $email;	//storing user's email in session
					$_SESSION['LoggedIn'] = 1;	//setting the user as being logged in for this session
					 
					echo "<h1>Success</h1>";
					echo "<p>We are now redirecting you to the member area.</p>";
					echo "<meta http-equiv='refresh' content='2;member.php' />";	//redirected to the members page
				}
				else //when no matches of the details entered are found
				{
					echo "<h1>Error</h1>";
					echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";	//given link to redirect to home page to try login again
				}
			}
			
			//if the user's login was not successful 
			else
			{
				include("/layout/header.php");	//including the html code for a not logged in header 
				include("/layout/nav.php");		//including the html code for the navigation bar 
				?>
					<div id="main">
						
						<div id="section">
						
							</br>
							<h1>Error</h1>
							<p>Your login was not successful, please return to <a href="login.php">login</a></p>	<!-- giving the user a link to try the login again -->
							</br>
						</div>
					</div>
			<?php
			}
			?>	 
		 <?php include("/layout/footer.php");?>		<!-- including the html code for the footer -->
		 
	</div>
	</body>
</html>