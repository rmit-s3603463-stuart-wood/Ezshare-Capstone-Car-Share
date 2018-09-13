<?php include('head.php');

// Add Car
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $rego = $_POST['rego'];
  $model = $_POST['model'];
  $make = $_POST['make'];
  $year = $_POST['year'];
  $tier = $_POST['tier'];
  $seatNo = $_POST['seatNo'];
  $engine = $_POST['engine'];
  $price = $_POST['price'];
  $target = "resources/assets/icons/".basename($_FILES['carPic']['name']);
  $carPic = $_FILES['carPic']['name'];
  $stationName = $_POST['stationName'];
if($stationName = 'RMIT')
  {
	$carCords = '-37.817644, 144.966933';
  }elseif($stationName = 'Melbourne Airport'){
	$carCords = '-37.669491, 144.851685';
  }elseif($stationName ='Chadstone'){
	$carCords = '-37.885222, 145.086158';
  }
  $booked = true;
  $availability = true; 

  // first check the database to make sure
  // a car does not already exist with the same rego
  $car_check_query = "SELECT * FROM cars WHERE  rego='$rego' LIMIT 1";
  $result = mysqli_query($conn, $car_check_query);
  $car = mysqli_fetch_assoc($result);
  if ($car) { // if user exists
    if ($car['rego'] === $rego) {
      echo "rego is already being used! Try another";
    }
  }
$servername = "localhost";
$username = "Admin";
$password = "password";
$dbname = "carshare";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
   die("Database Connection failed: " . $conn->connect_error);
}
$query = "INSERT INTO cars (rego, model, make, year, tier, seatNo, engine, price, carPic, stationName, carCords, booked, availability)
  			  VALUES ('$rego', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$carPic', '$stationName', '$carCords', '$booked', '$availability')";
	
			  mysqli_query($conn, $query);
			  if(mysqli_query($conn, $query))
			  {
				echo"car has been added to the database";
			  }else{
				  echo"car has not been added to the database";
			  }
			  
	if(move_uploaded_file($_FILES['carPic']['tmp_name'], $target))
	{
		echo"image uploaded successfully";
	}else{
		die("Error: {$conn->errno} : {$conn->error}");
		echo"your image has not been uploaded!";
	}
}
  ?>
<!doctype html>
<html lang="en">
<head>
  <title>CarList</title>
     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->
      
      <link rel="stylesheet" href="css/card.css">
      <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />
      <script src="css/card-js.min.js"></script>
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
    <div class="container">
        <h2>Add a Car</h2>
        <form method="post" enctype="multipart/form-data" action="adminaddcar.php" name="addcar" role="form">
			
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
            
			<button type="submit" class="btn" name="submit">Add Car</button>
        </form>
	</div>
    </body>
    <?php include_once('footer.php');?>
</html>
