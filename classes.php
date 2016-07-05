<?php include "config.php"; //allows access to the config file for access to database?>	
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
		<title>DM Academy Orange</title>	<!-- page title  -->
		<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- linking the external CSS file  -->
	</head>  
	<body>  
		<div class ="container">
		
				<?php
					//checks to see if the Session variables have been set to indicate the user is logged in as a member
					if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
					{
						include("/layout/headerloggedin.php");	//displays if the user is logged in 
					}
					
					else
					{
						include("/layout/header.php");	//displays an alternative header if the user is not logged in 
					}
						?>				
						
				<?php include("/layout/nav.php");?>	<!-- includes the html for the navigation bar from separate php file -->
				
				<div class="main">
				
						<div class="section" style="padding-top: 0px; height:20px">
							
						</div>
					
						<div class="section" style="background-color:white">
						
							<h1 style="color:#2D3E50; margin-bottom: 5px">All classes start January 2016</h1>	<!-- large title  -->
						
							
						<?php 
						
							$max = 16;	//setting a variable for the maximum number of children allowed to register for a class
							
							$redclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 1");	//counting the number of children registered for the Red Class
							$redclassresult = mysql_fetch_row($redclassquery);	//return the results in an array
							$numred = $redclassresult[0];	//accessing the result from the array, [0] as it is the first and only thing in the array
							$availred = $max - $numred;	//get available places by subtracting the number of registered from the max		
							

							//the same process is repeated for the orange class to find the number of available spaces
							$orangeclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 2");
							$orangeclassresult = mysql_fetch_row($orangeclassquery);
							$numorange = $orangeclassresult[0];
							$availorange = $max - $numorange;
							
							//the same process is repeated for the green class to find the number of available spaces
							$greenclassquery = mysql_query("SELECT COUNT(class_id) FROM child WHERE class_id = 3");
							$greenclassresult = mysql_fetch_row($greenclassquery);
							$numgreen = $greenclassresult[0];
							$availgreen = $max - $numgreen;
							?>
							
							<div class="classes" style="background-color: #FE0000">
								<h2>RED CLASS</h2></br>
								<h3>Only <?=$availred?> places left!!</h3></br></br>	<!-- the variable for number of available places is placed among the html -->
								<h3>AGES: 6-8</h3></br></br>
								<h3>12 WEEK TERM</h3></br></br>
								<h3>MONDAYS @ 3PM</h3></br></br>
								<h3>€120</h3>
								<p>*you must register first before you can book online</p>
								<a href="register.php"><h3>REGISTER</h3></a>		<!-- link to bring the user to the register page -->
								
							</div>
							
							<div class ="classes" style="background-color: #FFAA01">
								<h2>ORANGE CLASS</h2></br>
								<h3>Only <?=$availorange?> places left!!</h3></br></br>		<!-- the variable for number of available places is placed among the html -->
								<h3>AGES: 9</h3></br></br>
								<h3>12 WEEK TERM</h3></br></br>
								<h3>WEDNESDAYS @ 3PM</h3></br></br>
								<h3>€120</h3>
								<p>*you must register first before you can book online</p>
								<a href="register.php"><h3>REGISTER</h3></a>
							</div>
							
							<div class ="classes" style="background-color: #45D400">
								<h2>GREEN CLASS</h2></br>
								<h3>Only <?=$availgreen?> places left!!</h3></br></br>		<!-- the variable for number of available places is placed among the html -->
								<h3>AGES: 10-11</h3></br></br>
								<h3>12 WEEK TERM</h3></br></br>
								<h3>FRIDAYS @ 3PM</h3></br></br>
								<h3>€120</h3>
								<p>*you must register first before you can book online</p>
								<a href="register.php"><h3>REGISTER</h3></a>
							</div>
						
				
						</div>
					
				
					
				</div>
				
				
		<?php include("/layout/footer.php");?>	<!-- include the html code for the footer from a separate php file -->
				
		</div>
		
	</body>
	
</html>