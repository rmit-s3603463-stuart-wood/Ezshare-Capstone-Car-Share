<!doctype html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta name="viewport" content="initial-scale=1">
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
    

  </head>

  <body>
    <?php  include_once('navbar.php');  ?>

    <style>

    .demo-container {
      width: 100%;
      max-width: 350px;
      margin: 5px auto;
    }

    form {
      margin: 30px;
    }
    input {
      width: 200px;
      margin: 10px auto;
      display: block;
    }

    var card = new Card({
      // a selector or DOM element for the form where users will
      // be entering their information
      form: 'form', // *required*
      // a selector or DOM element for the container
      // where you want the card to appear
      container: '.card-wrapper', // *required*

      formSelectors: {
        numberInput: 'input#number', // optional — default input[name="number"]
        expiryInput: 'input#expiry', // optional — default input[name="expiry"]
        cvcInput: 'input#cvc', // optional — default input[name="cvc"]
        nameInput: 'input#name' // optional - defaults input[name="name"]
        },

        width: 200, // optional — default 350px
        formatting: true, // optional - default true

        // Strings for translation - optional
        messages: {
          validDate: 'valid\ndate', // optional - default 'valid\nthru'
          monthYear: 'mm/yyyy', // optional - default 'month/year'
          },

          // Default placeholders for rendered fields - optional
          placeholders: {
            number: '•••• •••• •••• ••••',
            name: 'Full Name',
            expiry: '••/••',
            cvc: '•••'
            },

            masks: {
              cardNumber: '•' // optional - mask card number
              },

              // if true, will log helpful messages for setting up Card
              debug: false // optional - default false
              });

            </style>
            
            <div class="row">
              <div class="col-75">
                <div class="container">
                  <form action="/action_page.php">

                    <div class="row">
                      <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="John Smith">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="johnsmith@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="100 Example Street">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="Melbourne">

                        
                        
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="VIC">
                        
                        
                        <label for="zip">Zip</label>
                        <input type="text" id="zip" name="zip" placeholder="3000">
                        
                        
                      </div>

                      <div class="col-50">
                        <h3>Payment</h3>
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="name" placeholder="John Smith">
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="number" placeholder="XXXX-XXXX-XXXX-XXXX">
                        <label for="expmonth">Expiry Date</label>
                        <input type="text" id="expmonth" name="expiry" placeholder="MM/YY">

                        <div class="row">
                          <div class="col-50">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvc" placeholder="XXX">
                          </div>
                        </div>
                        <div class="demo-container">
                          <div class="card-wrapper"></div>
                        </div>
                      </div>
                    </div>

                    
                    
                    <input type="submit" value="Continue to checkout" class="btn">
                  </form>
                </div>
              </div>

            </div>



            <script src="dist/card.js"></script>
            <script>
              new Card({
                form: document.querySelector('form'),
                container: '.card-wrapper'
              });
            </script>

          </body>
          <?php include_once('footer.php');?>

          </html>
