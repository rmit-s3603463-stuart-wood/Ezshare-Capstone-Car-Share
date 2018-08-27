<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="cssHome.css">
		<?php include_once('head.php'); ?>
		<title>Home</title>
		<!--
		bootstrap code provided: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_carousel&stacked=h
		
		images provided by these websites:
		http://www.flightblitz.com/travel/i-htm/
		https://www.ellaslist.com.au/articles/ellaslist-presents-the-ultimate-road-trip-survival-guide
		https://www.shutterstock.com/?kw=shutterstock&gclid=EAIaIQobChMIneegtpfx3AIVTwQqCh3rvAbtEAAYASAAEgJg4_D_BwE&gclsrc=aw.ds&dclid=CO6247eX8dwCFRqalgodRKYKcA
		https://www.carmagazine.co.uk/car-reviews/nissan/nissan-x-trail-tekna-dci-177-awd-auto-2017-review/
		https://www.shutterstock.com/video/clip-21719824-stock-footage-slow-motion-of-happy-asian-family-on-mini-van-are-smiling-and-preparing-for-travel-on-vacation.html
		https://www.hellorf.com/video/10486622/similar
		-->
		<style>
			#info{
				margin-top: 50px;
				margin-bottom: 50px;
				padding: 15px;
				background-color: #555;
			}
		
			#info h2{
				color: white;
				display: inline-block;
				margin-left: 10px;
			}
			.column {
				position: relative;
				float: left;
				width: 33%;
				height: 250px;
				padding: 15px;
			}

			.row:after {
				content: "";
				display: table;
				clear: both;
			}

			@media screen and (max-width: 600px) {
				.column1 {
					width: 100%;
				}
			}

			.centered {
				position: absolute;
				text-align: center;
				color: white;
				text-shadow: 0 2px 0 black;
				display: inline-block;
				bottom: 60px;
				margin-left: 165px;
				font-size: 20px;
				font-weight: bold;
				transform: translate(-50%, -50%);
			}

			.column img {
				width: 100%;
				height: auto;
			}
			.column .btn {
				position: absolute;
				bottom: 45px;
				display: inline-block;
				margin-left: 100px;
				background-color: #555;
				color: white;
				font-size: 16px;
				padding: 12px 24px;
				border: none;
				cursor: pointer;
				border-radius: 5px;
			}

			.column .btn:hover {
				background-color: black;
			}
			
		</style>
	</head>
	<body>
		<?php include_once('navbar.php'); ?>
		<div class="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img src="resources\assets\icons\carsCloseUp.jpg" alt="cars" style="width:100%;">
				  </div>

				  <div class="carousel-item">
					<img src="resources\assets\icons\keys.jpg" alt="keys" style="width:100%;">
				  </div>
				
				  <div class="carousel-item">
					<img src="resources\assets\icons\holiday.jpg" alt="holiday" style="width:100%;">
				  </div>
				  
						<div class="carousel-item">
					<img src="resources\assets\icons\suv.jpg" alt="suv" style="width:100%;">
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div>
			  <div id="info">
				<h2>Voted #1 car rental service in Melbourne</h2><h2>250,000+ members</h2><h2>2000+ cars</h2>
			  </div>
			  <div class="column">
			  <img src="resources\assets\icons\happy1.jpg" class="rounded img-fluid" alt="happy1">
			  <div class="centered">Cars ready, nearby, right now!</div>
			  <a href="index.php" class="btn">BOOK NOW</a>
			  
			</div>
			 <div class="column">
			  <img src="resources\assets\icons\happy2.jpg" class="rounded img-fluid" alt="happy2">
			  <div class="centered">From sedans to suv's</div>
			  <a href="carInfo.php" class="btn">SEE FLEET</a>
			</div>
			 <div class="column">
			  <img src="resources\assets\icons\happy3.png" class="rounded img-fluid" alt="happy3">
			  <div class="centered">Fuel, cleaning and rego is all included!</div>
			  <a href="signUp.php" class="btn">JOIN NOW</a>
			</div>
		</div>
	</body>
	<?php include_once('footer.php'); ?>
	</html>