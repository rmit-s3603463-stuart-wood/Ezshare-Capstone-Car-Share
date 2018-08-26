<!doctype html>
<html lang="en">
<head>
  <?php include_once('head.php'); ?>
  <script src="calcdistance.js"></script>
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>-->
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
       </style>

     </head>
     <body>
      <?php  include_once('navbar.php');?>
      <?php require 'db_conn.php';?>
      <div id="map"></div>
      <script>
        var map;

      /**
       * The CenterControl adds a control to the map that recenters the map on
       * Chicago.
       * This constructor takes the control DIV as an argument.
       * @constructor
       */

      //Custom Button
      function CenterControl(controlDiv) {

        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to locate the nearest car';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Click to locate the nearest car';
        controlUI.appendChild(controlText);

        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener('click', function() {
          alert("Test");
          calcdistance();
        });

      }

         // Note: This example requires that you consent to location sharing when
         // prompted by your browser. If you see the error "The Geolocation service
         // failed.", it means you probably did not give permission for the browser to
         // locate you.
         var map, infoWindow;
         function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: -34.397, lng: 150.644},
             zoom: 17,
             gestureHandling: 'greedy'
           });
           infoWindow = new google.maps.InfoWindow;

           var centerControlDiv = document.createElement('div');
           var centerControl = new CenterControl(centerControlDiv);

           centerControlDiv.index = 1;
           map.controls[google.maps.ControlPosition.RIGHT_TOP].push(centerControlDiv);

          // Icons
          var whitecar = 'resources/assets/icons/white-car.png';

          var redcar = 'resources/assets/icons/red-car.png';

          var greycar = 'resources/assets/icons/grey-car.png';


          //Content
          <?php
          $sql = "SELECT * FROM cars";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          $x=1;
           while($row = $result->fetch_assoc()) {
          echo'var carinfo'.$x.' = ';
          echo'\'<div id="content">\'+';
          echo'\'<div id="siteNotice">\'+';
          echo'\'</div>\'+';
          echo'\'<h1 id="firstHeading" class="firstHeading">Car'.$x.'</h1>\'+';
          echo'\'<div id="bodyContent">\'+';
          echo'\'<p>'.$row["make"].' '.$row["model"].'<br> Licence Plate: '.$row["rego"].'</p>\'+';
          if($row["booked"]==1){
            echo'\'<p>This car is currently booked.</p>\'+';
          }elseif($row["availability"]==0){
            echo'\'<p>This car is currently under maintenance.</p>\'+';
          }else{
              echo'\'<p>This car is ready to be used.</p>\'+';
          }
          echo'\'<button name="bookRego" type="submit" value="'.$row["rego"].'">Book this car</button>\'+';
          echo'\'</div>\'+';
          echo'\'</div>\';';
          echo'var carinfowindow'.$x.'= new google.maps.InfoWindow({';
          echo'content: carinfo'.$x;
          echo'});';

          $x+=1;

           }

           }
           $result->free();
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
           // output data of each row
           $x=1;
           $y=00.000001;
            while($row = $result->fetch_assoc()) {
          list($lat, $long) = explode(", ",$row["carCords"]);
          $lat = $lat +$y;
           echo'var marker'.$x.' = new google.maps.Marker({';
           echo'position: {lat: '.$lat.', lng: '.$long.'},';
           echo'icon: whitecar,';
           echo'map: map';
           echo'});';
           echo"marker".$x.".addListener('click', function() {";
           echo'carinfowindow'.$x.'.open(map ,marker'.$x.');';
           echo'});';

           $x+=1;
           $y+=00.000001;

            }

            }
           ?>

        // Attempt at changing icon size depending on zoom

        /*
        google.maps.event.addListener(map, 'zoom_changed', function() {

        var pixelSizeAtZoom0 = 8; //the size of the icon at zoom level 0
        var maxPixelSize = 350; //restricts the maximum size of the icon, otherwise the browser will choke at higher zoom levels trying to scale an image to millions of pixels

        var zoom = map.getZoom();
        var relativePixelSize = Math.round(pixelSizeAtZoom0*Math.pow(2,zoom)); // use 2 to the power of current zoom to calculate relative pixel size.  Base of exponent is 2 because relative size should double every time you zoom in

        if(relativePixelSize > maxPixelSize) //restrict the maximum size of the icon
        relativePixelSize = maxPixelSize;

        //change the size of the icon
        var marker = {
            url: icons.whitecar, //marker's same icon graphic
            size: null,//size
            origin: null,//origin
            anchor: null, //anchor
            scaledSize: new google.maps.Size(relativePixelSize, relativePixelSize) //changes the scale

        }
        });
        */
           // Try HTML5 geolocation.
           if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(function(position) {
               var pos = {
                 lat: position.coords.latitude,
                 lng: position.coords.longitude
               };

               infoWindow.setPosition(pos);
               infoWindow.setContent('You are here!');
               var marker = new google.maps.Marker({position: pos, map: map});
               infoWindow.open(map);
               map.setCenter(pos);
             }, function() {
               handleLocationError(true, infoWindow, map.getCenter());
             });
           } else {
             // Browser doesn't support Geolocation
             handleLocationError(false, infoWindow, map.getCenter());
           }
         }

         function handleLocationError(browserHasGeolocation, infoWindow, pos) {
           infoWindow.setPosition(pos);
           infoWindow.setContent(browserHasGeolocation ?
             'Error: The Geolocation service failed.' :
             'Error: Your browser doesn\'t support geolocation.');
           infoWindow.open(map);
         }

         setTimeout(function() {infoWindow.close();}, 10000);
       </script>
       <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap">

     </script>

     <?php include_once('footer.php');?>
     </html>
