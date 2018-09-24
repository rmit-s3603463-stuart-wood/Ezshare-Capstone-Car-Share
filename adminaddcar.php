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
  $carPic = $_FILES['carPic']['name'];
  $stationName = $_POST['stationName'];
if($stationName == "RMIT")
  {
	$carCords = '-37.817644, 144.966933';
  }elseif($stationName == "Melbourne Airport"){
	$carCords = '-37.669491, 144.851685';
  }elseif($stationName =="Chadstone"){
	$carCords = '-37.885222, 145.086158';
  }elseif($stationName =="Southern Cross"){
	$carCords = '-37.818380, 144.952464';
  }elseif($stationName =="Luna Park"){
	$carCords = '-37.867493, 144.976888';
  }elseif($stationName =="Sunbury"){
	$carCords = '-37.580294, 144.712699';
  }elseif($stationName =="Coburg"){
	$carCords = '-37.743839, 144.963922';
  }elseif($stationName =="Epping"){
	$carCords = '-37.637673, 145.009664';
  }elseif($stationName =="Showgrounds"){
	$carCords = '-37.783315, 144.914923';
  }elseif($stationName =="Geelong"){
	$carCords = '-38.147274, 144.360866';
  } 
  
  $booked = intval(FALSE);
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
				  echo"";
				  $fileExt = explode('.', $carPic);
				  $fileActualExt = strtolower(end($fileExt));
				  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
				  if(in_array($fileActualExt, $allowed))
				  {
					  $fileNameNew = uniqid('', true).".".$fileActualExt;
					  $target = 'resources/assets/icons/'.$fileNameNew;
					move_uploaded_file($_FILES['carPic']['tmp_name'], $target);
					$query = "INSERT INTO cars (rego, model, make, year, tier, seatNo, engine, price, carPic, stationName, carCords, booked, availability, totalkm, journeykm, currDriver)
					VALUES ('$rego', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$fileNameNew', '$stationName', '$carCords', '$booked', '$availability', '$totalkm', '$journeykm', '$currDriver')";
	
					mysqli_query($conn, $query);
						echo '<script language="javascript">';
						echo 'alert("car has been added to database")';
						echo '</script>';
				  }
			  }else{				echo '<script language="javascript">';
				echo 'alert("Error detected! Car not added to the database")';
				echo '</script>';
			  }

		}
  ?>
<!doctype html>
<html lang="en">
<head>
  <title>CarList</title>
     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->
      
      <!-- <link rel="stylesheet" href="css/card.css"> -->
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
    <div class="container">
        <h2>Add a Car</h2>
        <form method="post" enctype="multipart/form-data" action="adminaddcar.php" name="addcar" role="form">
			<?php include('errors.php'); ?>
            <label for="rego">Registration</label><input type="text" id="rego" name="rego" placeholder="Please provide registration">
            
			<label for="model">Car Model</label><input type="text" id="model" name="model" placeholder="Please provide car model">
                           
            <label  for="make">Make</label><select name="make" placeholder="Please select a car tier">
														<option value="Nissan">Nissan</option>
														<option value="Ford">Ford</option>
														<option value="Toyota">Toyota</option>
														<option value="BMW">BMW</option>
														<option value="Holden">Holden</option>
														<option value="Honda">Honda</option>
														<option value="Volkswagen">Volkswagen</option>
													</select>														
            <label  for="year">Year</label><select name="year" placeholder="Please select number of seats">
															<option value="2018">2018</option>
															<option value="2017">2017</option>
															<option value="2016">2016</option>
															<option value="2015">2015</option>
															<option value="2014">2014</option>
															<option value="2013">2013</option>
															<option value="2012">2012</option>
															<option value="2011">2011</option>
															<option value="2010">2010</option>
															<option value="2009">2009</option>
															<option value="2008">2008</option>
															<option value="2007">2007</option>
															<option value="2006">2006</option>
															<option value="2005">2005</option>
															<option value="2004">2004</option>
															<option value="2003">2003</option>
															<option value="2002">2002</option>
															<option value="2001">2001</option>
															<option value="2000">2000</option>
															<option value="1999">1999</option>
															<option value="1998">1998</option>
															<option value="1997">1997</option>
															<option value="1996">1996</option>
															<option value="1995">1995</option>
															<option value="1994">1994</option>
															<option value="1993">1993</option>
															<option value="1992">1992</option>
															<option value="1991">1991</option>
															<option value="1990">1990</option>
															<option value="1989">1989</option>
															<option value="1988">1988</option>
															<option value="1987">1987</option>
															<option value="1986">1986</option>
															<option value="1985">1985</option>
															<option value="1984">1984</option>
															<option value="1983">1983</option>
															<option value="1982">1982</option>
															<option value="1981">1981</option>
															<option value="1980">1980</option>
															<option value="1979">1979</option>
															<option value="1978">1978</option>
															<option value="1977">1977</option>
															<option value="1976">1976</option>
															<option value="1975">1975</option>
															<option value="1974">1974</option>
															<option value="1973">1973</option>
															<option value="1972">1972</option>
															<option value="1971">1971</option>
															<option value="1970">1970</option>
															<option value="1969">1969</option>
															<option value="1968">1968</option>
														  </select>			
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
                            
            <label for="engine">Engine</label><select name="engine" placeholder="Please select number of seats">
													<option value="4 Cylinders">4 Cylinders</option>
													<option value="6 Cylinders">6 Cylinders</option>
													<option value="8 Cylinders">8 Cylinders</option>
												</select>
            <label for="price">Price</label><input type="number" id="price" name="price" placeholder="Please provide price of car">
                        
			
			<label for="carPic">Car Image</label>
			<label id="carPic">upload a picture
			<input type="file" id="carPic" name="carPic">
			</label>
            <label  for="stationName">Station Name</label><select name="stationName" placeholder="Please select stationName">
															<option value="RMIT">RMIT</option>
															<option value="Melbourne Airport">Melbourne Airport</option>
															<option value="Chadstone">Chadstone</option>
															<option value="Southern Cross">Southern Cross</option>
															<option value="Luna Park">Luna Park</option>
															<option value="Sunbury">Sunbury</option>
															<option value="Coburg">Coburg</option>
															<option value="Epping">Epping</option>
															<option value="Showgrounds">Showgrounds</option>
															<option value="Geelong">Geelong</option>
														  </select>
            
			<label for="totalkm">total km/s</label><input type="number" id="totalkm" name="totalkm" placeholder="Please provide total km/s of car">
			
			<button type="submit" class="btn" name="submit" onclick="return confirm('Are you sure you wish to add this car?')">Add Car</button>
        </form>
		
				<style>

input[type="file"] {
    display: none;
}
					#carPic {
					  background-color: #7892c2;
					  color: white;
					  padding: 12px;
					  margin: 10px 0;
					  border: none;
					  width: 100%;
					  border-radius: 3px;
					  cursor: pointer;
					  font-size: 17px;
					  top: 10px;
					  text-align: center;
					}

					#carPic:hover {
					  background-color: #476e9e;
					}
					.custom-file-input {
						width: 100%;
						position: absolute;
						z-index: -1;
					}
					.custom-file-input + label {;
						color: white;
						font-size: 25px;
						background-color: #7892c2;
						display: inline-block;
						
					}

					custom-file-input:focus + label,
					.custom-file-input + label:hover {
						background-color: #476e9e;
					}
					
					.custom-file-input + label {
					cursor: pointer; /* "hand" cursor */
					}
					.container {
					  background-color: #f2f2f2;
					  padding: 30px;
					  margin-top: 20px;
					  margin-bottom: 20px;
					  border: 1px solid lightgrey;
					  border-radius: 15px;
					}

					input[type=text] {
					  width: 100%;
					  margin-bottom: 20px;
					  padding: 12px;
					  border: 1px solid #ccc;
					  border-radius: 3px;
					}

					input[type="number"] {
					  width: 100%;
					  margin-bottom: 20px;
					  padding: 12px;
					  border: 1px solid #ccc;
					  border-radius: 3px;
					}

					select {
						width: 100%;
						margin-bottom: 20px;
						padding: 12px;
						border: 1px solid #ccc;
						border-radius: 3px;
						
					}

					label {
					  margin-bottom: 10px;
					  margin-top: 10px;
					  display: block;
					}

					.icon-container {
					  margin-bottom: 20px;
					  padding: 7px 0;
					  font-size: 24px;
					}

					.btn {
					  background-color: #7892c2;
					  color: white;
					  padding: 12px;
					  margin: 10px 0;
					  border: none;
					  width: 100%;
					  border-radius: 3px;
					  cursor: pointer;
					  font-size: 17px;
					  top: 10px;
					}

					.btn:hover {
					  background-color: #476e9e;
					}

					.error {
						width: 92%;
						margin: 0px auto;
						padding: 10px;
						border: 1px solid #a94442;
						color: #a94442;
						background: #f2dede;
						border-radius: 5px;
						text-align: left;
					}			
			</style>
	</div>
    </body>
    <?php include_once('footer.php');?>
</html>
