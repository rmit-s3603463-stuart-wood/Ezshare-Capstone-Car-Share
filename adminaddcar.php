<?php include('head.php');

$rego = "";
$model = "";
$make ="";
$year ="";
$tier ="";
$seatNo ="";
$engine ="";
$price ="";
$stationName ="";
$carCords ="";
$booked ="";
$availability ="";
$totalkm ="";
$journeykm ="";
$currDriver ="";
$errors = array();

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
  $totalkm = $_POST['totalkm'];
  $journeykm = '0';
  $currDriver = Null;

  if (empty($rego)) { array_push($errors, "rego is required"); }
  if (empty($model)) { array_push($errors, "car model is required"); }
  if (empty($make)) { array_push($errors, "car make is required"); }
  if (empty($year)) { array_push($errors, "year number is required"); }
  if (empty($tier)) { array_push($errors, "car tier is required"); }
  if (empty($seatNo)) { array_push($errors, "seatNo name is required"); }
  if (empty($engine)) { array_push($errors, "engine is required"); }
  if (empty($price)) { array_push($errors, "price is required"); }
  if (empty($carPic)) { array_push($errors, "carPic is required"); }
  if (empty($stationName)) { array_push($errors, "stationName is required"); }
  if (empty($totalkm)){ array_push($errors, "total km/s for car is required"); }
  
  // first check the database to make sure
  // a car does not already exist with the same rego
  $car_check_query = "SELECT * FROM cars WHERE  rego='$rego' LIMIT 1";
  $result = mysqli_query($conn, $car_check_query);
  $car = mysqli_fetch_assoc($result);
  if ($car) { // if user exists
    if ($car['rego'] === $rego) {
	array_push($errors, "rego is already being used! Try another");
    }
  }
  
  if (count($errors) == 0) {
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
$query = "INSERT INTO cars (rego, model, make, year, tier, seatNo, engine, price, carPic, stationName, carCords, booked, availability, totalkm, journeykm, currDriver)
  			  VALUES ('$rego', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$carPic', '$stationName', '$carCords', '$booked', '$availability', '$totalkm', '$journeykm', '$currDriver')";
	
			  mysqli_query($conn, $query);
			  if(mysqli_query($conn, $query))
			  {
					if(move_uploaded_file($_FILES['carPic']['tmp_name'], $target))
					{
						echo '<script language="javascript">';
						echo 'alert("car has been added to database")';
						echo '</script>';
					}
			  }else{
				echo '<script language="javascript">';
				echo 'alert("car has been added to database")';
				echo '</script>';
			  }
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
            
			<label for="totalkm">total km/s</label><input type="number" id="totalkm" name="totalkm" placeholder="Please provide total km/s of car">
			
			<button type="submit" class="btn" name="submit" onclick="return confirm('Are you sure you wish to add this car?')">Add Car</button>
        </form>
	</div>
    </body>
    <?php include_once('footer.php');?>
</html>
