<<<<<<< HEAD
<?php include_once('head.php'); ?>
<?php include('addcar.php'); ?>
=======
>>>>>>> Development
<!doctype html>
<html lang="en">
<head>
  <title>CarList</title>
     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->
      
<<<<<<< HEAD
      <link rel="stylesheet" href="css/card.css">
      <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />
      <script src="css/card-js.min.js"></script>
=======
      <!-- <link rel="stylesheet" href="css/card.css"> -->
>>>>>>> Development
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
    <div class="container">
        <h2>Add a Car</h2>
        <form method="post" enctype="multipart/form-data" action="adminaddcar.php" name="addcar" role="form">
			<?php include('errors.php'); ?>
            <label for="rego">Registration</label><input type="text" id="rego" name="rego" placeholder="Please provide registration">
            
			<label for="model">Car Model</label><input type="text" id="model" name="model" placeholder="Please provide car model">
                           
            <label  for="make">Make</label><input type="text" id="make" name="make" placeholder="Please provide car make">
                            
            <label  for="year">Year</label><input type="number" id="year" name="year" placeholder="Please provide car year">
                          
            <label for="tier">Car Tier</label><select name="tier" placeholder="Please select a car tier">
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
														  </select>
                   
            <label for="seatNo">Number Of Seats</label><select name="seatNo" placeholder="Please select number of seats">
															<option value="2">2 seats</option>
															<option value="3">3 seats</option>
															<option value="4">4 seats</option>
															<option value="5">5 seats</option>
															<option value="6">6 seats</option>
															<option value="7">7 seats</option>
															<option value="8">8 seats</option>
														  </select>
                            
            <label for="engine">Engine</label><input type="text" id="engine" name="engine" placeholder="Please provide the car's engine">
                             
            <label for="price">Price</label><input type="number" id="price" name="price" placeholder="Please provide price of car">
                      
			<label for="carPic">Car Image</label><input type="file" id="carPic" name="carPic" class="custom-file-input">
			
            <label  for="stationName">Station Name</label><select name="stationName" placeholder="Please select stationName">
															<option value="RMIT">RMIT</option>
															<option value="Melbourne Airport">Melbourne Airport</option>
															<option value="Chadstone">Chadstone</option>
														  </select>
            
			<button type="submit" class="btn" name="add_car">Add Car</button>
        </form>
	</div>
    </body>
    <?php include_once('footer.php');?>
</html>
