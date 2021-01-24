<?php

	require_once("include/db_connect.php");

  $fName = $lName = $uPass = $uEmail =$uPhone = $ucPass = $err = $uAge= $uGender = $uMailInDB = "" ;
	
	
	/* mysqli_real_escape_string() helps prevent sql injection */
  if($_SERVER["REQUEST_METHOD"]=="POST"){
	  if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['phoneno']) || empty($_POST['cpass']) || empty($_POST['gender']) || empty($_POST['age'])){
		  $err = "Please fill up all the fields.";
	  }
    if(!empty($_POST['fname'])){
      $fName = mysqli_real_escape_string($conn, $_POST['fname']);
    }
    if(!empty($_POST['lname'])){
      $lName = mysqli_real_escape_string($conn, $_POST['lname']);
    }
    if(!empty($_POST['email'])){
      $uEmail = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(!empty($_POST['pass'])){
      $uPass = mysqli_real_escape_string($conn, $_POST['pass']);
      $uPassToDB = password_hash($uPass, PASSWORD_DEFAULT);
    }
    if(!empty($_POST['phoneno'])){
      $uPhone = mysqli_real_escape_string($conn, $_POST['phoneno']);
    }
	if(!empty($_POST['cpass'])){
      $ucPass = mysqli_real_escape_string($conn, $_POST['cpass']);
      $ucPassToDB = password_hash($uPass, PASSWORD_DEFAULT);
    }
	if(!empty($_POST['gender'])){
      $uGender = mysqli_real_escape_string($conn, $_POST['gender']);
    }
	if(!empty($_POST['age'])){
      $uAge = mysqli_real_escape_string($conn, $_POST['age']);
    }


    $sqlUserCheck = "SELECT email FROM customerinfo WHERE email = '$uEmail'";
    $result = mysqli_query($conn, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result)){
      $uMailInDB = $row['email'];
    }

    if($uMailInDB == $uEmail){
      $err = "Customer already exists!";
    }
	else if($uPass == $ucPass){
      $err = "Password field does not match!";
    }
    else{
      $sql = "INSERT INTO customerinfo (firstname, lastname, email, password, phoneno, gender, age)
              VALUES ('$fName','$lName','$uEmail', '$uPassToDB', '$uPhone', '$uGender', '$uAge');";

      mysqli_query($conn, $sql);
    }
  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration: </title>
	<link rel="stylesheet" a href ="css/regstyle.css"/>
  </head>
  <body>
    <div class="container">
		<form action="regauthentication.php" method="POST">
		<?php require_once("header.php");?>
		<h2> User Registration </h2>
		<label for="fname">First Name: </label>
		<input type="text" name="fname" placeholder="first name" class="input"/><br>
		
		<label for="lname">Last Name: </label>
		<input type="text" name="lname" placeholder="last Name" class="input"/><br>
		
		<label for="email">Email: </label>
		<input type="text" name="email" placeholder="e-mail" class="input"/>
		<label for="phone">Phone: </label>
		<input type="text" name="phoneno" placeholder="phone" class="input"/><br>
		
		<label for="pwd">Password: </label>
		<input type="password" name="pass" placeholder="password" class="input"/>
		<label for="phone">Confirm Password: </label>
		<input type="password" name="cpass" placeholder="confirm password" class="input"/><br>
		
		
		<label for="gnder">Gender: </label>
		<input type="radio" name="gender" value="male" class=""> Male 
		<input type="radio" name="gender" value="female" class="" style = "text-indent : 5em;"> Female <br><br>
		
		<label for="age">Age: </label>
		<input type="number" name="age" placeholder="Age" class="input"/><br><br>
		<button type="submit" name="insertbutton" class="button" >Register</button>
        <span style="color:red;"><?php echo $err; ?></span>
        <label class="linklabel"><b>Or Log In <a href="customerlogin.php" class="linklabel">here</a></b></label>
		
		
		</form>
		
	 </div>
  </body>
</html>
