<?php  include_once('head.php');?>
<?php include('signUpPro.php') ?>
<!doctype html>
<html lang="en">
  <head>
<title>EZshare - Account  Information</title>
<link rel="stylesheet" type="text/css" href="cssMyAccount.css">
  </head>
  <body>
    <?php include_once('navbar.php');  ?>

    <div class="container table-responsive-sm">
      <h1 class = "text-center">My Account</h1>

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Bookings">Bookings</a>
        </li>
      </ul>
<div class="tab-content">

  <div id="Profile" class="container tab-pane active"><br>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th colspan = "3">Profile</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="8">  <img src="resources\assets\icons\profile.png"  class="rounded img-fluid"  alt="sedan" width="300" height="500"> </td>
<?php
$email = $_SESSION["email"];
$query = mysqli_query($conn,"SELECT * FROM customers where email ='$email'");
$results = mysqli_fetch_assoc($query);

  $firstName =  $results['firstName'];
  $lastName = $results['lastName'];
  $phone = $results['phone'];
  $dateOfBirth = $results['dateOfBirth'];
  $street = $results['street'];
  $suburb = $results['suburb'];
  $state = $results['state'];
  $postcode = $results['postcode'];
  $country = $results['country'];



        echo"<th>Name:</th>";
        echo"<td>$firstName $lastName </td>";

        echo"</tr>";
        echo"<tr>";
        echo"<th>Email:</th>";
        echo"<td> $email </td>";

        echo"</tr>";
        echo"<tr>";
        echo"<th>Phone:</th>";
        echo"<td>$phone</td>";

        echo"</tr>";
        echo"<tr>";
        echo"<th>Address:</th>";
        echo"<td>$street, $suburb, $state, $postcode, $country</td>";
?>
          </tr>

        </tbody>
      </table>
    </div>
    <div id="Bookings" class="container tab-pane fade"><br>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th colspan = "3">Bookings</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="8"><img src="resources\assets\icons\"  class="rounded img-fluid"  alt="Map" width="600" height="500"></td>

            <th>Booking ID:</th>
            <td>#1432</td>

          </tr>
          <tr>
            <th>Registration Number:</th>
            <td>EDH234</td>

          </tr>
          <tr>
            <th>Price:</th>
            <td>$500</td>

          </tr>
          <tr>
            <th>Pickup Location:</th>
            <td>Lilydale</td>

          </tr>
          <tr>
            <th>Return Location:</th>
            <td>Dandenong</td>

          </tr>
          <tr>
            <th>Date Booked:</th>
            <td>02/09/2018</td>

          </tr>
          <tr>
            <th>Time Booked</th>
            <td>14:30:00</td>

          </tr>
          <tr>
            <th>Hours Booked</th>
            <td>2 hours</td>

          </tr>


        </tbody>
      </table>
    </div>

    </div>

    </div>

    </body>
    <?php
    include_once('footer.php');
    ?>
</html>
