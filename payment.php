<!doctype html>
<html lang="en">
  <head>
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 149d6161759bb63a33e05a290410d540c0685769
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
>>>>>>> Development
<<<<<<< HEAD
>>>>>>> 149d6161759bb63a33e05a290410d540c0685769
=======
>>>>>>> 149d6161759bb63a33e05a290410d540c0685769
    <?php  include_once('head.php');  ?>
    <title>Payment</title>

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
        Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->

    <link rel="stylesheet" href="css/creditly.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="css/creditly.js"></script>
    <script type="text/javascript">
    $(function() {
      var creditly = Creditly.initialize(
          '.creditly-wrapper .expiration-month-and-year',
          '.creditly-wrapper .credit-card-number',
          '.creditly-wrapper .security-code',
          '.creditly-wrapper .card-type');

      $(".creditly-card-form .submit").click(function(e) {
        e.preventDefault();
        var output = creditly.validate();
        if (output) {
          // Your validated credit card output
          console.log(output);
        }
      });
    });
  </script>

  </head>

  <body>
<?php  include_once('navbar.php');  ?>

    <form class="creditly-card-form">
    <section class="creditly-wrapper blue-theme">
      <div class="credit-card-wrapper">
        <div class="first-row form-group">
          <div class="col-sm-8 controls">
            <label class="control-label">Card Number</label>
            <input class="number credit-card-number form-control"
              type="text" name="number"
              pattern="(\d*\s){3}\d*"
              inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number"
              placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
          </div>
          <div class="col-sm-4 controls">
            <label class="control-label">CVV</label>
            <input class="security-code form-control"·
              inputmode="numeric"
              pattern="\d*"
              type="text" name="security-code"
              placeholder="&#149;&#149;&#149;">
          </div>
        </div>
        <div class="second-row form-group">
          <div class="col-sm-8 controls">
            <label class="control-label">Name on Card</label>
            <input class="billing-address-name form-control"
              type="text" name="name"
              placeholder="John Smith">
          </div>
          <div class="col-sm-4 controls">
            <label class="control-label">Expiration</label>
            <input class="expiration-month-and-year form-control"
              type="text" name="expiration-month-and-year"
              placeholder="MM / YY">
          </div>
        </div>
        <div class="card-type">
        </div>
      </div>
    </section>
    <button class="submit"><span>Submit</span></button>
  </form>
  </body>
  <?php include_once('footer.php');?>

</html>
