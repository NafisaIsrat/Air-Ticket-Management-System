<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Flight</title>
	<link rel="stylesheet" a href ="css/insertformstyle.css"/>
	
  </head>
  <body>
	
	 <div class="container">
		<form action="insertquery.php" method="POST">
		<?php require_once("header.php");?>
		<h2> Insert flight </h2>
		<label for="flightNo">Flight No. </label>
		<input type="text" name="flightNo" placeholder="Flight No." class="input"/><br>
		
		<label for="airlinesname">Airlines Name: </label>
		<input type="text" name="airlinesname" placeholder="Flight Name" class="input"/><br>
		
		<label for="departure">From: </label>
		<input type="text" name="departure" placeholder="From" class="input"/>
		<label for="destination">To: </label>
		<input type="text" name="destination" placeholder="To" class="input"/><br>
		
		<label for="deptdate">Departure date: </label>
		<input type="date" name="deptdate" placeholder="Departure date" class="input"/>
		<label for="depttime">Departure Time: </label>
		<select name="depttime" placeholder="Departure Time" class="input">
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
		<input type="date" name="arrivaldate" placeholder="Arrival Date" class="input"/>
		<label for="arrivaltime">Arrival Time: </label>
		<select name="arrivaltime" placeholder="Arrival Time" class="input">
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
		
		<label for="class">Cabin class: </label>
		<input type="radio" name="class" value="economy" class=""> Economy 
		<input type="radio" name="class" value="business" class="" style = "text-indent : 5em;"> Business <br><br>
		
		<label for="pricePerSeat">Price per seat: </label>
		<input type="text" name="pricePerSeat" placeholder="Price" class="input"/><br><br>
		<button type="submit" name="insertbutton" class="button" >Insert</button><br>
		
		
		</form>
		
	 </div>
	
	 </body>
</html>