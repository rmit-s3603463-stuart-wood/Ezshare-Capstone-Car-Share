<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/card.css">
  <?php  include_once('head.php');
  $sql = "SELECT * FROM cars WHERE currDriver='".$_SESSION['email']."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  echo  "<script>";
  echo  "alert('You cannot book more than one car at a time!');";
  echo  "window.location.replace('./home.php')";
  echo  "</script>";
}



  ?>
  <title>Booking</title>


<script src="https://maps.googleapis.com/maps/api/js"></script>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>

</head>


<body>
  <?php  include_once('navbar.php');  ?>
  <?php require 'db_conn.php';?>

        <?php
if (isset($_POST['bookRego'])){
  $carRego = $_POST['bookRego'];
  $sql = "SELECT * FROM cars WHERE Rego='".$carRego."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
     //cycles through the entire query result, one row at a time
    $stationName = $row["stationName"];

  }
} else {
  echo "0 results";
}
}
 ?>

  <script>
    var map;
  var stationName = "<?php echo $stationName; ?>";
  if (stationName == "Chadstone") {
    var markerData = [{lat: -37.885222 , lng: 145.086158  , zoom: 17 , name: "Chadstone Shopping Centre"}];
} else if (stationName == "RMIT") {
    var markerData = [{lat: -37.806989 , lng: 144.963865  , zoom: 17 , name: "RMIT"}];
} else  {
    var markerData = [{lat: -37.669046 , lng: 144.841049  , zoom: 12 , name: "Melbourne Airport"}];
}


  function initialize() {
    markerData.forEach(function(data) {
      var czoom = data.zoom;
      var clat = data.lat;
      var clong = data.lng;
      console.log(czoom);

      map = new google.maps.Map(document.getElementById('map1'), {
        zoom: czoom,
        center: {lat: clat, lng: clong}
      });
      });
      markerData.forEach(function(data) {
        var newmarker= new google.maps.Marker({
          map:map,
          position:{lat:data.lat, lng:data.lng},
          title: data.name
        });
        jQuery("#selectlocation").append('<option value="'+[data.lat, data.lng,data.zoom].join('|')+'">'+data.name+'</option>');
      });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
  jQuery(document).on('change','#selectlocation',function() {
    var latlngzoom = jQuery(this).val().split('|');
    var newzoom = 1*latlngzoom[2],
    newlat = 1*latlngzoom[0],
    newlng = 1*latlngzoom[1];
    map.setZoom(newzoom);
    map.setCenter({lat:newlat, lng:newlng});
  });
$(function () {
      $("#EndDate").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
    if ((Date.parse(endDate) < Date.parse(startDate))) {
        alert("Drop off date should be greater than pick up date");
        document.getElementById("EndDate").value = "<?php echo date("Y-m-d"); ?>";

    }
});
      $("#StartDate").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
    if ((Date.parse(startDate) > Date.parse(endDate))) {
        alert("Drop off date should be greater than pick up date");
        document.getElementById("StartDate").value = "<?php echo date("Y-m-d"); ?>";

    }
});
      $("#dtime").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
    var startTime = document.getElementById("ptime").value;
    var endTime = document.getElementById("dtime").value;
    var start = new Date("November 13, 2013 " + startTime);
    start = start.getTime();
    var end = new Date("November 13, 2013 " + endTime);
    end = end.getTime();
    if ((startDate = endDate) && (start > end)) {
        alert("Drop off time should be greater than pick up time");
        document.getElementById("dtime").value = "";
    }
    if (end - start < 1800000) {
        alert("The minimum time to rent a car is 30 minutes");
        document.getElementById("dtime").value = "";
    }
    if (startDate = endDate)
    {
      console.log("true");
    }
    console.log(Date.parse(startDate));
    console.log(Date.parse(endDate));
});
      $("#ptime").change(function () {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;
    var startTime = document.getElementById("ptime").value;
    var endTime = document.getElementById("dtime").value;
    var start = new Date("November 13, 2013 " + startTime);
    start = start.getTime();
    var end = new Date("November 13, 2013 " + endTime);
    end = end.getTime();
    console.log("Time1: "+ start + " Time2: " + end);
    if ((startDate = endDate) && (start > end)) {
        alert("Drop off time should be greater than pick up time");
        document.getElementById("ptime").value = "";
    }
});
      });

</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
          format: "DD/MM/YYYY - hh:mm A",
          minDate: new Date()

        });
        var minDropOff = new Date();
        minDropOff.setMinutes(minDropOff.getMinutes() + 30);

        $('#datetimepicker7').datetimepicker({
          format: "DD/MM/YYYY - hh:mm A",
          minDate: minDropOff

        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>



<script>
  var map2;
  var markerData2= [
    {lat: -37.806989 , lng: 144.963865  , zoom: 17 , name: "RMIT"},
    {lat: -37.885222 , lng: 145.086158  , zoom: 17 , name: "Chadstone Shopping Centre"},
    {lat: -37.669046 , lng: 144.841049  , zoom: 12 , name: "Melbourne Airport"},
  ];

  function initialize() {
      map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 6,
        center: {lat: -37.025097, lng: 144.175104}
      });
      markerData2.forEach(function(data) {
        var newmarker= new google.maps.Marker({
          map:map2,
          position:{lat:data.lat, lng:data.lng},
          title: data.name
        });
        jQuery("#selectlocation2").append('<option value="'+[data.lat, data.lng,data.zoom].join('|')+'">'+data.name+'</option>');
      });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
  jQuery(document).on('change','#selectlocation2',function() {
    var latlngzoom = jQuery(this).val().split('|');
    var newzoom = 1*latlngzoom[2],
    newlat = 1*latlngzoom[0],
    newlng = 1*latlngzoom[1];
    map2.setZoom(newzoom);
    map2.setCenter({lat:newlat, lng:newlng});
  });

  </script>
  <div class="row">
    <div class="col-75">
      <div class="container">

        <div class="row">

          <div class="col-50">


            <h2>Your Information:</h2>

            <br>

            <div class = "centerform">

              <?php
  $email = $_SESSION["email"];
  $sql = "SELECT * FROM customers WHERE email= '".$email."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
                      if (isset($_SESSION["email"])){
                        $userEmail = $_SESSION['email'];
                        $sql = "SELECT * FROM customers WHERE email='".$userEmail."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                         while($row = $result->fetch_assoc()) {
                          $firstName = $row["firstName"];
                          $_SESSION['firstName'] = $firstName;
                          $lastName = $row["lastName"];
                          $_SESSION['lastName'] = $lastName;
                          $email = $row["email"];
                          $_SESSION['email'] = $email;
                          $phone = $row["phone"];
                          $_SESSION['phone'] = $phone;
                        }
                      } else {
                        echo "0 results";
                      }
                      }
}else{
  echo"You must make login first to make a booking!";
  array_push($errors, "Invalid member access!");
  $firstName = 'N/A';
  $lastName = 'N/A';
  $email = 'N/A';
  $phone = 'N/A';
}
?>


              <form class="form-horizontal" method="POST" action="payment.php" id="form">

                <label for="fname">First Name:</label>
                <div>
                  <input type="text" class="form-control" id="fname" align="middle" value="<?php echo $firstName; ?>" name="fname" disabled>
                </div>

                <label for="lname">Last Name:</label>
                <div>
                  <input type="text" class="form-control" id="lname" value="<?php echo $lastName; ?>" name="lname" disabled>
                </div>

                <label for="email">Email:</label>
                <div>
                  <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" disabled>
                </div>

                <br>

                <label for="phone">Phone Number:</label>
                <div>
                  <input type="tel" class="form-control" id="phone" value="<?php echo $phone; ?>" name="phone" disabled>
                </div>

                <br>

            </div>

              <br>

              <script>
                var fname = document.getElementById('fname').value;
                var lname = document.getElementById('lname').value;
                var email = document.getElementById('email').value;
                var phone = document.getElementById('phone').value;
                console.log(fname);
                console.log(lname);
                console.log(email);
                console.log(phone);
              </script>


            <h2>Your Vehicle:</h2>

            <br>
            <br>
            <br>


            <?php
                    if (isset($_POST['bookRego'])){
                      $carRego = $_POST['bookRego'];
                      $_SESSION['bookRego'] = $carRego;
                      $sql = "SELECT * FROM cars WHERE Rego='".$carRego."'";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
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
                    }else{
                      echo"You must make choose a car via the map!";
                      array_push($errors, "Invalid page access!");
                    }
        ?>


</div>

<div class="col-50">
  <h2>Pick Up Details</h2>

  <br>

  <div class = "centerform">



     <label for="pdate">Pick Up date and time:</label>
      <div class='input-group date' id='datetimepicker6'>
                <input type='text' name = "fdatetime" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>




      <br>

      <label for="plocation">Pick Up Location</label>

      <div>

        <select class="custom-select mr-sm-2" id="selectlocation" name="plocation" form="form">


        </select>

      </div>

      <div id="map1" style="width:100%;height:150px;"></div>


  </div>

  <br>
  <br>


  <h2>Drop Off Details</h2>



  <div class = "centerform">



      <br>

      <label for="ddate">Drop Off date and time:</label>
   <div class='input-group date' id='datetimepicker7'>
                <input type='text' name = "tdatetime" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>




      <br>

      <label for="dlocation">Drop Off Location</label>
      <div>
        <select class="custom-select mr-sm-2" id="selectlocation2" name="dlocation" form="form">
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
