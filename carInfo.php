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
          <a class="nav-link active" data-toggle="tab" href="#Tier1">Tier 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tier2">Tier 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tier3">Tier 3</a>
        </li>
      </ul>
<div class="tab-content">

  <div id="Tier1" class="container tab-pane active"><br>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th colspan = "3">Tier 1</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="8">  <img src="resources\assets\icons\sedan.jpg"  class="rounded img-fluid"  alt="sedan" width="600" height="500"> </td>

            <th>Registration Number:</th>
            <td>SED123</td>

          </tr>
          <tr>
            <th>Model:</th>
            <td>Pulsar ST B17 Series</td>

          </tr>
          <tr>
            <th>Make:</th>
            <td>Nissan</td>

          </tr>
          <tr>
            <th>Year:</th>
            <td>2016</td>

          </tr>
          <tr>
            <th>Tier:</th>
            <td>1</td>

          </tr>
          <tr>
            <th>Number of Seats:</th>
            <td>5</td>

          </tr>
          <tr>
            <th>Engine Type:</th>
            <td> 4 cylinder Petrol Aspirated 1.8L </td>

          </tr>
          <tr>
            <th>Rental Price per hour:</th>
            <td>$35</td>

          </tr>
        </tbody>
      </table>
    </div>
    <div id="Tier2" class="container tab-pane fade"><br>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th colspan = "3">Tier 2</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="8"><img src="resources\assets\icons\4wd.jpg"  class="rounded img-fluid"  alt="4wd" width="600" height="500"></td>

            <th>Registration Number:</th>
            <td>BIG123</td>

          </tr>
          <tr>
            <th>Model:</th>
            <td>Patrol Ti-L Y62 Series 4</td>

          </tr>
          <tr>
            <th>Make:</th>
            <td>Nissan</td>

          </tr>
          <tr>
            <th>Year:</th>
            <td>2018</td>

          </tr>
          <tr>
            <th>Tier:</th>
            <td>2</td>

          </tr>
          <tr>
            <th>Number of Seats:</th>
            <td>7</td>

          </tr>
          <tr>
            <th>Engine Type:</th>
            <td>8 cylinder Petrol Aspirated 5.6L</td>

          </tr>
          <tr>
            <th>Rental Price per hour:</th>
            <td>$50</td>

          </tr>
        </tbody>
      </table>
    </div>
    <div id="Tier3" class="container tab-pane fade"><br>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th colspan = "3">Tier 3</th>
          </tr>
        </thead>
        <tbody>


          <tr>
            <td rowspan="8"><img src="resources\assets\icons\luxury.jpg"  class="rounded img-fluid"  alt="luxury" width="600" height="500"></td>

            <th>Registration Number:</th>
            <td>LUX123</td>

          </tr>
          <tr>
            <th>Model:</th>
            <td>GT-R NISMO R35</td>

          </tr>
          <tr>
            <th>Make:</th>
            <td>Nissan</td>

          </tr>
          <tr>
            <th>Year:</th>
            <td>2017</td>

          </tr>
          <tr>
            <th>Tier:</th>
            <td>3</td>

          </tr>
          <tr>
            <th>Number of Seats:</th>
            <td>4</td>

          </tr>
          <tr>
            <th>Engine Type:</th>
            <td>6 cylinder Petrol Twin Turbo Intercooled 3.8L</td>

          </tr>
          <tr>
            <th>Rental Price per hour:</th>
            <td>$75</td>

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
