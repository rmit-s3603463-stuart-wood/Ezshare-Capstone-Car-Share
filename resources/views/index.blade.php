@extends ('layout')
	@section('pageHead')
		<title>Home</title>
<link href="{{asset('/css/style.css')}}" rel="stylesheet" />
    @endsection
    @section('content')
	<body>
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
					<img id ="cars" img src={{asset('img/carsCloseUp.jpg')}} alt="cars" style="width:100%;">
				  </div>

				  <div class="carousel-item">
					<img id ="keys" img src={{asset('img/keys.jpg')}} alt="keys" style="width:100%;">
				  </div>

				  <div class="carousel-item">
					<img id ="holiday" img src={{asset('img/holiday.jpg')}} alt="holiday" style="width:100%;">
				  </div>

						<div class="carousel-item">
					<img id ="suv" img src={{asset('img/suv.jpg')}} alt="suv" style="width:100%;">
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
			 <img id ="happy1" img src={{asset('img/happy1.jpg')}} class="rounded img-fluid border border-dark" alt="happy1">
			  <div class="centered">Cars ready, nearby, right now! Explore the world with EZshare!</div>
			  <div class="test"><a href="{{ url('') }}" class="btn">BOOK NOW</a></div>
			  </div>
			</div>
			 <div class="column">
			 <div class="content">
			  <img id ="happy2" img src={{asset('img/happy2.jpg')}} class="rounded img-fluid border border-dark" alt="happy2">
			  <div class="centered">From Sedans to SUV's. Travel in your style!</div>
			 <div class="test"> <a href="{{ url('carFleet') }}" class="btn">SEE FLEET</a></div>
			</div>
			</div>
			 <div class="column">
			 <div class="content">
			  <img id ="happy3" img src={{asset('img/happy3.png')}} class="rounded img-fluid border border-dark" alt="happy3">
			  <div class="centered">Fuel, Cleaning and Rego is all included!</div>
			 <div class="test"><a href="{{ url('signUp') }}" class="btn">JOIN NOW</a></div>
			</div>
			</div>
		</div>
		</div>
	</body>
	</html>
  @endsection
