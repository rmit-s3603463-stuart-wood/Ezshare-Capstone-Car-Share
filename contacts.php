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
      #HQ {
        height: 100%;
				float:right;

       }
			 h1{
 			  padding: 10px;
 			}
			 .table-borderless td,.table-borderless th {
			     border: 0;
			 }
 .hours{
float:left;

 }
 .contact{

	 clear:left	;
 }
 .foot{
	 clear:both;
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
			<p class = "text-center">Have a question? Please get in touch by calling the number below.</br> Our dedicated customer care team will get back to you as soon as possible.</p>

					<div class ="hours">
					<table class="table table-borderless">
	  <thead>
	    <tr>
	      <th scope="col" colspan ="2">Customer care operating hours</th>

	    </tr>
	  </thead>
	  <tbody>

	    <tr>
				<td>Monday - Friday:</td>
	      <td>9:00 AM - 5:30PM</td>
	    </tr>
	    <tr>
				<td>Saturday:</td>
	      <td>11:00 AM - 4:30PM</td>
	    </tr>
	    <tr>
				<td>Sundays:</td>
				<td>Closed</td>
	    </tr>

	  </tbody>
	</table>
</div>
<img id ="HQ" src="resources\assets\img\HQ.jpg" alt="HQ">

<div class="contact">
			<P><mark><u>Phone:</u></mark> 1800 145 234</P>
			<p><mark><u>Location:</u></mark> 123EZshareHQ, East Coburg VIC 3021</p>
		</div>
			<!--The div element for the map -->
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
	</body>
	<div class="foot">
		<?php include_once('footer.php'); ?>
</div>
</html>
