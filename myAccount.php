<?php  include_once('head.php');?>
<?php include('signUpPro.php')

?>
<!doctype html>
<html lang="en">
  <head>
    <?php if(!isset($_SESSION['email'])){
       header("Location:logIn.php");
    }
    ?>
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
        echo"</tr>";
?>
          </tr>

        </tbody>
      </table>
    </div>
    <div id="Bookings" class="container tab-pane fade"><br>
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
                <th colspan = '10' >Current Bookings</th>
          </tr>
        </thead>
        <tbody>

          <tr>
                <th>Booking ID</th>

                <th>Registration Number</th>

                <th>Total Price</th>

                <th>Pick Up location</th>

                <th>Return location</th>

                <th>Date Booked</th>

                <th>Time Booked</th>

                <th>Hours Booked</th>

                <th>Minutes Booked</th>

                <th>Return car?</th>
          </tr>

            <?php
            $email = $_SESSION["email"];
            $query2 = "SELECT * FROM booking where email ='$email'";
            $results2  = $conn->query($query2);
            $x = 0;

            while($row = $results2->fetch_assoc()) {

              if($row['completed'] == 0){
                $bookingID =  $row['bookingID'];
                $rego = $row['rego'];
                $dateBooked = $row['dateBooked'];
                $timeBooked = $row['timeBooked'];
                $hoursBooked = $row['hoursBooked'];
                $minutesBooked = $row['minutesBooked'];
                $totalPrice =$row['totalPrice'];
                $returnLocation = $row['returnLocation'];
                $pickupLocation = $row['pickupLocation'];

                        echo'<tr>
                        <td>'.$bookingID.'</td>
                        <td>'.$rego.'</td>
                        <td>'.$totalPrice.'</td>
                        <td>'.$pickupLocation.'</td>
                        <td>'.$returnLocation.'</td>
                        <td>'.$dateBooked.'</td>
                        <td>'.$timeBooked.'</td>
                        <td>'.$hoursBooked.'</td>
                        <td>'.$minutesBooked.'</td>
                        <td>
                        <form action=\'unbook.php\' method=\'post\'>
                        <input type=\'hidden\' id=\'bookId\' name=\'bookId\' value="'.$bookingID.'">
                        <input type=\'hidden\' id=\'carRego\' name=\'carRego\' value="'.$rego.'">
                        <input type=\'submit\'>
                          </button></form>
                        </td>
                        </tr>';
                        $x=1;
              }

                    }
                    if($x == 0){
                      echo'<tr>
                      <td class=\'text-center\' colspan = \'10\'>You have no current bookings!</td>
                      </tr>';
                    }

              ?>


        </tbody>
      </table>
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
                <th colspan = '8' > Previous Bookings</th>
          </tr>
        </thead>
        <tbody>

          <tr>
                <th>Booking ID</th>

                <th>Registration Number</th>

                <th>Total Price</th>

                <th>Pick Up location</th>

                <th>Return location</th>

                <th>Date Booked</th>

                <th>Time Booked</th>

                <th>Hours Booked</th>


          </tr>

            <?php
            $email = $_SESSION["email"];
            $query2 = "SELECT * FROM booking where email ='$email'";
            $results2  = $conn->query($query2);
            $x = 0;

            while($row = $results2->fetch_assoc()) {

              if($row['completed'] == 1){
                $bookingID =  $row['bookingID'];
                $rego = $row['rego'];
                $dateBooked = $row['dateBooked'];
                $timeBooked = $row['timeBooked'];
                $hoursBooked = $row['hoursBooked'];
                $totalPrice = $row['totalPrice'];
                $returnLocation = $row['returnLocation'];
                $pickupLocation = $row['pickupLocation'];

                        echo"<tr>
                        <td>$bookingID</td>
                        <td>$rego</td>
                        <td>$totalPrice</td>
                        <td>$pickupLocation</td>
                        <td>$returnLocation</td>
                        <td>$dateBooked</td>
                        <td>$timeBooked</td>
                        <td>$hoursBooked</td>

                        </tr>";
                        $x = 1;
              }

                    }
                    if($x == 0){
                      echo'<tr>
                      <td class=\'text-center\' colspan = \'9\'>You have no previous bookings!</td>
                      </tr>';
                    }
              ?>


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
