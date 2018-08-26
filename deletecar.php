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
                  <h2>Remove a Car</h2>


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





                    </div>

                          <br>
                           <br>
                            <br>
                              <br>
                               <br>




                       </div>

                    <br>


                </div>
              </div>



          </body>



          <?php include_once('footer.php');?>

          </html>
