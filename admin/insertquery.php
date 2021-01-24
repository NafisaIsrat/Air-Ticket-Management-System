<?php
	require_once("include/db_connect.php");
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['insertbutton'])){
		if(empty($_POST['flightNo']) || empty($_POST['airlinesname']) || empty($_POST['departure']) || empty($_POST['destination']) || empty($_POST['deptdate']) || empty($_POST['arrivaldate']) || empty($_POST['class']) || empty($_POST['pricePerSeat'])){
			echo "Fill all the fields";
		}
		else {
			$fl_no  = $_POST['flightNo'];
			$fl_name = $_POST['airlinesname'];
			$fl_departure = $_POST['departure'];
			$fl_destination = $_POST['destination'];
			$fl_deptdate = $_POST['deptdate'];
			$fl_depttime = $_POST['depttime'];
			$fl_arrdate = $_POST['arrivaldate'];
			$fl_arrtime = $_POST['arrivaltime'];
			$fl_class = $_POST['class'];
			$fl_price = (float)$_POST['pricePerSeat'];
		
			$sql = "INSERT INTO flightdetails (flightno, airlinesname, departure, destination, departuredate, arrivaldate, class, price)
              VALUES ('$fl_no','$fl_name','$fl_departure','$fl_destination', '$fl_deptdate', '$fl_arrdate', '$fl_class', '$fl_price');";
			$sql .= "INSERT INTO flightschedule (flightno, departuretime, arrivaltime) VALUES ('$fl_no','$fl_depttime','$fl_arrtime');"; 
			  $result = mysqli_multi_query($conn, $sql);
		
			if ($result){
				header("location: adminhome.php");
			}
			else {
				echo mysqli_error($conn);
				echo " insert failed!";
			}
		}
	}
	else {
		header("location: updateflight.php");
	}
		
	}

?>