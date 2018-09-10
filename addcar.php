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
$carPic ="";
$stationName ="";
$carCords ="";
$booked ="";
$availability ="";
$errors = array();
echo "done 1";

// REGISTER USER
if (isset($_POST['add_car'])) {
  // receive all input values from the form
  $rego = mysqli_real_escape_string($conn, $_POST['rego']);
  $model =  mysqli_real_escape_string($conn,$_POST['model']);
  $make = mysqli_real_escape_string($conn, $_POST['make']);
  $year = mysqli_real_escape_string($conn, $_POST['year']);
  $tier = mysqli_real_escape_string($conn, $_POST['tier']);
  $seatNo = mysqli_real_escape_string($conn, $_POST['seatNo']);
  $engine = mysqli_real_escape_string($conn, $_POST['engine']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $carPic = mysqli_real_escape_string($conn, $_FILES['carPic']);
  $location = $_FILES['carPic'];
  $stationName = mysqli_real_escape_string($conn, $_POST['stationName']);
  $carCords = mysqli_real_escape_string($conn, $_POST['carCords']);
  $booked = mysqli_real_escape_string($conn, $_POST['booked']);
  $availability = mysqli_real_escape_string($conn, $_POST['availability']);

  move_uploaded_file($location, "resources/assets/icons/$carPic");
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($rego)) { array_push($errors, "rego is required"); }
  if (empty($model)) { array_push($errors, "First name is required"); }
  if (empty($make)) { array_push($errors, "Last name is required"); }
  if (empty($year)) { array_push($errors, "year number is required"); }
  if (empty($tier)) { array_push($errors, "Date of birth is required"); }
  if (empty($seatNo)) { array_push($errors, "seatNo name is required"); }
  if (empty($engine)) { array_push($errors, "engine is required"); }
  if (empty($price)) { array_push($errors, "price is required"); }
  if (empty($carPic)) { array_push($errors, "carPic is required"); }
  if (empty($stationName)) { array_push($errors, "stationName is required"); }
  if (empty($carCords)) { array_push($errors, "carCords is required"); }
  if (empty($booked)) { array_push($errors, "car booking required"); }
  if (empty($availability)) { array_push($errors, "car availability is required"); }
  echo "done 2";
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or rego
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

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO cars (rego, model, make, year, tier, seatNo, engine, price, carPic, stationName, carCords, booked, availability)
  			  VALUES ('$rego', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$carPic, '$stationName', '$carCords', '$booked', '$availability')";
  	mysqli_query($conn, $query);
	//header('location: addremovecar.php');
echo "done 4";
  }

else{
	  echo"not working";
  }

  ?>
