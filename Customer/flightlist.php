<?php
   
		session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Flight List</title>
	<link rel="stylesheet" a href ="css/fliststyle.css"/>
	
	
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
					
					<h2> Flight List </h2>
					<br>
	
					<table border="1px">
						<thead>
							<tr>
								<th> Flight no. </th>
								<th> Airlines Name </th>
								<th> Route  </th>
								<th> Departure </th>
								<th> Arrival </th>
								<th> Class </th>
								<th> Price(in BDT) </th>
								<th> View Details</th>
							</tr>
						</thead>
						<tbody>
						<?php
						require_once("include/db_connect.php");
						$deptDate = $deptName = $destName= $class = "" ;
						if($_SERVER["REQUEST_METHOD"]=="POST"){
						if(isset($_POST['continuebtn'])){
							if(!empty($_POST['adults']) && !empty($_POST['children'])){
								$_SESSION['no_of_adult']=$_POST['adults'];
								$_SESSION['no_of_children']=$_POST['children'];
							}
							if(!empty($_POST['deptdate']) && !empty($_POST['departure']) && !empty($_POST['destination']) && !empty($_POST['class'])){
							$deptDate = mysqli_real_escape_string($conn, $_POST['deptdate']);
							$deptName = mysqli_real_escape_string($conn, $_POST['departure']);
							$destName = mysqli_real_escape_string($conn, $_POST['destination']);
							$class = mysqli_real_escape_string($conn, $_POST['class']);
							}
							else {
								echo "Please Enter all the sections.";
							}
						}
						}
		
						$query = "SELECT * FROM flightdetails WHERE departuredate = '$deptDate' AND departure = '$deptName' AND destination = '$destName' AND class = '$class'; ";
						$data = mysqli_query($conn, $query); 
						$rowno = mysqli_num_rows($data);
						
						if(mysqli_num_rows($data) > 0){
							while($row = mysqli_fetch_array($data)){
								$id = $row["id"];
						?>
							<tr>

								<td><?php echo $row["flightno"]; ?> </td>
								<td><?php echo $row["airlinesname"]; ?> </td>
								<td><?php echo $row["departure"]."-".$row["destination"]; ?> </td>
								<td><?php echo $row["departuredate"]; ?> </td>
								<td><?php echo $row["arrivaldate"]; ?> </td>
								<td><?php echo $row["class"]; ?> </td>
								<td><?php echo $row["price"]; ?> </td>
								<td><a href="flightdetails.php?GetID=<?php echo $id?>"> view </a></td>
								

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