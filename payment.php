<!doctype html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta name="viewport" content="initial-scale=1">
  <meta charset="utf-8">

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->

      <?php include_once('head.php'); ?>

      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


      

      <link rel="stylesheet" href="css/card.css">

      <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />
      <script src="css/card-js.min.js"></script>

      <style type="text/css">
      form button {
        display: block;
        margin-top: 15px;
        width: 100%;
        font-size: 12px;
        padding: 8px 12px;
      }
    </style>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>


  </head>

  <body>
    <?php  include_once('navbar.php');  ?>
    

<script>
function initMap1() {
var rmitLatLng = {lat: -37.806989, lng: 144.963865};
var chadstoneLatLng = {lat: -37.885222, lng: 145.086158};

var mapProp1= {
    center:new google.maps.LatLng(-37.806989,144.963865),
    disableDefaultUI: true,
    zoom:17,
};

var mapProp2= {
    center:new google.maps.LatLng(-37.885222,145.086158),
    disableDefaultUI: true,
    zoom:17,
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
    map: map2,
    title: 'chadstone'
  });



}
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
            

              <div class="col-75">
                <div class="container">
                  <h2>Booking Details</h2>
                  <br>
                    <div class="row">

                      <div class="col-50">
                        <h4>Mercedes-Benz C300 Sedan</h4>
                        <br>
                        <img src="/resources/assets/img/Mercedes-Benz-C-Class.png" alt="Mercedes-Benz-C-Class">
                        <br>
                        <br>
                        <ul>
                        <li>2.0L 4 Clylinder Turbo Petrol Engine</li>
                        <li>Luxurious Interior</li>
                        <li>5 seats</li>
                        <li>Air Conditioning</li>
                        </ul>
                      </div>

                      <div class="col-50">

                        <br>

                        <div class="left">
                        <h4>Pick Up</h4>

                        <p>RMIT University<br/>
                           Monday 20 Aug 2018<br/>
                           12:30 PM<br/>
                        </p>

                        <br>
                        <br>



                        <div class="left">
                        <h4>Drop Off</h4>

                        <p>Chadstone Shopping Center<br/>
                           Monday 20 Aug 2018<br/>
                           2:30 PM<br/></p>
                        </div>

                        </div>

                        <div class="right">
                        <div id="map1" style="width:300px;height:150px;"></div>

                        <br>

                        <div class="right">
                        <div id="map2" style="width:300px;height:150px;"></div>

                
                        </div>


                        </div>




                      </div>




                    </div>

                    <br>

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
<td>2 hours at $100 an hour</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>$200.00</td>
</tr>
<tr>
<td>Administration Fee</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>$5.80</td>
</tr>
<tr>
<td>Vehicle Registration Recovery Fee</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>$30.00</td>
</tr>
<tr>
<td>Total Price</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>$235.80</td>
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
                          <td><h5>$235.80</h5></td>
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

               <input id="total_amount" type="number">         
                        
          </body>


            

            

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

                var x = document.getElementById("total_amount");
                var currentVal = x.value;
                console.log(currentVal);

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
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');

    </script>

          <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initMap1"></script>

          
          
          <?php include_once('footer.php');?>

          </html>
