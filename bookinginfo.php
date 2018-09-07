<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/card.css">
  <?php  include_once('head.php');  ?>
  <title>Booking</title>


</head>
<body>
  <?php  include_once('navbar.php');  ?>
  <?php require 'db_conn.php';?>



  <script>
    function initMap1() {
      var rmitLatLng = {lat: -37.806989, lng: 144.963865};
      var chadstoneLatLng = {lat: -37.885222, lng: 145.086158};

      var mapProp1= {
        center:new google.maps.LatLng(-37.806989,144.963865),
        disableDefaultUI: true,
        zoom:17,
      };

      var mapProp2= {
        center:new google.maps.LatLng(-37.885222,145.086158),
        disableDefaultUI: true,
        zoom:17,
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
        map: map2,
        title: 'chadstone'
      });



    }
  </script>

  <div class="row">
    <div class="col-75">
      <div class="container">

        <div class="row">

          <div class="col-50">


            <h2>Your Information:</h2>

            <br>

            <div class = "centerform">

              <form class="form-horizontal" method="POST" action="payment.php" id="form">

                <label for="fname">First Name:</label>
                <div>
                  <input type="text" class="form-control" id="fname" align="middle" placeholder="Enter First name" name="fname">
                </div>

                <label for="lname">Last Name:</label>
                <div>
                  <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname">
                </div>

                <label for="email">Email:</label>
                <div>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                </div>

                <br>


                <label for="dlicence">Drivers Licence Number:</label>
                <div>
                  <input type="number" class="form-control" id="dlicence" name="dlicence"placeholder="Enter Drivers Licence Number" name="dtime">
                </div>


            </div>

            <br>
            <br>
            <br>
            <br>

            <h2>Your Vehicle:</h2>


            <?php
  $sql = "SELECT * FROM cars WHERE Rego='SED123'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row

   while($row = $result->fetch_assoc()) {
     //cycles through the entire query result, one row at a time
    echo '<hr>';
    echo '<h2 class = "text-center"><img src="resources\assets\icons\\'.$row["carPic"].'" class="rounded img-fluid"  alt="sedan" width="300" height="250"></h2><hr>';
    echo '<h3 class = "text-center">'.$row["model"].'</h3>';
    echo '<h4 class = "text-center"> Cost per hour: $'.$row["price"].'</h4><br>';

  }
} else {
  echo "0 results";
}
?>

</div>

<div class="col-50">
  <h2>Pick Up Details</h2>

  <br>

  <div class = "centerform">

     <label for="pdate">Pickup Date:</label>
      <div>
        <input type="date" class="form-control" id="pdate" placeholder="09/01/2018" name="pdate">
      </div>

      <br>

      <label for="ptime">Pick Up Time:</label>
      <div>
        <input type="time" class="form-control" id="ptime" placeholder="09/01/2018" name="ptime">
      </div>


      <br>

      <label for="plocation">Pick Up Location</label>
      <div>
        <select class="custom-select mr-sm-2" id="plocation" name="plocation" form="form">
          <option selected disabled>Select a Pickup Location</option>
          <option value="Melbourne Airport">Melbourne Airport</option>
          <option value="Chadstone">Chadstone</option>
          <option value="Melbourne CBD">Melbourne CBD</option>
        </select>
      </div>

      <div id="map1" style="width:100%;height:150px;"></div>


  </div>

  <br>
  <br>


  <h2>Drop Off Details</h2>

  <div class = "centerform">

      <br>

      <label for="ddate">Drop Off Date:</label>
      <div>
        <input type="date" class="form-control" id="ddate" placeholder="09/01/2018" name="ddate">
      </div>

      <br>

      <label for="dtime">Drop Off Time:</label>
      <div>
        <input type="time" class="form-control" id="dtime" placeholder="09/01/2018" name="dtime">
      </div>


      <br>

      <label for="dlocation">Drop Off Location</label>
      <div>
        <select class="custom-select mr-sm-2" name="dlocation" form="form">
          <option selected disabled>Select a Drop off Location</option>
          <option value="Melbourne Airport">Melbourne Airport</option>
          <option value="Chadstone">Chadstone</option>
          <option value="Melbourne CBD">Melbourne CBD</option>
        </select>
      </div>

      <div id="map2" style="width:100%;height:150px;"></div>
      <input type="submit" value="Continue" class="btn">
    </form>
  </div>



</div>
</div>

</div>
</div>
</div>


<?php  include_once('footer.php');  ?>
</body>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap1"></script>


<script>
</script>
</html>
