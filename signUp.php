
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="cssSignUp1.css">
    <?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '','carshare');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // two passwords are equal to each other
      if ($_POST['password'] == $_POST['confirmpassword']){

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['password']);
        $firstName = $mysqli->real_escape_string($_POST['firstName']);
        $lastName = $mysqli->real_escape_string($_POST['lastName']);
        $phone = $mysqli->real_escape_string($_POST['phone']);
        $dateOfBirth = $mysqli->real_escape_string($_POST['dateOfBirth']);
        $street = $mysqli->real_escape_string($_POST['street']);
        $suburb = $mysqli->real_escape_string($_POST['suburb']);
        $state = $mysqli->real_escape_string($_POST['state']);
        $postcode = $mysqli->real_escape_string($_POST['postcode']);
        $country = $mysqli->real_escape_string($_POST['country']);

        $sql = "Insert Into customers (email, password, firstName, lastName, phone, dateOfBirth, street, suburb, state, postcode, country)"
          ."VALUES ('$email', '$password', '$firstName', '$lastName', '$phone', '$dateOfBirth', '$street', '$suburb', '$state', '$postcode', '$country')";
        //if query is successful refirst to our home page
        if($mysqli->query($sql) === true){
          $_SESSION['message'] = "You have succesfully registered $firstName !";
          header("location: location.php");
        }
        else{
          $_SESSION['message'] ="You have not registered succesfully.";
        }
      }
      else{
          $_SESSION['message'] ="Your passwords did not match.";
      }
    }
     ?>
  </head>
  <body>
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
                 <form action="form.php" method="post" name="login" role="form">
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
                       <button type="submit" class="btn btn-block send-button tx-tfm">Sign Up!</button>
                       </p>
                    </div>
                    </p>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </body>
</html>
