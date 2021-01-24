<?php
  require_once("include/db_connect.php");
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['updatebutton'])){
		$fl_id = $_GET['ID'];
		$fl_no  = $_POST['flightNo'];
		$fl_name = $_POST['airlinesname'];
		$fl_departure = $_POST['departure'];
		$fl_destination = $_POST['destination'];
		$fl_deptdate = $_POST['deptdate'];
		$fl_depttime = $_POST['depttime'];
		$fl_arrdate = $_POST['arrivaldate'];
		$fl_arrtime = $_POST['arrivaltime'];
		$fl_class = $_POST['seattype'];
		$fl_price = $_POST['pricePerSeat'];
			  
		$sql = "UPDATE flightdetails SET flightno = '$fl_no', airlinesname = '$fl_name', departure = '$fl_departure', destination = '$fl_destination', departuredate = '$fl_deptdate', arrivaldate = '$fl_arrdate', class = '$fl_class', price = '$fl_price' WHERE id = '$fl_id'";
		$result = mysqli_multi_query($conn, $sql);
		if ($result)
		{
			header("location: adminhome.php");
		}
		else {
			echo " update failed!" . mysqli_error($conn);
		}
	}
	else {
		header("location: updateflight.php");
	}
  }
?>