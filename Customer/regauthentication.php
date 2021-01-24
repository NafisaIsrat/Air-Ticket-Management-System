<?php

	require_once("include/db_connect.php");

  $fName = $lName = $uPass = $uEmail =$uPhone = $ucPass = $err = $uAge= $uGender = $uMailInDB = "" ;
	
	
	/* mysqli_real_escape_string() helps prevent sql injection */
  if($_SERVER["REQUEST_METHOD"]=="POST"){
	  if(isset($_POST['insertbutton'])){
	  if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['phoneno']) || empty($_POST['cpass']) || empty($_POST['gender']) || empty($_POST['age'])){
		  $err = "Please fill up all the fields.";
	  }
    else{
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
	}

	$sqlUserCheck = "SELECT email FROM customerinfo WHERE email = '$uEmail'";
    $result = mysqli_query($conn, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result)){
      $uMailInDB = $row['email'];
    }

    if($uMailInDB == $uEmail){
      $err = "Customer already exists!";
    }
	else if($uPass != $ucPass){
      $err = "Password field does not match!";
    }
    else{
      $sql = "INSERT INTO customerinfo (firstname, lastname, email, password, phoneno, gender, age)
              VALUES ('$fName','$lName','$uEmail', '$uPassToDB', '$uPhone', '$uGender', '$uAge');";

      $result= mysqli_query($conn, $sql);
	  if ($result){
				header("location: searchflight.php");
			}
			else {
				echo mysqli_error($conn);
				header("location: registration.php");
				
			}
    }
  }
}

?>