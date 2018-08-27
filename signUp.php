<?php include('signUpPro.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php  include_once('head.php');  ?>

    <link rel="stylesheet" type="text/css" href="cssSignUp1.css">
    <?php
    session_start();
    $servername = "localhost";
    $username = "Admin";
    $password = "p@ssword";
    $dbname = "carshare";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
     ?>
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
     <div class="container">
        <div class="col-md-6 mx-auto text-center">
           <div class="header-title">
              <h1 class="wv-heading--title">
                Sign up
              </h1>
              <h2 class="wv-heading--subtitle">
                 After you sign up you will be able to choose from range of cars.
              </h2>
           </div>
        </div>
        <div class="row">
           <div class="col-md-4 mx-auto">
              <div class="myform form ">
                 <form action="signUp.php" method="post" name="signUp" role="form">
                   <?php include('errors.php'); ?>
                    <div class="form-group">
                      <input type="text" name="firstName" class="form-control my-input"  id="firstName" tabindex="1" class="formControl" placeholder="First name" value="" required  pattern="[-a-z A-Z]+">
                    </div>
                    <div class="form-group">
                      <input type="text" name="lastName" class="form-control my-input"  id="lastName" tabindex="2" class="formControl" placeholder="Last name" value="" required  pattern="[-a-z A-Z]+">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control my-input"  id="email" tabindex="3" class="formControl" placeholder="Email Address" value="" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" >
                    </div>
                    <div class="form-group">
                      <input type="text" name="phone" class="form-control my-input"  id="phone" tabindex="4" class="formControl" placeholder="Contact Number" value="" required  pattern="[+0-9-\(\) ]{8,20}">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control my-input"  id="password" tabindex="5" class="formControl" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirmPassword" class="form-control my-input" id="confirmPassword" tabindex="6" class="formControl" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                      <input type="date" name="dateOfBirth" class="form-control my-input"  id="dateOfBirth" tabindex="7" class="formControl" placeholder="Date Of Birth" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="street" class="form-control my-input"  id="street" tabindex="8" class="formControl" placeholder="Street" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="suburb" class="form-control my-input"  id="suburb" tabindex="9" class="formControl" placeholder="Suburb" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="state" class="form-control my-input"  id="state" tabindex="10" class="formControl" placeholder="State" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="postcode" class="form-control my-input"  id="postcode" tabindex="11" class="formControl" placeholder="Postcode" value="" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="country" class="form-control my-input"  id="country" tabindex="12" class="formControl" placeholder="Country" value="" required>
                    </div>
                    <div class="text-center ">
                       <button type="submit" class="btn" name="reg_user">Register</button>
                       </p>
                    </div>
                    </p>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </body>
  <?php include_once('footer.php');?>
</html>
