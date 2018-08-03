<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>EZshare - Car Hire on the Go</title>

      /*  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
          Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation
       */
         /* Always set the map height explicitly to define the size of the div
          * element that contains the map. */
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
    <!-- Optional JavaScript -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="#">EZshare</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Login\SignUp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Make a Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>
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
             zoom: 6
           });
           infoWindow = new google.maps.InfoWindow;

           // Try HTML5 geolocation.
           if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(function(position) {
               var pos = {
                 lat: position.coords.latitude,
                 lng: position.coords.longitude
               };

               infoWindow.setPosition(pos);
               infoWindow.setContent('Location found.');
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
       </script>
       <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap">
       </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
