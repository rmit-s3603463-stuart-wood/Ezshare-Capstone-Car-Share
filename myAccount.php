<!doctype html>
<html lang="en">
  <head>
    <?php  include_once('head.php');  ?>
        <title>EZshare - Car  Information</title>


     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/ -->
     <!-- Pictures provided by:
   https://www.carsales.com.au/dealer/details/Nissan-Pulsar-2016/OAG-AD-16152591/?gts=OAG-AD-16152591&gtssaleid=OAG-AD-16152591&rankingType=Showcase
https://www.carsales.com.au/demo/details/Nissan-Patrol-2018/OAG-AD-15431504/?gts=OAG-AD-15431504&gtssaleid=OAG-AD-15431504&rankingType=Showcase
https://www.carsales.com.au/bncis/details/Nissan-GT-R-2017/OAG-AD-16064743/?Cr=5
 -->
	<style>

       </style>

  </head>
  <body>
    <?php
    include_once('navbar.php');
    ?>

    <div class="container table-responsive-sm">
      <h1 class = "text-center"> Our Fleet</h1>

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

            <th>Name:</th>
            <td>John Johnson</td>

          </tr>
          <tr>
            <th>Email:</th>
            <td>John@gmail.com</td>

          </tr>
          <tr>
            <th>Phone:</th>
            <td>0458291232</td>

          </tr>
          <tr>
            <th>Address:</th>
            <td>234  Elizabeth Street, Melbourne, VIC, 3000</td>

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

    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>Footer</p>
    </div>


    </body>
    <?php
    include_once('footer.php');
    ?>
</html>
