<!doctype html>
<html lang="en">
	<head>
		<?php include_once('head.php'); ?>
		<link rel="stylesheet" type="text/css" href="cssContacts.css">
		<title>Contacts</title>
		  <script src="calcdistance.js"></script>
  <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>-->

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
        Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/

          Always set the map height explicitly to define the size of the div
          element that contains the map. -->
    <style>
       /* Set the size of the div element that contains the map */
      #map {
		position: absolute;
        height: 400px;  /* The height is 400 pixels */
        width: 400px;
		left: 600px;
		top: 60px;
       }
	   
		.container {   
		position: relative;
		padding-bottom: 20px;
		}
		
	@media screen and (max-width: 800px) {
    .container, #map {   
        width: 100%;
        padding: 0;
    }
}


    </style>
	</head>
	<body>
		<?php include_once('navbar.php'); ?>
		<div class="container">
			<h1 class = "text-center">Contact US</h1>
			<p>Have a question? Please get in touch by calling the number below.</p>
			<p>Our dedicated customer care team will get back to you as soon as possible.</p>
			<p><mark><u>Customer care operating hours</u></mark></p>
			<p><strong>Monday - Friday:</strong> 9:00 AM - 5:30PM</p>
			<p><strong>Saturday:</strong> 11:00 AM - 4:30PM</p>
			<p><strong>Sundays:</strong> Closed</p>
			<P><mark><u>Phone:</u></mark> 1800 145 234</P>
			<p><mark><u>Location</u></mark></p>
			<p>123EZshareHQ</p>
			<p>East Coburg VIC 3021</p>
			<!--The div element for the map -->
			<div id="map"></div>
				<script>
					// Initialize and add the map
					function initMap() {
						// The location of EZshare
						var ezshare = {lat: -37.7514363, lng: 144.9755397};
						// The map, centered at EZshare
						var map = new google.maps.Map(
							document.getElementById('map'), {zoom: 15, center: ezshare});
						// The marker, positioned at EZshare
						var marker = new google.maps.Marker({position: ezshare, map: map});
					}
				</script>
			<!--Load the API from the specified URL
			* The async attribute allows the browser to render the page while the API loads
			* The key parameter will contain your own API key (which is not needed for this tutorial)
			* The callback parameter executes the initMap() function
			-->
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap">
			</script>
		 </div>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Footer</p>
		</div>
	</body>
		<?php include_once('footer.php'); ?>
</html>
