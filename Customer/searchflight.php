<?php
		require_once("include/db_connect.php");
		session_start();
		
		if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(isset($_POST['continuebtn'])){
			if(!empty($_POST['adults']) && !empty($_POST['children'])){
				$_SESSION['no_of_adult']=$_POST['adults'];
				$_SESSION['no_of_children']=$_POST['children'];
				echo "session is set";
			}
		}
		}
		
		
			
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Flight</title>
	<link rel="stylesheet" a href ="css/searchstyle.css"/>
	<link rel="stylesheet" a href="jquery-ui.css">
	<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="test/javascript">
		$( function() {
            $( "#to" ).datepicker();
        } );
		</script>
  </head>
  
  <body>
     
	 <div class="container">
			<?php
			if (isset($_SESSION['usermail'])){?>
			<form action="logout.php" method="POST">
			<?php require_once("header.php");?>
			
			<button type="submit" value="Logout" name="logoutBtn" class="loginbtn"> Logout </button> <br>
			</form><?php
			}else{?>
			<form action="customerlogin.php" method="POST">
				<p class ="paragraph"> Online Airline Ticket Reservation </p>
				<button type="submit" id="loginbutton" value="Login" name="loginBtn" class="loginbtn"> Login</button>
				<button type="submit" id="regibutton" value="Register" name="registerBtn" class="loginbtn"> Register </button> <br>
			</form><?php }?>
		
		<form action="flightlist.php" method="POST">

		<h2> Search Flight </h2>
		<label for="depDate">Departure Date: </label>
		<input type="date" id="to" name="deptdate" placeholder="Departure Date" class="input"/><br>
		
		<label for="departure">From: </label>
		<select name="departure" class="input">
				    <option value="" disabled selected>Select Departure</option>
                <option value="DHAKA">Dhaka</option>
                <option value="CHITTAGONG">Chittagong</option>
                <option value="RAJSHAHI">Rajshahi</option>
                   </select><br><br>
				   
		<label for="destination" >To: </label>
		<select name="destination" class="input">
				    <option value="" disabled selected>Select Destination</option>
                <option value="DHAKA">Dhaka</option>
                <option value="CHITTAGONG">Chittagong</option>
                <option value="RAJSHAHI">Rajshahi</option>
        </select> <br>
		
		
		
		<label for="passengers">Passengers: </label> 
		<label for="adults" style = "text-indent : 5em;">Adults: </label>
		<input type="number" name="adults" value="0" placeholder="adults" class="input"/> <br>
		<label for="children" style = "text-indent : 5em;">Children: </label>
		<input type="number" name="children" value="0" placeholder="children" class="input"/> <br>
		
		
		<label for="class">Cabin class: </label>
		<input type="radio" name="class" value="Economy" class=""> Economy 
		<input type="radio" name="class" value="Business" class="" style = "text-indent : 5em;"> Business <br><br>
		
		
		<button type="submit" name="continuebtn" value="Continue" class="continuebtn" > Check Schedule </button><br>
		
		
		</form>
		
	 </div>
	
   </body>
</html>