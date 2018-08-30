<?php
$con = mysqli_connect("localhost","Admin","p@ssword","carshare") or die("Error " . mysqli_error($con));

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
$carPic ="";
$carCords ="";
$booked ="";
$availability ="";
$errors = array();

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
  $stationName = mysqli_real_escape_string($conn, $_POST['stationName']);
  $carPic = mysqli_real_escape_string($conn, $_POST['carPic']);
  $booked = mysqli_real_escape_string($conn, $_POST['booked']);
  $availability = mysqli_real_escape_string($conn, $_POST['availability']);

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
  if (empty($stationName)) { array_push($errors, "stationName is required"); }
  if (empty($carPic)) { array_push($errors, "carPic is required"); }
  if (empty($booked)) { array_push($errors, "Password is required"); }
  if (empty($availability)) { array_push($errors, "Password is required"); }
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or rego
  $user_check_query = "SELECT * FROM cars WHERE  rego='$rego' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($car) { // if user exists
    if ($car['rego'] === $rego) {
      array_push($errors, "rego is already being used! Try another");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO customers (rego, password, model, make, year, tier, seatNo, engine, price, stationName, carPic)
  			  VALUES ('$rego', '$password', '$model', '$make', '$year', '$tier', '$seatNo', '$engine', '$price', '$stationName', '$carPic')";
  	mysqli_query($conn, $query);
  	header('location: addremovecar.php');
  }
}