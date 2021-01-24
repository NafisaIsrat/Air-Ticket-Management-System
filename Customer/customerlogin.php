<?php
	    
		require_once("include/db_connect.php");
		session_start();
		$uPass = $uEmail = $message = $true ="";

			/* mysqli_real_escape_string() helps prevent sql injection */
			if($_SERVER["REQUEST_METHOD"] == "POST"){
	
			if(!empty($_POST['email'])){
			$uEmail = mysqli_real_escape_string($conn, $_POST['email']);
			}
			if(!empty($_POST['pass'])){
			$uPass = mysqli_real_escape_string($conn, $_POST['pass']);
			}

		$sqlUserCheck = "SELECT * FROM customerinfo WHERE email = '$uEmail'";
		$result = mysqli_query($conn, $sqlUserCheck);
		$rowCount = mysqli_num_rows($result);

		if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['password'];

			if(password_verify($uPass, $uPassInDB)){
				$_SESSION['usermail'] = $row['email'];
				header("Location: searchflight.php");
			}
			else{
				$message = "Wrong Password!";
			}
		}
	}
}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Login</title>
	<link rel="stylesheet" a href ="css/cloginpage.css"/>
	
	
  </head>
  <body>
  <center>
	<div class="container">
	<form action="customerlogin.php" method="POST">
		<?php require_once("header.php");?>
		<h2> Customer login </h2><br>
		
		<label for="email" class="loginlabel"> E-mail: </label>
		<input type="text" name="email" placeholder="e-mail" class="input"/><br>
		<label for="pwd" class="loginlabel">Password: </label>
		<input type="password" name="pass" placeholder="password" class="input"/><br>
		<button type="submit" value="login" name="loginBtn" class="loginbtn"> Login</button>
		<span style="color:red"><?php echo $message . ' '. $true  ; ?></span>
		<label><b>Or Register <a href="registration.php">here</a></b></label>
	
	</form>
	</div>
	</center>

	
  
  </body>
</html>