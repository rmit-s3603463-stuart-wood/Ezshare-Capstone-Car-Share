<!doctype html>
<html lang="en">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<head>
  <?php include_once('head.php'); ?>
  <script src="calcdistance.js"></script>
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>-->
  <title>EZshare - Car Hire on the Go</title>
=======
  <head>
    <?php include_once('head.php');?>

    <title>EZshare - Car Hire on the Go</title>
>>>>>>> Feature-Chris
=======
  <head>
    <?php include_once('head.php'); ?>
    <title>EZshare - Car Hire on the Go</title>
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car
=======
  <head>
    <?php include_once('head.php'); ?>
    <title>EZshare - Car Hire on the Go</title>
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car

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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     </head>
     <body>
      <?php  include_once('navbar.php');?>
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
=======
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>
    <div id="map"></div>
       <script>
>>>>>>> Feature-Chris
=======
=======
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car
  </head>
  <body>
    <?php  include_once('navbar.php');?>
    <div id="map"></div>
       <script>
<<<<<<< HEAD
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car
=======
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car

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

          // Icons
          var whitecar = 'resources/assets/icons/small-car-icon-top-view-white-car-1.png';


          //Content
          var fakecarinfo =
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Car 1</h1>'+
            '<div id="bodyContent">'+
            '<p>2012 Toyota Corolla Sedan <br> Licence Plate: RJ5 631</p>'+
            '<p>This car is ready to be used</p>'+
            '<p><a href="link to booking page" class="bookbutton">'+'Book this car</a></p>'+
            '</div>'+
            '</div>';

        var fakecarinfowindow = new google.maps.InfoWindow({
          content: fakecarinfo
        });

          // Create markers
          var fakemarker = new google.maps.Marker({
          position: {lat: -37.806989, lng: 144.963865},
          icon: whitecar,
          map: map
          });
          fakemarker.addListener('click', function() {
            fakecarinfowindow.open(map ,fakemarker);
          });




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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

     </script>
     <?php include_once('footer.php');?>
     </html>
=======
       </script>
</body>
  <?php include_once('footer.php');?>
</html>
>>>>>>> Feature-Chris
=======
       </script>
  <?phpinclude_once('footer.php');?>
</html>
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car
=======
       </script>
  <?phpinclude_once('footer.php');?>
</html>
>>>>>>> parent of ee411b7... Added another car, added a button which will be used to find the closest car, started on a function to locate the nearest car
