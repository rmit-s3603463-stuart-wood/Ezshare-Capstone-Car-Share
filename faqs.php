<!doctype html>
<html lang="en">
	<head>
		<?php include_once('head.php'); ?>
		<link rel="stylesheet" type="text/css" href="cssFaqs.css">
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
	</head>
	<body>
		<?php include_once('navbar.php'); ?>

		<div class="container">

		<h1 class = "text-center">FAQS</h1>
		<table class="table text-center">
		<tbody>
			 <tr>
		 			<th>Q: Do I have to pay for petrol?</th>
		 			<th>Q: How do I make a booking?</th>
			 </tr>
			 <tr>
			 		<td><p>>No, The cost of petrol has already been included by EZshare into the standard hourly rate for the use of the vehicle. So to help customers using EZshare for long holiday or business trips, have a more affordable experience.</p></td>
				  <td><p>You can simply make a booking by logging in through the <a href="login.php"><u>Login</u></a> tab located under the MyAccount dropbox. If you don't have an account you can make one by creating one on the <a href="signUp.php"><u>SignUp</u></a> page. Once you have logged in you can make a booking through the Map page by selecting a vehicle located on the map. Once done simply fill in the details of your booking and you're on your way!</p></td>
			</tr>
			<tr>
				 <th>Q: How do I end my booking?</th>
				 <th>Q: How do I cancel a booking?</th>
			</tr>
			<tr>
				 <td>Simply drive the car you currently have booked to the dropoff location that you selected. Once there exit the vehicle and go to your profile under <a href="myAccount.php"><u>MyAccount</u></a>, go to your bookings, select the return car button on your current booking and confirm that you wish to end your booking.</td>
				 <td>Simply login by using the <a href="login.php"><u>Login</u></a> link located under the MyAccount dropdown menu. Then go to the Bookings tab, select the return car button for the booking you wish to cancel and confirm that you wish to end your booking. </p></td>
		 </tr>
			<tr class = thead-dark>
					<th colspan = "2" class ="text-center">Can't find what you're looking for?<a href="contacts.php" class="btn btn-info btn-block" role="button">Contact Us</a></th>
			</tr>
		</tbody>
		</table>

	<!--	<button class="accordion">Q: Do I have to pay for petrol?</button>
		<div class="panel">
			<h5><span class="label label-primary">Answer</span></h5>
			<p><Strong>No</strong>. The cost of petrol has already been included by EZshare into the standard hourly rate for the use of the vehicle. So to help customers using EZshare for long holiday or business trips, have a more affordable experience.</p>
		</div>

		<button class="accordion">Q: How do I make a booking?</button>
		<div class="panel">
			<h5><span class="label label-primary">Answer</span></h5>
			<p>You can simply make a booking by logging in through the <u>Login</u> tab located under the <u>MyAccount</u> dropbox. If you don't have an account you can make one by slecting the <u>SignUp</u> tab. Once you have logged in you can make a booking through the <u>Make a booking</u> tab and by selecting a vehicle located on the map in any location. Once done simply fill in the details of your booking and you're on your way!</p>
		</div>

		<button class="accordion">Q: How do I end my booking?</button>
		<div class="panel">
			<h5><span class="label label-primary">Answer</span></h5>
			<p>Simply drive the car you currently have booked to the dropoff location that you selected. Once there exit the vehicle and go to your profile under <u>MyAccount</u>, go to your bookings, select the current booking and confirm that you wish to end your booking.</p>
		</div>

		<button class="accordion">Q: How do I cancel a booking?</button>
		<div class="panel">
			<h5><span class="label label-primary">Answer</span></h5>
			<p>Simply login by using the <u>Login</u> tab located uner MyAccount. Then go to MyAccount, select your bookings select the booking you wish to cancel and then confirm the cancelation of the booking.  </p>
		</div>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}
	</script>-->
		</div>
	</body>
		<?php	include_once('footer.php');	?>
</html>
