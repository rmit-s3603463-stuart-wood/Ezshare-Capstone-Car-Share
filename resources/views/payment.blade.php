@extends ('layout')

@section('pageHead')
<title>EZshare - Payment</title>
<style>
    body{
    color: #1e3f5a;
    }
    h1{
    padding: 10px;
    }
</style>
@endsection

@section('content')
<!–– PayPal sandbox provided by PayPal ––>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>

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

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>
      function initMap1() {
        var rmitLatLng = {lat: -37.806989, lng: 144.963865};
        var chadstoneLatLng = {lat: -37.885222, lng: 145.086158};
        var melbairportLatLng = {lat: -37.669046, lng: 144.841049};
        gestureHandling: 'greedy'

        var mapProp1= {
          center:new google.maps.LatLng(),
          disableDefaultUI: true,
          zoom:15,
        };

        var mapProp2= {
          center:new google.maps.LatLng(),
          disableDefaultUI: true,
          zoom:15,
        };

        var map1=new google.maps.Map(document.getElementById("map1"),mapProp1);

        var map2=new google.maps.Map(document.getElementById("map2"),mapProp2);

        var rmitmarker = new google.maps.Marker({
          position: rmitLatLng,
          map: map1,
          title: 'rmit'
        });

        var chadstonemarker = new google.maps.Marker({
          position: chadstoneLatLng,
          map: map1,
          title: 'chadstone'
        });

        var melbairportmarker = new google.maps.Marker({
          position: melbairportLatLng,
          map: map1,
          title: 'melbarirport'
        });

        var rmitmarker = new google.maps.Marker({
          position: rmitLatLng,
          map: map2,
          title: 'rmit'
        });

        var chadstonemarker = new google.maps.Marker({
          position: chadstoneLatLng,
          map: map2,
          title: 'chadstone'
        });

        var melbairportmarker = new google.maps.Marker({
          position: melbairportLatLng,
          map: map2,
          title: 'melbarirport'
        });
      }



    </script>
    @php

      $fdatetime = $_POST['fdatetime'];

      list($pdate2, $ptime2) = explode(" - ", $fdatetime);
      $pdate2 = str_replace('/', '-', $pdate2);
      $pdate2 = date("Y-m-d", strtotime($pdate2));
      $pdate = str_replace('-', '/', $pdate2);

      $ptime = date("G:i", strtotime($ptime2));

      //$name = $_SESSION['firstName']. " " .$_SESSION['lastName'];
      //$email = $_SESSION['email'];
      //$phone = $_SESSION['phone'];



      //$_SESSION['pdate'] = $pdate;


      $plocation = $_POST['plocation'];


      //$ddate1 = $_POST['ddate'];
      //$ddate = str_replace('-', '/', $ddate1);
      //$dtime = $_POST['dtime'];

      $tdatetime = $_POST['tdatetime'];

      list($ddate2, $dtime2) = explode(" - ", $tdatetime);
      $ddate2 = str_replace('/', '-', $ddate2);
      $ddate2 = date("Y-m-d", strtotime($ddate2));
      $ddate = str_replace('-', '/', $ddate2);

      $dtime = date("G:i", strtotime($dtime2));


      $dlocation = $_POST['dlocation'];

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      @endphp
        <script>

        var pdate = '@php echo $pdate; @endphp';
        var ptime = '@php echo $ptime; @endphp';
        var ddate = '@php echo $ddate; @endphp';
        var dtime = '@php echo $dtime; @endphp';

        console.log(pdate);
        console.log(ptime);
        console.log(ddate);
        console.log(dtime);

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


        window.onload = function write(){
        document.getElementById("hours").innerHTML = hrs;
        document.getElementById("minutes").innerHTML = mins;
        document.getElementById("timeprice2").innerHTML = timeprice2;
        document.getElementById("admin").innerHTML = admin;
        document.getElementById("rego").innerHTML = rego;
        document.getElementById("total2").innerHTML = total2;
        document.getElementById("gtotal").innerHTML = gtotal;

        };
      </script>

    <style>
    form {
      margin: 30px;
    }
    input {
      width: 200px;
      margin: 10px auto;
      display: block;
    }

  </style>


<meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="col-75">
    <div class="container">
      <h2>Booking Details</h2>
      <br>
      <div class="row">

        <div class="col-50">

          @foreach($currentCar as $car)
     <hr>
                         <h2 class = "text-center"><img src="{{ asset('/img') }}/{{$car->carPic}}" class="rounded img-fluid"  alt="sedan" width="300" height="250"></h2><hr>'
                         <h3 class = "text-center">{{$car->model}}</h3>
                         <h4 class = "text-center"> Cost per hour: ${{$car->price}}</h4><br>
    @endforeach

        </div>

        <div class="col-50">

          <br>

          <div class="left">
            <h4>Pick Up</h4>

            <p>Date: @php echo date('d/m/Y', strtotime($pdate)); @endphp<br/>
             Time: @php echo date('h:i A', strtotime($ptime)); @endphp<br/>
             Location: @php echo $plocation @endphp<br/>
           </p>

           <br>
           <br>



           <div class="left">
            <h4>Drop Off</h4>

            <p>Date: @php echo date('d/m/Y', strtotime($ddate)); @endphp<br/>
             Time: @php echo date('h:i A', strtotime($dtime)); @endphp<br/>
             Location: @php echo $dlocation @endphp
           </p>
           </div>

         </div>

         <div class="right">
          <div id="map1" style="width:100%;height:150px;"></div>

          <br>


          <div id="map2" style="width:100%;height:150px;"></div>





        </div>




      </div>




    </div>

    <br>

    @foreach($currentCar as $car)
        @php $price = $car->price; @endphp
    @endforeach

    <script>
      var price = @php echo $price; @endphp;
      var price =  parseInt(price);
      var calcmin = mins/60 * price;
      var timeprice = (hrs * price) + calcmin;
      var timeprice2 = timeprice.toFixed(2);
      var admin = 5.80;
      var rego = 30.00;
      var total = timeprice + admin + rego;
      var total2 = total.toFixed(2);

      var gtotal = total;
      var gtotal = gtotal.toFixed(2);
      console.log(price);
      console.log(typeof price);
    </script>

    <div class="row">

      <div class="col-50">
        <h4>Summary of Charges</h4>

        <br>

        <table>
          <tbody>
            <tr>
              <td><h5>Cost Details</h5></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Hiring for: <span id="hours"></span> hours, <span id="minutes"></span> minutes</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="timeprice2"></span></td>
            </tr>
            <tr>
              <td>Administration Fee</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="admin"></span></td>
            </tr>
            <tr>
              <td>Vehicle Registration Recovery Fee</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="rego"></span></td>
            </tr>
            <tr>
              <td>Total Price</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>$<span id="total2"></span></td>
            </tr>
          </tbody>
        </table>

      </div>

      <div class="col-50">


        <br>
        <br>
        <br>
        <br>
        <br>



        <table>
          <tbody>
            <tr>
              <td><h5>Total Rental Cost:</h5></td>
              <td>&nbsp;</td>
              <td><h5>$<span id="gtotal"></span></h5></td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>

        <div id="paypal-button-container"></div>


      </div>





    </div>

    <br>


  </div>
</div>

<script>

  paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
              sandbox:    'AQwFnSEPKOSlT0ap8RhkGFyJ178q7qZAMdlJLc76coRmk7AcVIYN4liyVTY0zViKLwWRY4r51mnZybB2'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment

                var x = gtotal;
                var currentVal = x;
                console.log(gtotal);

                return actions.payment.create({
                  payment: {
                    transactions: [
                    {
                      amount: { total: currentVal, currency: 'AUD' }
                    }
                    ]
                  }
                });
              },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                  type: 'POST',
                  url: '/receipt',
                  data: {_token: CSRF_TOKEN,hrs:hrs,mins:mins,gtotal:gtotal},
                  dataType: 'JSON',
                  success: function(data) {

                  }
                  })

                  window.location.replace("/receipt");

                });
              }

            }, '#paypal-button-container');

          </script>

          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap1"></script>


@endsection
