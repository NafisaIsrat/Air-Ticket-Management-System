<?php
  require_once("include/db_connect.php");
	if(isset($_GET['delID'])){
		$a_id = $_GET['delID'];
		$sql = "DELETE FROM flightdetails WHERE id = '$a_id'";
        $result = mysqli_query($conn, $sql);
		if ($result)
		{
			header("location: adminhome.php");
		}
		else {
			echo " delete failed!";
		}
	}
	else {
		header("location: updateflight.php");
	}
  
			
?>