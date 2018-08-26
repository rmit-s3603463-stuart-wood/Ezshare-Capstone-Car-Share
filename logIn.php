<?php include('signUpPro.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <?php  include_once('head.php');  ?>
    <link rel="stylesheet" type="text/css" href="cssLogIn.css">
    <?php
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
    <title>EZshare - Car Hire on the Go</title>
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
        <div class="container">
            <div class="card card-container">
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" method="post" action="logIn.php">
                    <?php include('errors.php'); ?>
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="email" name ="email" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="password" name ="password" class="form-control" placeholder="Password" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login_user">Sign in</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    Forgot the password?
                </a>
            </div><!-- /card-container -->
                </body>
                <?php include_once('footer.php');?>
              </html>
