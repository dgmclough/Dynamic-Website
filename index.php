<?php include "config.php"; //starts session and allows access to the config file for access to database?>	

<html>

	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
			<title>DM Academy Home</title>	<!-- page title -->
			<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- linking to the external CSS file -->
			<script type="text/javascript" src="myjs.js"></script>	<!-- linking to the external Javascript file -->
	</head>
	
	<body>

	<div class= "container">
		<?php
			//checking the SESSION variables to see if the user is logged in 
			if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
			{
				include("/layout/headerloggedin.php");	//includes this header if logged in 
			}
			
			else
			{
				include("/layout/header.php");		//includes this header if not logged in 
			}
				?>
				
		<?php include("/layout/nav.php");?>		<!-- includes this html code for navigation bar from another php file -->
		
		<div class= "main">
		
			<div class= "section" style="margin-top:0px; height: 500px">
			
				<img src="images/profile.png" alt="dara">
				</br>
				<h1 style="font-size:60px">DM TENNIS</h1>
				</br>
				<h2 style="font-size:25px">Ireland's #1 Tennis Academy</h2>
			
			</div>
			
			<div class="section" style="background-color:white; position:relative; color: #2D3E50; height:500px">
				<h1 style="color: #2D3E50">
					NEW CLASSES AVAILABLE!!
				</h1>
				
				<div class="imagearea">
					
					<!-- linking the images to the new class information page -->
					<a href="classes.php"><img src="images/red.jpg" alt="red"></a> 
					<a href="classes.php"><img src="images/ORANGE.jpg" alt="orange"></a>
					<a href="classes.php"><img src="images/GREEN.jpg" alt="green"></a>
				
					</br>
					</br>
					<p>Click a coloured ball to find out more about classes!</p>
					
					<!-- link to the registration page-->
					<p><a href="register.php" style="text-decoration:none; color:#E84C3D">Create an account</a> to register your child for a class!</p>
					<!-- link back to top of page -->
					<p><a href="index.php" style="text-decoration:none; color:#E84C3D">^ Back to top ^</a></p>
				</div>
				
			</div>
			
			<div class= "section" style="background-color:#2D3E50; height:1100px; margin-bottom:0px">
				<a name="about"></a>
				</br>
				</br>
				<h2 style="font-size: 40px; color: white">ABOUT DM TENNIS</h2>
				</br>
	
				<p>
					DM TENNIS is Ireland's #1 Tennis Academy. It was founded in 2010 by
					former professional tennis player and Irish Davis Cup player, Dara McLoughlin.
					Since its founding the Academy has grown in quantity and quality. Currently,
					DM TENNIS operates out of three of the top tennis clubs in Dublin.
				</p>
				
				<p>
					Working along side Dara are two other top Irish coaches, Derek Boland and
					Donal Glennon. Over the past five years they have refined their skills and 
					used their experience to develop many of Ireland's best junior players.
				</p>
				
				<p>
					Membership of the DM TENNIS Elite Academy is strictly done on a selection basis.
					However, this year we have decided to open up pre-Academy classes for 
					developing kids at a young age with hopes for them to progress into the Elite 
					Academy. These classes have been organised into RED (6-8yr olds), ORANGE (9yr olds),
					and GREEN (10-11yr olds). 
				</p>
				
				<p>
					To book a place for your child in a class, please <a href="register.php" id="section_link">Register</a> with us first, and then
					Login to your account. After you login you will be able to make new bookings and 
					cancel them if necessary.
				</p>
				
				<div id="location">
					<h3>Where are we?</h3>
					</br>
					<!-- using an iframe to display a google map for the address and location of club -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2383.843539493359!2d-6.278118784660402!3d53.310248285116245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670bf788b722b3%3A0xe2118674515c7ea5!2sRathgar+Tennis+Club!5e0!3m2!1sen!2sie!4v1447337881152" width="450" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					
				</div>
				
				<p style="padding-left:400px"><a href="index.php" style="text-decoration:none; color:white">^ Back to top ^</a></p>
			</div>
			
			<a name="contact"></a>
			<div class="section">
			
				</br></br>
				<h2 style="font-size: 40px; color:white">CONTACT</h2>
				
				<div class="forms">
					<!-- a contact form that allows users sent a message to the company email -->
					<form method="post" action="contact.php" id="contact" onsubmit="return validateContact()">	<!-- POST to external file for php processing. On submission gets javascript validation-->
						<fieldset>
							<label>First name</label>
							<input type="text" name= "c_name" id="c_name">
							<span id="nameerror"></span>	<!-- creating space for javascript to insert an error message -->
							</br>
							<label>Email Address</label>
							<input type="text" name= "c_email" id="c_email">
							<span id="emailerror"></span>	<!-- creating space for javascript to insert an error message -->
							</br>
							<label>Message</label>
							</br>
							<textarea id="comment" name="comment"></textarea>
							<span id="commenterror"></span>		<!-- creating space for javascript to insert an error message -->
							</br>
							</br>
							<input type="submit" id="submit" value="Submit">
					  </fieldset>
					</form>
					<p style="padding-left:165px"><a href="index.php" style="text-decoration:none; color:white">^ Back to top ^</a></p>
				</div>
			</div>

		</div>
	
		<?php include("/layout/footer.php");?>	<!-- including the html code for footer from external php file -->
		
	</div>
	</body>
	
</html>
				
	
				