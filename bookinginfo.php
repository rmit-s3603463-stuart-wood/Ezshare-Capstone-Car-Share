<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/card.css">
  <?php  include_once('head.php');  ?>
  <title>Booking</title>


</head>
<body>
  <?php  include_once('navbar.php');  ?>

  <div class="row">
              <div class="col-75">
                <div class="container">
                  <form action="/action_page.php">

                    <div class="row">

                      <div class="col-50">
                        <h2>Vehicle Selection</h2>
                        <br>
                        <h4>Please select the vehicle you would like to hire</h4>

                        <div class="container2">
                        <span class="select">
                        <select>
                        <option value disabled selected>Select a vehicle</option>
                        <option value="be">Mercedes-Benz C300 Sedan</option>
                        <option value="ne">Pulsar ST Sedan</option>
                        <option value="lux">Nissan Patrol Ti-L</option>
                        <option value="lux">Nissan GT-R NISMO R35</option>
                        </select>
                        </span>
                        </div>
                        
                      </div>

                      <div class="col-50">
                        <h2>Pick Up Details</h2>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <h2>Drop Off Details</h2>

                      </div>


                    </div>

                    
                    
                    <input type="submit" value="Continue" class="btn">
                  </form>
                </div>
              </div>

            </div>
  </body>
  <?php  include_once('footer.php');  ?>
  <script>
  </script>
  </html>
