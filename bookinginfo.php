<!doctype html>
<html lang="en">
  <head>
      <?php  include_once('head.php');  ?>
    <title>EZshare - Car Hire on the Go</title>

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
        Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/

          Always set the map height explicitly to define the size of the div
           element that contains the map. -->
	<style>
	#map {
           height: 100%;
         }
         /* Optional: Makes the sample page fill the window. */
         html, body {
           height: 100%;
           margin: 0;
           padding: 0;
         }

  #info {

 height: 5%;
  }

  label{
      display: inline-block;
      float: left;
      clear: left;
      width: 250px;
      text-align: right;
    }
    input {
  display: inline-block;
  float: left;
}
h1 {
        text-align: center;
}
       </style>

  </head>
  <body>
  <?php  include_once('navbar.php');  ?>

    <div id="info">
    <h1>Booking Information<h1>
      <hr>
      <h2>Car Description</h2>
      <hr>
      <h3> Car Model (Placeholder)</h3>
      <h4> Cost per hour placeholder ($150) </h4>
      <br>
      <div class="formdiv">
      <form action="welcome.php" method="post">
      <h4> <label> First Name:</label>  <input type="text" name="fname" placeholder="First name"><br>
        <label>Last Name:</label>  <input type="text" name="lname" placeholder="Last Name"><br>
      <label>  E-mail:</label>  <input type="text" name="email"placeholder="Email"><br>
      <label>  Pickup Time: </label> <input type="time" name="ptime" placeholder="09/01/2018" ><br>
      <label>  Credit Card Number:  </label> <input type="text" name="creditno" placeholder="Credit Card No."><br>
      <label>  CVV </label> <input type="text" name="CVV" placeholder="CVV"> <br>
      <label>  Drivers Licence Number: </label> <input type="text" name="name" placeholder="Driver Licence Number"><br>
      <label>  Credit Card Expiry Date </label> <input type="date" name="ccdate" placeholder="09/01/2018"><br>
      <label><input type="submit" value="Book"/></label>
    </h4>
        </form>
          </div>
</div>
  </body>
  <?php  include_once('footer.php');  ?>
       <script>
       </script>
       </html>