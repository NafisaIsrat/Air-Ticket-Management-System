<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Airline Reservation System</title>
	<link rel="stylesheet" a href ="css/mainstyle.css"/>
	
	
  </head>
  <body>
  <center>
	<div class="container">
		<?php require_once("header.php");?>
		<h2> Welcome to our project. </h2>
		
		<label><b>Search flights: <a href="Customer/searchflight.php">Search</a></b></label><br>
		<label><b>Login for bookings :<a href="Customer/customerlogin.php">Login</a></b></label><br>
		<label><b>Register new customers:<a href="Customer/registration.php">Register</a></b></label><br>
		
		<label><b>Login for admins: <a href="admin/adminlogin.php">Login</a></b></label><br><br><br>
		
		
	<?php require_once("footer.php");?>
	</div>
	</center>

	
  
  </body>
</html>