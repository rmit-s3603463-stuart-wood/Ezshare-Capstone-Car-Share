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
			  <div class="row">
			  <div class="column">
			  <div class="content">
			  <img src="resources\assets\icons\happy1.jpg" class="rounded img-fluid" alt="happy1">
			  <div class="centered">Cars ready, nearby, right now! Explore the world with EZshare!</div>
			  <a href="index.php" class="btn">BOOK NOW</a>
			  </div>
			</div>
			 <div class="column">
			 <div class="content">
			  <img src="resources\assets\icons\happy2.jpg" class="rounded img-fluid" alt="happy2">
			  <div class="centered">From sedans to suv's. Travel in your style!</div>
			  <a href="carInfo.php" class="btn">SEE FLEET</a>
			</div>
			</div>
			 <div class="column">
			 <div class="content">
			  <img src="resources\assets\icons\happy3.png" class="rounded img-fluid" alt="happy3">
			  <div class="centered">Fuel, cleaning and rego is all included!</div>
			  <a href="signUp.php" class="btn">JOIN NOW</a>
			</div>
			</div>
		</div>
		</div>
	</body>
	<?php include_once('footer.php'); ?>
	</html>
