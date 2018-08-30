<?php  include_once('head.php');  ?>

<!doctype html>
<html lang="en">
<head>

  <title>EZshare - Car Hire on the Go</title>
  <?php  include_once('head.php');  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
  <?php  include_once('navbar.php');?>
  <?php require 'db_conn.php';?>

  <?php
  $sql = "SELECT * FROM cars WHERE Rego='SED123'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row

   while($row = $result->fetch_assoc()) {
     //cycles through the entire query result, one row at a time
  echo '<h1 class = "text-center">Booking Information</h1><hr>';
  echo '<h2 class = "text-center"><img src="resources\assets\icons\\'.$row["carPic"].'" class="rounded img-fluid"  alt="sedan" width="300" height="250"></h2><hr>';
  echo '<h3 class = "text-center">'.$row["model"].'</h3>';
  echo '<h4 class = "text-center"> Cost per hour: $'.$row["price"].'</h4><br>';

  }
  } else {
  echo "0 results";
  }
  ?>





?>
<!--
<h1 class = "text-center">Booking Information</h1>
    <hr>
    <h2 class = "text-center">Car Description</h2>
    <hr>
    <h3 class = "text-center"> Car Model (Placeholder)</h3>
    <h4 class = "text-center"> Cost per hour placeholder ($150) </h4>
    <br>
  -->

<div class="container">
  <form class="form-horizontal" action="payment.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="fname">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ptime">Pickup Time:</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" id="ptime" placeholder="09/01/2018" name="ptime">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="plocation">Pickup Location</label>
      <div class="col-sm-10">
        <select class="custom-select mr-sm-2" id="plocation">
        <option selected>Select a Pickup Location</option>
        <option value="1">Melbourne</option>
        <option value="2">Brunswick</option>
        <option value="3">Essendon</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="dlicence">Drivers Licence Number:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="dlicence" placeholder="Enter Drivers Licence Number" name="dtime">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Book</button>
      </div>
    </div>
  </form>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
</body>
<?php  include_once('footer.php');  ?>
</html>
