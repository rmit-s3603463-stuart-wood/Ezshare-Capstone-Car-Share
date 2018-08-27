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
                  <h2>Add a Car</h2>
                  <br>
                    <div class="row">

                      <div class="container">
                          <form class="form-horizontal" action="/action_page.php">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="fname">Registration</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" placeholder="Car Registration Number" name="fname">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="pwd">Car Model</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="model" placeholder="Car Model" name="model">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Make</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="make" placeholder="Car Make" name="make">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="ptime">Year</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control" id="year" placeholder="09/01/2018" name="year">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="tier">Car Tier</label>
                              <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Select a Tier</option>
                                <option value="1">Tier 1</option>
                                <option value="2">Tier 2</option>
                                <option value="3">Tier 3</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="pwd">Number Of Seats</label>
                              <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Select Number of Car Seats</option>
                                <option value="1">2 Seats</option>
                                <option value="2">3 Seats</option>
                                <option value="3">4 Seats</option>
                                <option value="4">5 Seats</option>
                                <option value="5">6 Seats</option>
                                <option value="6">7 Seats</option>
                                <option value="7">8 Seats</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="engine">Engine</label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" id="engine" placeholder="Engine Performance" name="dtime">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="price">Price</label>
                              <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" placeholder="Car Price" name="dtime">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="seats">Station Name</label>
                              <div class="col-sm-10">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Station Name</option>
                                <option value="1">Melbourne</option>
                                <option value="2">Brunswick</option>
                                <option value="3">Broadmedows</option>
                                <option value="4">Essendon</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="ptime">Car Image</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" placeholder="Car Image" name="image">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Add Car To Database</button>
                              </div>
                            </div>

                          </form>

                      </div>

                      <div class="col-50">

                        <br>

                        <div class="left">

                        </p>

                        <br>
                        <br>








                    </div>

                    <br>

                    <div class="row">

                      <div class="container">
                        <h2>Delete a Car</h2>

                      
                        <table border="1px">

                            <tr>
                                <th>Rego</th>
                                <th>Model</th>
                                <th>Make</th>
                                <th>Year</th>
                                <th>Tier</th>
                                <th>Seat Number</th>
                                <th>Engine</th>
                                <th>Price</th>
                            </tr>

                                <?php

                                    If(mysql_num_rows($result)>0)
                                    {
                                        while($rows=mysql_fetch_array($result))
                                        {

                                ?>
                            <?php echo "<tr>";?>
                                            <td><?php echo $rows['Rego'];?> </td>
                                            <td><?php echo $rows['Model'];?></td>
                                            <td><?php echo $rows['Make'];?></td>
                                            <td><?php echo $rows['Year'];?></td>
                                            <td><?php echo $rows['Tier'];?></td>
                                            <td><?php echo $rows['SeatNo'];?></td>
                                            <td><?php echo $rows['engine'];?></td>
                                            <td><?php echo $rows['Price'];?></td>


                            <?php echo "</tr>";?>
                                <?php
                                        }
                                    }

                            ?>
                        </table>
                            <?php

                            ?>
                         <br>

<table>

                       </div>

                      <div class="col-50">


                          <br>
                           <br>
                            <br>
                              <br>
                               <br>







                       </div>





                       </div>

                    <br>


                </div>
              </div>



          </body>



          <?php include_once('footer.php');?>

          </html>
