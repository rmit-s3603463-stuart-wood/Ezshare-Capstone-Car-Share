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
<!--Displays car data and shows button to delete the car or change it's availability-->

<div class="container table-responsive-sm">
<input type="text" id="myInput" placeholder="Search for a vehicle.." title="Type in a registration">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#activeCars">Active Vehicles</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#maintenance">Maintenance</a>
    </li>
  </ul>
<div class="tab-content">
<div id="activeCars" class="container tab-pane active">

    <table id="myTable">
  <tr class="header">
    <th>Registration</th>
    <th>Model</th>
    <th>Make</th>
    <th>Year</th>
    <th>Tier</th>
    <th>Seat Number</th>
    <th>Engine</th>
    <th>Price</th>
    <th>Station Name</th>
    <th>Total KM/S</th>
    <th></th>
    <th></th>
  </tr>
<?php $x=0; ?>
  @foreach($cars as $car)
  @if(($car->availability) == 1)
  <tr>
  <td>{{$car->rego}}</td>
  <td>{{$car->model}}</td>
  <td>{{$car->make}}</td>
  <td>{{$car->year}}</td>
  <td>{{$car->tier}}</td>
  <td>{{$car->seatNo}}</td>
  <td>{{$car->engine}}</td>
  <td>${{$car->price}}</td>
  <td>{{$car->stationName}}</td>
  <td>{{$car->totalkm}}</td>
  <td>
    <form action='/adminUnSetCar' method='post'>
    {{csrf_field()}}
    <input type='hidden' id='setCarRego{{$x}}' name='carRego' value="{{$car->rego}}">
    <input type='submit'value="Make car unavailable?"onclick="return confirm('are you sure you wish to SET this car to be UNAVAILABLE?\n This WILL remove all relevent bookings associated with this car')">
  </form>

  </td>
  <td>
    <form action='/adminDeleteCarCheck' method='post'>
    {{csrf_field()}}
    <input type='hidden' id='del1CarRego{{$x++}}' name='carRego' value="{{$car->rego}}">
    <input type='submit'value="Delete this car?"onclick="return confirm('are you sure you wish to DELETE this car?\n This WILL remove all relevent bookings associated with this car')">
  </form>

  </td>

  </tr>

@endif
  @endforeach

    </table>
</div>
<div id="maintenance" class="container tab-pane fade">

    <table id="myTable">
  <tr class="header">
    <th style="width:10%;">Registration</th>
    <th style="width:10%;">Model</th>
    <th style="width:10%;">Make</th>
    <th style="width:5%;">Year</th>
    <th style="width:5%;">Tier</th>
    <th style="width:10%;">Seat Number</th>
    <th style="width:10%;">Engine</th>
    <th style="width:5%;">Price</th>
    <th style="width:10%;">Station Name</th>
    <th style="width:10%;">Total KM/S</th>
    <th style="width:5%;"></th>
    <th style="width:5%;"></th>
  </tr>
  @foreach($cars as $car)
  @if(($car->availability) == 0)

  <tr>
  <td>{{$car->rego}}</td>
  <td>{{$car->model}}</td>
  <td>{{$car->make}}</td>
  <td>{{$car->year}}</td>
  <td>{{$car->tier}}</td>
  <td>{{$car->seatNo}}</td>
  <td>{{$car->engine}}</td>
  <td>{{$car->price}}</td>
  <td>{{$car->stationName}}</td>
  <td>{{$car->totalkm}}</td>
  <td>
    <form action='/adminSetCar' method='post'>
    {{csrf_field()}}
    <input type='hidden' id='setCarRego{{$x}}' name='carRego' value="{{$car->rego}}">
    <input type='submit' value="Make car available?" onclick="return confirm('are you sure you wish to SET this car to be AVAILABLE?')">
  </td>
</form>
  <td>
    <form action='/adminDeleteCarCheck' method='post'>
    {{csrf_field()}}
    <input type='hidden' id='del2CarRego{{$x++}}' name='carRego' value="{{$car->rego}}">
    <input type='submit'value="Delete this car?" onclick="return confirm('are you sure you wish to DELETE this car?\n This WILL remove all relevent bookings associated with this car')">
  </form>

  </td>

  </tr>

@endif
  @endforeach

    </table>
</div>
</div>




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






@endsection
