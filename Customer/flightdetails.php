<?php
	require_once("include/db_connect.php");
	
		session_start();
		if(isset($_GET['GetID'])){
			$p_id = $_GET['GetID'];
		}
	$adults = $children = "";
						
	$adults= $_SESSION['no_of_adult'];
	$children = $_SESSION['no_of_children'];
						
    $query = "SELECT * FROM flightdetails WHERE id = '$p_id'";
	$data = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($data);
	$flno = $row["flightno"];
	$flairname = $row["airlinesname"];
	$fldeparture = $row["departure"];
	$fldestName = $row["destination"];
	$fldeptdate = $row["departuredate"];
	$flarrivaldate = $row["arrivaldate"];
	$flclass = $row["class"];
	$flprice = $row["price"];
	$fair = ((float)$adults*(float)$flprice)+(((float)$children*(float)$flprice*50)/100);

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flight Details</title>
	<link rel="stylesheet" a href ="css/fdetails.css"/>
	
  </head>
  <body>
	<center>
		<div class="container">
			<?php
			if (isset($_SESSION['usermail'])){?>
			<form action="logout.php" method="POST">
			<?php require_once("header.php");?>
			<button type="submit" value="Logout" name="logoutBtn" class="loginbtn"> Logout </button> <br>
			</form><?php
			}else{?>
			<form action="customerlogin.php" method="POST">
			<p class="paragraph"> Online Airline Ticket Reservation </p>
			<button type="submit" id="loginbutton" value="Login" name="loginBtn" class="loginbtn"> Login</button>
			<button type="submit" id="regibutton" value="Register" name="registerBtn" class="loginbtn"> Register </button> <br>
			</form><?php }?>
			
			<form action="" method="POST">
			<h2> Flight Details </h2>
			<br>
			<label for="departure">Journey Date:</label>
		    <input type="text" name="depdate" value="<?php echo $fldeptdate?>" placeholder="From" class="input"/>
		
			<table border="1px">
				<thead>
					<tr>
					<th> Flight no. </th>
					<th> Airlines  </th>
					<th> Route </th>
					<th> Departure Time </th>
					<th> Arrival Time </th>
					<th> Amount to pay(in BDT) </th>


					</tr>
				</thead>
				<tbody>
					<?php
						
						$query2 = "SELECT * FROM flightschedule WHERE flightno = '$flno'";
						$result = mysqli_query($conn, $query2);
						
						if(mysqli_num_rows($result) > 0){
							while($f_row = mysqli_fetch_array($result) ){
						?>
							<tr>

								<td><?php echo $flno; ?> </td>
								<td><?php echo $flairname; ?> </td>
								<td><?php echo $fldeparture."-".$fldestName; ?> </td>
								<td><?php echo $f_row["departuretime"]; ?> </td>
								<td><?php echo $f_row["arrivaltime"]; ?> </td>
								<td><?php echo $fair; ?> </td>
								

							</tr>

						<?php }} 
						else {
						?>
							<tr>
								<td>Records not found!</td>
							</tr>
						<?php
						} 
						    ?>
				</tbody>		
			</table>
			<br> <br> <br>
			<button type="submit" id="continuebutton" value="Continue" name="continueBtn" class="continuebtn"> Continue </button><br><br>
	        
			</form>
		</div>
	</center>
  
  </body>
</html>