<!doctype html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta name="viewport" content="initial-scale=1">
  <meta charset="utf-8">

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->

      <?php include_once('head.php');
      if(!isset($_SESSION['email'])){
         header("Location:logIn.php");
      }
      ?>

      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="timecalc.js"></script>

      <link rel="stylesheet" href="css/card.css">

      <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />
      <script src="css/card-js.min.js"></script>

      <style type="text/css">
      form button {
        display: block;
        margin-top: 15px;
        width: 100%;
        font-size: 12px;
        padding: 8px 12px;
      }
    </style>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>


  </head>

  <body>
    <?php  include_once('navbar.php');  ?>
    <?php require 'db_conn.php';?>
    <?php

    $fdatetime = $_POST['fdatetime'];

    list($pdate2, $ptime2) = explode(" - ", $fdatetime);
    $pdate2 = str_replace('/', '-', $pdate2);
    $pdate2 = date("Y-m-d", strtotime($pdate2));
    $pdate = str_replace('-', '/', $pdate2);

    $ptime = date("G:i", strtotime($ptime2));





  $name = $_SESSION['firstName']. " " .$_SESSION['lastName'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];

  //$pdate1 = $_POST['pdate'];
  //$pdate = str_replace('-', '/', $pdate1);



  $_SESSION['pdate'] = $pdate;
  //$ptime = $_POST['ptime'];

  $plocation = $_POST['plocation'];

  if ($plocation == "-37.806989|144.963865|17" or $plocation == "RMIT") {
    $plocation = "RMIT";
    $plat = "-37.806989";
    $plong = "144.963865";
} elseif ($plocation == "-37.885222|145.086158|17" or $plocation == "Chadstone") {
    $plocation = "Chadstone";
    $plat = "-37.885222";
    $plong = "145.086158";
} else {
    $plocation = "Melbourne Airport";
    $plat = "-37.669046";
    $plong = "144.841049";
}


  //$ddate1 = $_POST['ddate'];
  //$ddate = str_replace('-', '/', $ddate1);
  //$dtime = $_POST['dtime'];

  $tdatetime = $_POST['tdatetime'];

  list($ddate2, $dtime2) = explode(" - ", $tdatetime);
    $ddate2 = str_replace('/', '-', $ddate2);
    $ddate2 = date("Y-m-d", strtotime($ddate2));
    $ddate = str_replace('-', '/', $ddate2);

    $dtime = date("G:i", strtotime($dtime2));


  $dlocation = $_POST['dlocation'];


  if ($dlocation == "-37.806989|144.963865|17") {
    $dlocation = "RMIT";
    $dlat = "-37.806989";
    $dlong = "144.963865";
} elseif ($dlocation == "-37.885222|145.086158|17") {
    $dlocation = "Chadstone";
    $dlat = "-37.885222";
    $dlong = "145.086158";
} else {
    $dlocation = "Melbourne Airport";
    $dlat = "-37.669046";
    $dlong = "144.841049";
}
  ?>


    <script>
      function initMap1() {
        var rmitLatLng = {lat: -37.806989, lng: 144.963865};
        var chadstoneLatLng = {lat: -37.885222, lng: 145.086158};
        var melbairportLatLng = {lat: -37.669046, lng: 144.841049};
        gestureHandling: 'greedy'

        var mapProp1= {
          center:new google.maps.LatLng(<?php echo $plat; ?>,<?php echo $plong; ?>),
          disableDefaultUI: true,
          zoom:15,
        };

        var mapProp2= {
          center:new google.maps.LatLng(<?php echo $dlat; ?>,<?php echo $dlong; ?>),
          disableDefaultUI: true,
          zoom:15,
        };

        var map1=new google.maps.Map(document.getElementById("map1"),mapProp1);

        var map2=new google.maps.Map(document.getElementById("map2"),mapProp2);

        var rmitmarker = new google.maps.Marker({
          position: rmitLatLng,
          map: map1,
          title: 'rmit'
        });

        var chadstonemarker = new google.maps.Marker({
          position: chadstoneLatLng,
          map: map1,
          title: 'chadstone'
        });

        var melbairportmarker = new google.maps.Marker({
          position: melbairportLatLng,
          map: map1,
          title: 'melbarirport'
        });

        var rmitmarker = new google.maps.Marker({
          position: rmitLatLng,
          map: map2,
          title: 'rmit'
        });

        var chadstonemarker = new google.maps.Marker({
          position: chadstoneLatLng,
          map: map2,
          title: 'chadstone'
        });

        var melbairportmarker = new google.maps.Marker({
          position: melbairportLatLng,
          map: map2,
          title: 'melbarirport'
        });
      }



    </script>

        <script>

        var pdate = '<?php echo $pdate; ?>';
        var ptime = '<?php echo $ptime; ?>';
        var ddate = '<?php echo $ddate; ?>';
        var dtime = '<?php echo $dtime; ?>';

        console.log(pdate);
        console.log(ptime);
        console.log(ddate);
        console.log(dtime);

        var date1 = new Date(pdate + " " + ptime);
        date1 = date1.getTime();
        var date2 = new Date(ddate + " " + dtime);
        date2 = date2.getTime();


        console.log(date1);
        console.log(date2);

        //difference between two dates in msec(milliseconds)
        var diff = date2 - date1;

        console.log(diff);

        var mins = Math.floor(diff / 60000);
        var hrs = Math.floor(mins / 60);
        var days = Math.floor(hrs / 24);
        var yrs = Math.floor(days / 365);

        console.log('mins ' + mins);

        console.log('hrs ' + hrs);

        console.log('days ' + days);

        console.log('yrs ' + yrs);

        mins = mins % 60;
        console.log('For use: ' + hrs + " hours, " + mins + " minutes")


        window.onload = function write(){
        document.getElementById("hours").innerHTML = hrs;
        document.getElementById("minutes").innerHTML = mins;
        document.getElementById("timeprice2").innerHTML = timeprice2;
        document.getElementById("admin").innerHTML = admin;
        document.getElementById("rego").innerHTML = rego;
        document.getElementById("total2").innerHTML = total2;
        document.getElementById("gtotal").innerHTML = gtotal;

        };
      </script>

    <style>
    form {
      margin: 30px;
    }
    input {
      width: 200px;
      margin: 10px auto;
      display: block;
    }

  </style>



  <div class="col-75">
    <div class="container">
      <h2>Booking Details</h2>
      <br>
      <div class="row">

        <div class="col-50">


                    <?php
                    $bookRego = $_SESSION['bookRego'];
  $sql = "SELECT * FROM cars WHERE Rego='".$bookRego."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row

   while($row = $result->fetch_assoc()) {
     //cycles through the entire query result, one row at a time
    echo '<hr>';
    echo '<h3 class = "text-center">'.$row["model"].'</h3>';
    echo '<h2 class = "text-center"><img src="resources\assets\icons\\'.$row["carPic"].'" class="rounded img-fluid"  alt="sedan" width="300" height="250"></h2><hr>';
    echo '<h4 class = "text-center"> Cost per hour: $'.$row["price"].'</h4><br>';

    $price = $row["price"];
    $rego = $row["rego"];
    $_SESSION['rego'] = $rego;
    $email = $_SESSION["email"];
    $_SESSION['pdate'] = $pdate;
    $_SESSION['ptime'] = $ptime;

    $_SESSION['product'] = "Car hire";

    $_SESSION['plocation'] = $plocation;
    $_SESSION['dlocation'] = $dlocation;

  }
} else {
  echo "0 results";
}
?>
        </div>

        <div class="col-50">

          <br>

          <div class="left">
            <h4>Pick Up</h4>

            <p>Date: <?php echo date('d/m/Y', strtotime($pdate));?><br/>
             Time: <?php echo date('h:i A', strtotime($ptime));?><br/>
             Location: <?echo $plocation?><br/>
           </p>

           <br>
           <br>



           <div class="left">
            <h4>Drop Off</h4>

            <p>Date: <?php echo date('d/m/Y', strtotime($ddate));?><br/>
             Time: <?php echo date('h:i A', strtotime($dtime));?><br/>
             Location: <?echo $dlocation?><br/>
           </p>
           </div>

         </div>

         <div class="right">
          <div id="map1" style="width:100%;height:150px;"></div>

          <br>


          <div id="map2" style="width:100%;height:150px;"></div>





        </div>




      </div>




    </div>

    <br>

    <script>
      var price = '<?php echo $price; ?>';
      var calcmin = mins/60 * price;
      var timeprice = (hrs * price) + calcmin;
      var timeprice2 = timeprice.toFixed(2);
      var admin = 5.80;
      var rego = 30.00;
      var total = timeprice + admin + rego;
      var total2 = total.toFixed(2);

      var gtotal = total;
      var gtotal = gtotal.toFixed(2);

    </script>

    <div class="row">

      <div class="col-50">
        <h4>Summary of Charges</h4>

        <br>

        <table>
          <tbody>
            <tr>
              <td><h5>Cost Details</h5></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Hiring for: <span id="hours"></span> hours, <span id="minutes"></span> minutes</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="timeprice2"></span></td>
            </tr>
            <tr>
              <td>Administration Fee</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="admin"></span></td>
            </tr>
            <tr>
              <td>Vehicle Registration Recovery Fee</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="rego"></span></td>
            </tr>
            <tr>
              <td>Total Price</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="total2"></span></td>
            </tr>
          </tbody>
        </table>

      </div>

      <div class="col-50">


        <br>
        <br>
        <br>
        <br>
        <br>



        <table>
          <tbody>
            <tr>
              <td><h5>Total Rental Cost:</h5></td>
              <td>&nbsp;</td>
              <td><h5>$<span id="gtotal"></span></h5></td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>

        <div id="paypal-button-container"></div>


      </div>





    </div>

    <br>


  </div>
</div>

</body>






<script>

  paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
              sandbox:    'AQwFnSEPKOSlT0ap8RhkGFyJ178q7qZAMdlJLc76coRmk7AcVIYN4liyVTY0zViKLwWRY4r51mnZybB2'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment

                var x = gtotal;
                var currentVal = x;
                console.log(gtotal);

                return actions.payment.create({
                  payment: {
                    transactions: [
                    {
                      amount: { total: currentVal, currency: 'AUD' }
                    }
                    ]
                  }
                });
              },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                  $.ajax({
                  type: 'POST',
                  url: 'finish.php',
                  data: {hrs:hrs,mins:mins,gtotal:gtotal},
                  success: function(data) {

                  }
                  })

                  $.post('create_reciept.php', $('form').serialize(), function () {
            $('div#wrap div').fadeOut( function () {
                $(this).empty().html("<h2>Thank you!</h2><p>Thank you for your order. Please <a href='reciept.pdf'>download your reciept</a>. </p>").fadeIn();
            });
        });
                  window.location.replace("create_reciept.php");

                });
              }

            }, '#paypal-button-container');

          </script>

          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap1"></script>

          <?php include_once('footer.php');
          ?>

          </html>
