<?php include "config.php"; //allows access to the config file for access to database?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
	<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
		<title>DM Academy Log-In</title>	<!-- page title -->
		<link rel="stylesheet" href="mystyle.css" type="text/css" />	<!-- linking to an external CSS style sheet -->
		<script type="text/javascript" src="../JS/myjs.js"></script>	<!-- linking to an external Javascript file-->
	</head>  
	<body>  
		<div class ="container">
		
				<?php include("/layout/header.php");?>	<!-- including general header as we know person is not logged in -->
				<?php include("/layout/nav.php");?>		<!-- including the navigation bar html code -->
				
				<div class="main">
					<div class="section" style="background-color:#E84C3D; position:relative; color: #2D3E50; height:500px">
						
						<div class="forms">
						   <h1>Login</h1> 
								<!-- form for member login -->
								<form method="post" action="member.php" name="loginform" id="loginform" onsubmit="return validateLogin()">	<!-- POST to php validation page. On submit javascript validation -->
									<fieldset>
										<label for="username">Username:</label><input type="text" name="username" id="username" />
										<span id="usernameerror"></span>	<!-- space for javascript to insert an error message -->
										</br>
										<label for="password">Password:</label><input type="password" name="password" id="password" /></br>
										<span id="passworderror"></span>	<!-- space for javascript to insert an eror message -->
										</br>
										<input type="submit" name="login" id="login" value="Login" />
									</fieldset>
								</form>
						</div>
					</div>
			</div>
			
			<?php include("/layout/footer.php");?>	<!-- including the html code for the footer -->
		</div>
	</body>
</html>

