<!doctype html>
<html lang="en">
  <head>
    
    <?php
    include_once('head.php');
    ?>
    

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
    <?php
    include_once('navbar.php');
    ?>
    <div id="map"></div>
       <script>

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
       </script>



  </body>
  <?php
  include_once('footer.php');
  ?>
</html>
