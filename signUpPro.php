<?php  include_once('head.php');  ?>
<?php

// initializing variables
$email = "";
$password = "";
$firstName ="";
$lastName ="";
$phone ="";
$dateOfBirth ="";
$street ="";
$suburb ="";
$state ="";
$postcode ="";
$country ="";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $firstName =  mysqli_real_escape_string($conn,$_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $suburb = mysqli_real_escape_string($conn, $_POST['suburb']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($firstName)) { array_push($errors, "First name is required"); }
  if (empty($lastName)) { array_push($errors, "Last name is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($dateOfBirth)) { array_push($errors, "Date of birth is required"); }
  if (empty($street)) { array_push($errors, "Street name is required"); }
  if (empty($suburb)) { array_push($errors, "Suburb is required"); }
  if (empty($state)) { array_push($errors, "State is required"); }
  if (empty($postcode)) { array_push($errors, "Postcode is required"); }
  if (empty($country)) { array_push($errors, "Country is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($password_2)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customers WHERE  email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email is already being used! Try another");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database


  	$query = "INSERT INTO customers (email, password, firstName, lastName, phone, dateOfBirth, street, suburb, state, postcode, country,isAdmin)
  			  VALUES ('$email', '$password', '$firstName', '$lastName', '$phone', '$dateOfBirth', '$street', '$suburb', '$state', '$postcode', '$country','0')";
  	mysqli_query($conn, $query);

  	$_SESSION['email'] = $_POST['email'];
  	$_SESSION['success'] = "You are now logged in $firstName !";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $_POST['email'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: myAccount.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
