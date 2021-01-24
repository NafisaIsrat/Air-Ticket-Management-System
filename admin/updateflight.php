<?php
	require_once("include/db_connect.php");
	session_start();
	if (isset($_SESSION['adminmail'])){
		$adEmail = $_SESSION['adminmail'];
	$a_id = $_GET['GetID'];
	$sql = "SELECT * FROM flightdetails WHERE id = '$a_id'";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)){
		$flid = $row['id'];
		$flno = $row['flightno'];
		$flairname = $row['airlinesname'];
		$fldeparture = $row['departure'];
		$fldestName = $row['destination'];
		$fldeptdate = $row['departuredate'];
		$flarrivaldate = $row['arrivaldate'];
		$flclass = $row['class'];
		$flprice = $row['price'];
	}
	$sql1 = "SELECT * FROM flightschedule WHERE flightno = '$flno'";
	$result1 = mysqli_query($conn, $sql1);
	
	while ($nrow = mysqli_fetch_array($result1)){
		$fdepttime = $nrow['departuretime'];
		$farrivaltime = $nrow['arrivaltime'];
	}
	}
	else{
		echo "unauthorized access!";
		header("location:adminlogin.php");
	}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Flight</title>
	<link rel="stylesheet" a href ="css/insertformstyle.css"/>
	
  </head>
  <body>
	
	 <div class="container">
		<form action="updatequery.php?ID= <?php echo $flid; ?>" method="POST">
		<?php require_once("header.php");?>
		<h2> Update flight </h2>
		<label for="flightNo">Flight No. </label>
		<input type="text" name="flightNo" value="<?php echo $flno; ?>" placeholder="Flight No." class="input"/><br>
		
		<label for="airlinesname">Airlines Name: </label>
		<input type="text" name="airlinesname" value="<?php echo $flairname; ?>" placeholder="Flight Name" class="input"/><br>
		
		<label for="departure">From: </label>
		<input type="text" name="departure" value="<?php echo $fldeparture; ?>" placeholder="From" class="input"/>
		<label for="destination">To: </label>
		<input type="text" name="destination" value="<?php echo $fldestName; ?>" placeholder="To" class="input"/><br>
		
		<label for="deptdate">Departure date: </label>
		<input type="date" name="deptdate" value="<?php echo $fldeptdate; ?>" placeholder="Departure date" class="input"/>
		<label for="depttime">Departure Time: </label>
		<select name="depttime" value="<?php echo $fdepttime; ?>" placeholder="Departure Time" class="input">
				    <option value="" disabled selected>Select a Time</option>
                <option value="08:00AM">08:00AM</option>
                <option value="09:00AM">09:00AM</option>
                <option value="10:00AM">10:00AM</option>
				<option value="12:00PM">12:00PM</option>
				<option value="02:00PM">02:00PM</option>
				<option value="05:00PM">05:00PM</option>
				<option value="06:00PM">06:00PM</option>
				<option value="08:00PM">08:00PM</option>
        </select><br>
		
		<label for="arrivaldate">Arrival date: </label>
		<input type="date" name="arrivaldate" value="<?php echo $flarrivaldate; ?>" placeholder="Arrival Date" class="input"/>
		<label for="arrivaltime">Arrival Time: </label>
		<select name="arrivaltime" value="<?php echo $farrivaltime; ?>" placeholder="Arrival Time" class="input">
				    <option value="" disabled selected>Select a Time</option>
                <option value="08:30AM">08:30AM</option>
                <option value="09:30AM">09:30AM</option>
                <option value="10:30AM">10:30AM</option>
				<option value="12:30PM">12:30PM</option>
				<option value="02:30PM">02:30PM</option>
				<option value="05:30PM">05:30PM</option>
				<option value="06:30PM">06:30PM</option>
				<option value="08:30PM">08:30PM</option>
        </select><br>
		
		<label for="seatNo">Seat Type: </label>
		<input type="text" name="seattype" value="<?php echo $flclass; ?>" placeholder="Class" class="input"/><br>
		
		<label for="pricePerSeat">Price per seat: </label>
		<input type="text" name="pricePerSeat" value="<?php echo $flprice; ?>" placeholder="Price" class="input"/><br><br>
		<button type="submit" name="updatebutton" class="button" >Update</button><br>
		
		
		</form>
		
	 </div>
	
	 </body>
</html>