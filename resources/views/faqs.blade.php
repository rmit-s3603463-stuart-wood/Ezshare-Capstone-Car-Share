@extends ('layout')
	@section('pageHead')
		<title>FAQS</title>
		<style>
			.accordion {
				background-color: #eee;
				color: #555;
				cursor: pointer;
				padding: 18px;
				width: 100%;
				border: none;
				text-align: left;
				outline: none;
				font-size: 15px;
				transition: 0.4s;
			}
			h1{
			  padding: 10px;
			}
			.active, .accordion:hover {
				background-color: #ccc;
			}

			.panel {
				padding: 0 18px;
				display: none;
				background-color: white;
				overflow: hidden;
			}
		</style>
    @endsection

    @section('content')
	<body>
		<!--Displays faqs page-->

		<div class="container">

		<h1 class = "text-center">FAQS</h1>
		<table class="table text-center">
		<tbody>
			 <tr>
		 			<th>Q: Do I have to pay for petrol?</th>
		 			<th>Q: How do I make a booking?</th>
			 </tr>
			 <tr>
			 		<td><p>>No, The cost of petrol is included by EZshare into the standard hourly rate for the use of the vehicle. So to help customers using EZshare for long holiday or business trips, have a more affordable experience.</p></td>
				  <td><p>You can simply make a booking by logging in through the <a href="{{ url('login') }}"><u>Login</u></a> tab located under the MyAccount dropbox. If you don't have an account you can make one by creating one on the <a href="{{ url('signUp') }}"><u>SignUp</u></a> page. Once you have logged in you can make a booking through the Map page by selecting a vehicle located on the map. Once done simply fill in the details of your booking and you're on your way!</p></td>
			</tr>
			<tr>
				 <th>Q: How do I end my booking?</th>
				 <th>Q: How do I cancel a booking?</th>
			</tr>
			<tr>
				 <td>Simply drive the car you currently have booked to the dropoff location that you selected. Once there exit the vehicle and go to your profile under <a href="{{ url('myAccount') }}"><u>MyAccount</u></a>, go to your bookings, select the return car button on your current booking and confirm that you wish to end your booking.</td>
				 <td>Simply login by using the <a href="{{ url('login') }}"><u>Login</u></a> link located under the MyAccount dropdown menu. Then go to the Bookings tab, select the return car button for the booking you wish to cancel and confirm that you wish to end your booking. </p></td>
		 </tr>
			<tr class = thead-dark>
					<th colspan = "2" class ="text-center">Can't find what you're looking for?<a href="{{ url('contactUs') }}" class="btn btn-info btn-block" role="button">Contact Us</a></th>
			</tr>
		</tbody>
		</table>
		</div>
	</body>
</html>
@endsection
