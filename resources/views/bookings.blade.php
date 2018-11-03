@extends ('layout')

@section('pageHead')
<!-- bootstrap-datetimepicker code obtained from 'Eonasdan', https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script type="text/javascript" src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>

<title>EZshare - Bookings</title>
<style>
    body{
    color: #1e3f5a;
    }
    h1{
    padding: 10px;
    }

    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }


    .container {
      background-color: #f2f2f2;
      padding: 30px;
      margin-top: 20px;
      margin-bottom: 20px;
      border: 1px solid lightgrey;
      border-radius: 15px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }


    input[type="number"] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    select {
    	  width: 100%;
    	margin-bottom: 20px;
    	padding: 12px;
    	border: 1px solid #ccc;
    	border-radius: 3px;

    }


    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #7892c2;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
      top: 10px;
    }

    .btn:hover {
      background-color: #476e9e;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }

    .left {
      width: 50%;
      float:left

    }

    .right {
      width: 50%;
      float:right
    }

    .centerform {
      width: 80%;
      margin: 0 auto;
    }
</style>
@endsection

@section('content')
<!-- Logic to check if the user already has a booking active -->
<?php
if(session()->has('email')){
  $user=session()->get('email');
  foreach($bookings as $booking){
    if(($booking->email == $user)&&($booking->completed == 0)){
      echo 'alert("You can only have one booking at a time!")';
      header('Location: /myAccount');
      exit;
    }
  }
}else{
  header('Location: /');
  exit;
}
?>

<!-- Inital map code for booking page -->
<script>
var map;
var stationName = "";
if (stationName == "Chadstone") {
var markerData = [{lat: -37.885222 , lng: 145.086158  , zoom: 17 , name: "Chadstone Shopping Centre"}];
} else if (stationName == "RMIT") {
var markerData = [{lat: -37.806989 , lng: 144.963865  , zoom: 17 , name: "RMIT"}];
} else  {
var markerData = [{lat: -37.669046 , lng: 144.841049  , zoom: 12 , name: "Melbourne Airport"}];
}


/*function initialize() {
markerData.forEach(function(data) {
var czoom = data.zoom;
var clat = data.lat;
var clong = data.lng;
console.log(czoom);

map = new google.maps.Map(document.getElementById('map1'), {
zoom: czoom,
center: {lat: clat, lng: clong}
});
});
markerData.forEach(function(data) {
var newmarker= new google.maps.Marker({
  map:map,
  position:{lat:data.lat, lng:data.lng},
  title: data.name
});
jQuery("#selectlocation").append('<option value="'+[data.lat, data.lng,data.zoom].join('|')+'">'+data.name+'</option>');
});
}
google.maps.event.addDomListener(window, 'load', initialize);
*/
jQuery(document).on('change','#selectlocation',function() {
var latlngzoom = jQuery(this).val().split('|');
var newzoom = 1*latlngzoom[2],
newlat = 1*latlngzoom[0],
newlng = 1*latlngzoom[1];
map.setZoom(newzoom);
map.setCenter({lat:newlat, lng:newlng});
});
$(function () {
$("#EndDate").change(function () {
var startDate = document.getElementById("StartDate").value;
var endDate = document.getElementById("EndDate").value;
if ((Date.parse(endDate) < Date.parse(startDate))) {
alert("Drop off date should be greater than pick up date");
document.getElementById("EndDate").value = "<?php echo date("Y-m-d"); ?>";

}
});
$("#StartDate").change(function () {
var startDate = document.getElementById("StartDate").value;
var endDate = document.getElementById("EndDate").value;
if ((Date.parse(startDate) > Date.parse(endDate))) {
alert("Drop off date should be greater than pick up date");
document.getElementById("StartDate").value = "<?php echo date("Y-m-d"); ?>";

}
});
$("#dtime").change(function () {
var startDate = document.getElementById("StartDate").value;
var endDate = document.getElementById("EndDate").value;
var startTime = document.getElementById("ptime").value;
var endTime = document.getElementById("dtime").value;
var start = new Date("November 13, 2013 " + startTime);
start = start.getTime();
var end = new Date("November 13, 2013 " + endTime);
end = end.getTime();
if ((startDate = endDate) && (start > end)) {
alert("Drop off time should be greater than pick up time");
document.getElementById("dtime").value = "";
}
if (end - start < 1800000) {
alert("The minimum time to rent a car is 30 minutes");
document.getElementById("dtime").value = "";
}
if (startDate = endDate)
{
console.log("true");
}
console.log(Date.parse(startDate));
console.log(Date.parse(endDate));
});
$("#ptime").change(function () {
var startDate = document.getElementById("StartDate").value;
var endDate = document.getElementById("EndDate").value;
var startTime = document.getElementById("ptime").value;
var endTime = document.getElementById("dtime").value;
var start = new Date("November 13, 2013 " + startTime);
start = start.getTime();
var end = new Date("November 13, 2013 " + endTime);
end = end.getTime();
console.log("Time1: "+ start + " Time2: " + end);
if ((startDate = endDate) && (start > end)) {
alert("Drop off time should be greater than pick up time");
document.getElementById("ptime").value = "";
}
});
});


</script>

<script type="text/javascript">


$(document).ready(function() {

  @foreach($currentStation as $station)
  $("#selectlocation").append($("<option></option>").val("{{$station->stationName}}").html("{{$station->stationName}}"));
  @endforeach

  @foreach($stations as $station)
  $("#selectlocation2").append($("<option></option>").val("{{$station->stationName}}").html("{{$station->stationName}}"));
  @endforeach

  });


//Date time picker logic from 'Eonasdan', https://github.com/Eonasdan/bootstrap-datetimepicker
$(function () {
$('#datetimepicker6').datetimepicker({
  format: "DD/MM/YYYY - hh:mm A",

  minDate: new Date()

});
var minDropOff = new Date();
minDropOff.setMinutes(minDropOff.getMinutes() + 30);

$('#datetimepicker7').datetimepicker({
  format: "DD/MM/YYYY - hh:mm A",
  minDate: minDropOff

});

$("#datetimepicker6").on("dp.change", function (e) {
    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
});
$("#datetimepicker7").on("dp.change", function (e) {
    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
});
});


</script>



<div class="container">
<div class="row">
<div class="col-75">

<div class="row">

  <div class="col-50">
    <h2>Your Information:</h2>
    <br>

    <div class = "centerform">

      <!-- Form for bookings -->
      <form class="form-horizontal" method="POST" action="{{ asset('/payment') }}" id="form">

        {{ csrf_field() }}

        <label for="fname">First Name:</label>
        <div>
          <input type="text" class="form-control" id="fname" value="@foreach($currentCustomer as $customer){{$customer->firstName}}@endforeach" name="fname" readonly>
        </div>

        <label for="lname">Last Name:</label>
        <div>
          <input type="text" class="form-control" id="lname" value="@foreach($currentCustomer as $customer){{$customer->lastName}}@endforeach" name="lname" readonly>
        </div>

        <label for="email">Email:</label>
        <div>
          <input type="email" class="form-control" id="email" value="@foreach($currentCustomer as $customer){{$customer->email}}@endforeach" name="email" readonly>
        </div>

        <br>

        <label for="phone">Phone Number:</label>
        <div>
          <input type="tel" class="form-control" id="phone" value="@foreach($currentCustomer as $customer){{$customer->phone}}@endforeach" name="phone" readonly>
        </div>

        <input type="text" class="form-control" id="rego" value="@foreach($currentCar as $car){{$car->rego}}@endforeach" name="rego" hidden>

        <input type="text" class="form-control" id="pdate" value="" name="pdate" hidden>
        <input type="text" class="form-control" id="ptime" value="" name="ptime" hidden>
        <input type="text" class="form-control" id="ddate" value="" name="ddate" hidden>
        <input type="text" class="form-control" id="dtime" value="" name="dtime" hidden>

        <input type="text" class="form-control" id="mins" value="" name="mins" hidden>
        <input type="text" class="form-control" id="hrs" value="" name="hrs" hidden>
        <input type="text" class="form-control" id="gtotal" value="" name="gtotal" hidden>
        <input type="number" class="form-control" id="completed" value="1" name="completed" hidden>

        <br>

    </div>

      <br>

      <!-- Logic to get the total price based on the start and end time-->
      <script>

      function set() {

        var fdatetime;
        $(function() {
          fdatetime = $('#fdatetime').val();
        });

        var tdatetime;
        $(function() {
          tdatetime = $('#tdatetime').val();
        });

        var fname = document.getElementById('fname').value;
        var lname = document.getElementById('lname').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        console.log(fname);
        console.log(lname);
        console.log(email);
        console.log(phone);

        var str = fdatetime;
        var array = str.split(' - '),
        pdate = array[0], ptime = array[1];

        pdate = pdate.replace(/\s+/g, '');

        pdate = pdate.replace(new RegExp('/', 'g'), '-');

        pdate = pdate.replace(/^(\d{2})-(\d{2})-(\d{4})$/, "$3/$2/$1")

        ptime = ptime.replace(/\s+/g, '');

        ptime = ptime.replace("A", " A").replace("P", " P");

        ptime = convertTime12to24(ptime);

        console.log(pdate);
        console.log(ptime);

        var str2 = tdatetime;
        var array2 = str2.split(' - '),
        ddate = array2[0], dtime = array2[1];

        ddate = ddate.replace(/\s+/g, '');

        ddate = ddate.replace(new RegExp('/', 'g'), '-');

        ddate = ddate.replace(/^(\d{2})-(\d{2})-(\d{4})$/, "$3/$2/$1")

        dtime = dtime.replace(/\s+/g, '');

        dtime = dtime.replace("A", " A").replace("P", " P");

        dtime = convertTime12to24(dtime);

        console.log(ddate);
        console.log(dtime);




        function convertTime12to24(time12h) {
  const [time, modifier] = time12h.split(' ');

  let [hours, minutes] = time.split(':');

  if (hours === '12') {
    hours = '00';
  }

  if (modifier === 'PM') {
    hours = parseInt(hours, 10) + 12;
  }

  return hours + ':' + minutes;
}
var date1 = new Date(pdate + " " + ptime);
date1 = date1.getTime();
var date2 = new Date(ddate + " " + dtime);
date2 = date2.getTime();


console.log(date1);
console.log(date2);

//difference between two dates in msec(milliseconds)
var diff = date2 - date1;

console.log(diff);

var mins = Math.floor(diff / 60000);
var hrs = Math.floor(mins / 60);
var days = Math.floor(hrs / 24);
var yrs = Math.floor(days / 365);

console.log('mins ' + mins);

console.log('hrs ' + hrs);

console.log('days ' + days);

console.log('yrs ' + yrs);

mins = mins % 60;
console.log('For use: ' + hrs + " hours, " + mins + " minutes")

@foreach($currentCar as $car)
var price = '{{$car->price}}';
@endforeach

var calcmin = mins/60 * price;
var timeprice = (hrs * price) + calcmin;
var timeprice2 = timeprice.toFixed(2);
var admin = 5.80;
var rego = 30.00;
var total = timeprice + admin + rego;
var total2 = total.toFixed(2);

var gtotal = total;
var gtotal = gtotal.toFixed(2);

document.getElementById('pdate').value = pdate;
document.getElementById('ptime').value = ptime;
document.getElementById('ddate').value = ddate;
document.getElementById('dtime').value = dtime;

document.getElementById('mins').value = mins;
document.getElementById('hrs').value = hrs;
document.getElementById('gtotal').value = gtotal;

      }


      </script>


    <h2>Your Vehicle:</h2>

    <br>
    <!-- Showing the Selected car information, including image -->
    @foreach($currentCar as $car)
     <hr>
                         <h2 class = "text-center"><img src="{{ asset('/img') }}/{{$car->carPic}}" class="rounded img-fluid"  alt="sedan" width="300" height="250"></h2><hr>'
                         <h3 class = "text-center">{{$car->model}}</h3>
                         <h4 class = "text-center"> Cost per hour: ${{$car->price}}</h4><br>
    @endforeach
</div>

<div class="col-50">
<h2>Pick Up Details:</h2>

<br>

<div class = "centerform">



<label for="pdate">Pick Up date and time:</label>

<div class='input-group date' id='datetimepicker6'>
        <input type='text' name = "fdatetime" class="form-control" id = "fdatetime"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>




<br>

<label for="plocation">Pick Up Location</label>

<div>

<select id="selectlocation" name="plocation" form="form">



</select>

</div>

<!--<div id="map1" style="width:100%;height:150px;"></div>-->


</div>

<br>
<br>
<br>


<h2>Drop Off Details:</h2>



<div class = "centerform">



<br>

<label for="ddate">Drop Off date and time:</label>
<div class='input-group date' id='datetimepicker7'>
        <input type='text' name = "tdatetime" class="form-control" id = "tdatetime"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>




<br>

<label for="dlocation">Drop Off Location</label>
<div>
<select id="selectlocation2" name="dlocation" form="form">
</select>
</div>

<!--<div id="map2" style="width:100%;height:150px;"></div>-->
<input type="submit" onclick="set()" value="Continue" class="btn">
</form>
</div>



</div>
</div>

</div>
</div>
</div>


@endsection
