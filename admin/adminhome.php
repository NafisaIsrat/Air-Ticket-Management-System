<?php
	require_once("include/db_connect.php");
	session_start();
	if (isset($_SESSION['adminmail'])){
		$adEmail = $_SESSION['adminmail'];
	}
	else{
		echo "unauthorized access!";
		header("location:adminlogin.php");
	}
	?>
		


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin home</title>
	<link rel="stylesheet" a href ="css/homepgstyle.css"/>
  </head>
  <header>
	<div>
	</div>
  </header>
  <body>
		<center>
		<div class="container">
			<form action="logout.php" method="POST">
			<?php require_once("header.php");?>
				<button type="submit" id="logoutbutton" value="Logout" name="logoutBtn" class="logoutbtn"> Logout</button><br>
				
			</form>
		
		<form action="insertflight.php" method="POST">

		<h2> Admin Home </h2>
		<br>
	
					<table border="1px">
						<thead>
							<tr>
								<th> Flight no. </th>
								<th> Airlines Name </th>
								<th> Route  </th>
								<th> Departure Date </th>
								<th> Arrival Date </th>
								<th> View </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
						$id = "" ;
						
						if (isset($_GET['page']))
						{
							$page = $_GET['page'];
						}
						else{
							$page = 1;
						}
						
						$per_page= 5;
						$startingrow = ($page-1)*$per_page;
						
						
						$query = "SELECT * FROM flightdetails LIMIT $startingrow, $per_page";
						$data = mysqli_query($conn, $query);  
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
								<td><a href="updateflight.php?GetID=<?php echo $id?>"> Update </a></td>
								<td><a href="deleteflight.php?delID=<?php echo $id?>"> Delete </a> </td>
								

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
					
					<br>
					<?php
						$pgquery = "SELECT * FROM flightdetails";
						$pgresult = mysqli_query($conn, $pgquery);
						$rowcount = mysqli_num_rows($pgresult);
						
						$total_page = ceil($rowcount/$per_page);
						
						if($page>1){?>
							<a class="btnpg" href="adminhome.php?page=<?php echo ($page-1); ?>">Previous</a>
							<?php
						}
						for ($i=1; $i<$total_page; $i++){
							?>
							 <a class="btnpg" href="adminhome.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
							<?php
						}
						if ($i>$page){ ?>
							<a class="btnpg" href="adminhome.php?page=<?php echo ($page+1); ?>">Next</a><?php
						}							
					?>
					<br> <br> <br>
					<button type="submit" id="insertbutton" value="Insert" name="insertBtn" class="insertbtn"> Insert new flight </button><br><br>
	        
				</form>
			</div>
		</center>


  
	</body>
</html>