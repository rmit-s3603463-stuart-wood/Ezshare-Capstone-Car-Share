<?php  include_once('head.php');  ?>
<?php

// initializing variables
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
$errors = array();
echo "done 1";

// Add Car
if (isset($_POST['add_car'])) {
	echo "hihiihihhihi";
  // receive all input values from the form
  $rego = mysqli_real_escape_string($conn, $_POST['rego']);
  echo" $rego";
  $model =  mysqli_real_escape_string($conn,$_POST['model']);
  echo" $model";
  $make = mysqli_real_escape_string($conn, $_POST['make']);
  echo" $make";
  $year = mysqli_real_escape_string($conn, $_POST['year']);
  echo" $year";
  $tier = mysqli_real_escape_string($conn, $_POST['tier']);
  echo" $tier";
  $seatNo = mysqli_real_escape_string($conn, $_POST['seatNo']);
  echo" $seatNo";
  $engine = mysqli_real_escape_string($conn, $_POST['engine']);
  echo" $engine";
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  echo" $price";
  $carPic = $_FILES['carPic']['name'];
  $tmp_name = $_FILES['carPic']['tmp_name'];
  echo" $carPic";
  $stationName = mysqli_real_escape_string($conn, $_POST['stationName']);
if($stationName = 'RMIT')
  {
	$carCords = '-37.817644, 144.966933';
  }elseif($stationName = 'Melbourne Airport'){
	$carCords = '-37.669491, 144.851685';
  }elseif($stationName ='Chadstone'){
	$carCords = '-37.885222, 145.086158';
  }
  echo" $stationName";
  echo" $carCords";
  $booked = 'false';
  echo" $booked";
  $availability = 'true'; 
  echo" $availability";
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
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
  if (empty($carCords)) { array_push($errors, "carCords is required"); }
  if (empty($booked)) { array_push($errors, "car booking required"); }
  if (empty($availability)) { array_push($errors, "car availability is required"); }
  echo "done 2";

  // first check the database to make sure
  // a car does not already exist with the same rego
  $car_check_query = "SELECT * FROM cars WHERE  rego='$rego' LIMIT 1";
  $result = mysqli_query($conn, $car_check_query);
  $car = mysqli_fetch_assoc($result);
echo "done 3";
  if ($car) { // if user exists
    if ($car['rego'] === $rego) {
      array_push($errors, "rego is already being used! Try another");
	  echo "done 3.2";
    }
  }
echo "cunt";
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
echo "done 4";
  	$query = "INSERT INTO cars (rego, model, make, year, tier, seatNo, engine, price, carPic, stationName, carCords, booked, availability)
  			  VALUES ('$rego', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$carPic, '$stationName', '$carCords', '$booked', '$availability')";
  	if(mysqli_query($conn, $query))
	{
		if (isset($rego)) {
			if (!empty($rego)) {
				$location = 'resources/assets/icons/';
			}
					move_uploaded_file($tmp_name, $loaction.$carPic);
			echo "car has been added";
		}
	}else{
		echo "Car has not been added";
	header('location: addremovecar.php');
	}
	
  }else{
	  echo "error";
  }
  echo "done 5";
}
  ?>