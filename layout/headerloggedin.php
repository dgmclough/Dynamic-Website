<!-- div for the page heading section when a user is logged in-->
<!-- included on everypage -->
<div class= "banner">

	<!-- separate div to conatin the company logo -->
	<div class= "logo">
	
		<h1>DM TENNIS</h1>
	
	</div>
	
	<!-- separate div that contains the buttons-->
	<div class= "buttons">
		
		<!-- table used for layout of the buttons -->
		<table style="border= none">
			<tr>
				<td><a href="logout.php">LOGOUT</a></td>	<!-- link to logout user -->
			</tr>
			<tr>
				<td><a href="member.php"><code><?=$_SESSION['Username']?></code></td>	<!-- link to user's homepage -->
			</tr>	
		</table>
	
	</div>

</div>