@extends ('layout')


@section('pageHead')

<title>Car List</title>
   <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
    Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->

  <link rel="stylesheet" type="text/css" href="{{asset('/css/admin.css')}}">
  <style>
#completed{
	margin-top: 10px;
}
.container table-responsive-sm{
border-style: solid;

}
.nav-tabs{
  background-color: #f1f1f1;
  left: 15px;
  top: 10px;
  bottom: 10px;

	position: relative;
	float: left;
}




#myInput {
  background-image: url('{{asset("/icons/searchicon.png")}}' );
  position: relative;
  float: right;
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  right: 15px;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  top: 10px;
}
</style>
<!--Only admin can access this page-->

<?php
if(session()->has('email')){
    if(session()->get('email')!='admin@ezshare.com.au'){
      header('Location: /');
      exit;

    }

}else{
  header('Location: /');
  exit;
}
?>
@endsection
@section('content')
<!--Displays booking data and shows button to delete the booking-->

		<div class="container">

		<h1 class = "text-center">Delete Booking</h1>

    <div class="container table-responsive-sm">
<input type="text" id="myInput" placeholder="Search for a booking.." title="search">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#notCompleted">Current Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completed">Past Bookings</a>
        </li>
      </ul>
	  <div class="tab-content">
<div id="notCompleted" class="container tab-pane active">

<table id="myTable" action="bookingdeleteprocess.php">
  <tr class="header">
    <th style="width:5%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:20%;">Email</th>
	<th style="width:10%;">Date booked</th>
	<th style="width:10%;">Time booked</th>
	<th style="width:10%;">Hours booked</th>
	<th style="width:5%;">Total price</th>
	<th style="width:10%;">Pickup location</th>
	<th style="width:10%;">Return location</th>
	<th style="width:10%;"></th>
  </tr>
  <?php $x=0; ?>
    @foreach($bookings as $booking)
    @if(($booking->completed) == 0)
    <tr>
    <td>{{$booking->bookingID}}</td>
    <td>{{$booking->rego}}</td>
    <td>{{$booking->email}}</td>
    <td>{{$booking->dateBooked}}</td>
    <td>{{$booking->timeBooked}}</td>
    <td>{{$booking->hoursBooked}}</td>
    <td>{{$booking->totalPrice}}</td>
    <td>{{$booking->pickupLocation}}</td>
    <td>{{$booking->returnLocation}}</td>
    <td>
      <form action='/adminBookingsCheck' method='post'>
      {{csrf_field()}}
      <input type='hidden' id='userBooking{{$x++}}' name='userBooking' value="{{$booking->bookingID}}">
      <input type='submit'value="Delete this Booking?"onclick="return confirm('Are you sure you wish to DELETE/CANCEL this booking?')">
    </form>
    </td>
    </tr>
  @endif
    @endforeach


</table>
</div>

<div id="completed" class="container tab-pane fade">
<table id="myTable">
  <tr class="header">
    <th style="width:5%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:20%;">Email</th>
	<th style="width:10%;">Date booked</th>
	<th style="width:10%;">Time booked</th>
	<th style="width:10%;">Hours booked</th>
	<th style="width:5%;">Total price</th>
	<th style="width:10%;">Pickup location</th>
	<th style="width:10%;">Return location</th>
	<th style="width:10%;">Progress</th>
  </tr>
  @foreach($bookings as $booking)
  @if(($booking->completed) == 1)
  <tr>
  <td>{{$booking->bookingID}}</td>
  <td>{{$booking->rego}}</td>
  <td>{{$booking->email}}</td>
  <td>{{$booking->dateBooked}}</td>
  <td>{{$booking->timeBooked}}</td>
  <td>{{$booking->hoursBooked}}</td>
  <td>{{$booking->totalPrice}}</td>
  <td>{{$booking->pickupLocation}}</td>
  <td>{{$booking->returnLocation}}</td>
  <td>Completed</td>

  </tr>
@endif
  @endforeach

</table>
</div>
<!--Allows searching for specific cars-->

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</div>
    </div>
	</div>




@endsection
