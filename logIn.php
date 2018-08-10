<!doctype html>
<html lang="en">
  <head>
    <?php
    include_once('head.php');
    ?>
<script src="logInScript.js"></script>
    <title>EZshare - Car Hire on the Go</title>

  </head>
  <body>
    <?php
    include_once('navbar.php');
    ?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">EZshare</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="signUp.php">Login\SignUp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Make a Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logIn.php">log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>

    <!------ Include the above in your HEAD tag ---------->

    <!--
        you can substitue the span of reauth email for a input with the email and
        include the remember me checkbox
        -->
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    Forgot the password?
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->



                </body>
                <?php include_once('footer.php');?>

              </html>
