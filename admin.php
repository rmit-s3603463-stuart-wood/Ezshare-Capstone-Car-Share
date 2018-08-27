<!doctype html>
<html lang="en">
<head>
  <?php include_once('head.php'); ?>
  <script src="calcdistance.js"></script>
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>-->
  <title>Admin</title>

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
        Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/

          Always set the map height explicitly to define the size of the div
          element that contains the map. -->
          <style>
          #map {
           height: 94.5%;
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
      <div id="map"></div>
      <script>
        var map;


      //Custom Button


         // Note: This example requires that you consent to location sharing when
         // prompted by your browser. If you see the error "The Geolocation service
         // failed.", it means you probably did not give permission for the browser to
         // locate you.
         var map, infoWindow;
         function initMap() {
           map = new google.maps.Map(document.getElementById('map'), {
             center: {lat: -37.812361, lng: 144.962694},
             zoom: 10,
             gestureHandling: 'greedy'
           });
           infoWindow = new google.maps.InfoWindow;


          // Icons
          var whitecar = 'resources/assets/icons/white-car.png';

          var redcar = 'resources/assets/icons/red-car.png';

          var greycar = 'resources/assets/icons/grey-car.png';


          //Content
          var rmitcarinfo =
          '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Car 1</h1>'+
          '<div id="bodyContent">'+
          '<p>2012 Toyota Corolla Sedan <br> Licence Plate: RJ5 631</p>'+
          '<p>This car currently not being used</p>'+
          '<p><a href="link to booking page" class="bookbutton">'+'Veiw details</a></p>'+
          '</div>'+
          '</div>';

          var rmitcarinfowindow = new google.maps.InfoWindow({
            content: rmitcarinfo
          });


          var airportcarinfo =
          '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Car 2</h1>'+
          '<div id="bodyContent">'+
          '<p>2016 Nissan Pulsar Sedan <br> Licence Plate: HRK 927</p>'+
          '<p>This car is being used</p>'+
          '<p><a href="link to booking page" class="bookbutton">'+'Veiw details</a></p>'+
          '</div>'+
          '</div>';

          var airportcarinfowindow = new google.maps.InfoWindow({
            content: airportcarinfo
          });


          var chadstonecarinfo =
          '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Car 3</h1>'+
          '<div id="bodyContent">'+
          '<p>2015 Mercedes C300 Sedan <br> Licence Plate: BLN 832</p>'+
          '<p>This car is being used</p>'+
          '<p><a href="link to booking page" class="bookbutton">'+'Veiw details</a></p>'+
          '</div>'+
          '</div>';

          var chadstonecarinfowindow = new google.maps.InfoWindow({
            content: chadstonecarinfo
          });

          // Create markers
          var rmitmarker = new google.maps.Marker({
            position: {lat: -37.806989, lng: 144.963865},
            icon: whitecar,
            map: map
          });
          rmitmarker.addListener('click', function() {
            rmitcarinfowindow.open(map ,rmitmarker);
          });



          var airportcarmarker = new google.maps.Marker({
            position: {lat: -37.669491, lng: 144.851685},
            icon: redcar,
            map: map
          });
          airportcarmarker.addListener('click', function() {
            airportcarinfowindow.open(map ,airportcarmarker);
          });

          var chadstonecarmarker = new google.maps.Marker({
            position: {lat: -37.885222, lng: 145.086158},
            icon: greycar,
            map: map
          });
          chadstonecarmarker.addListener('click', function() {
            chadstonecarinfowindow.open(map ,chadstonecarmarker);
          })
        }




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
           
       </script>
       <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap">

     </script>
     <?php include_once('footer.php');?>
     </html>
