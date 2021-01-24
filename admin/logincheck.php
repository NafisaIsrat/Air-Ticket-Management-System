<?php

session_start();
require_once("include/db_connect.php");
if ($conn){
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['pass'];
		
		$sql = " SELECT * FROM adminlogin WHERE email = '$email' && password = '$password' ";
		$data = mysqli_query($conn, $sql);
		if($data == 1){
			echo "login successful";
			$_SESSION['admin'] = $email;
			header('location:adminhome.php');
		} else {
			echo "login failed";
			header('location:adminlogin.php');
		}
			
}
}
else {
	echo "No connection!";
}

?>