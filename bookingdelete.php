<?php include_once('head.php'); ?>
<!DOCTYPE html>
<html>
	<head>
	<title>Booking List</title>
		<link rel="stylesheet" type="text/css" href="cssBookingDelete.css">
</head>
<body>
		<?php include_once('navbar.php'); ?>
		
		<div class="container">
		
		<h1 class = "text-center">Delete Booking</h1>
<input type="text" id="myInput" onkeyup="searchRego()" placeholder="Search for registration.." title="Type in a registration">
<input type="text" id="myInput2" onkeyup="searchEmail()" placeholder="Search for Email.." title="Type in a email">

<table id="myTable">
  <tr class="header">
    <th style="width:10%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:20%;">Email</th>
	<th style="width:10%;">Date booked</th>
	<th style="width:10%;">Time booked</th>
	<th style="width:10%;">Hours booked</th>
	<th style="width:5%;">Total price</th>
	<th style="width:10%;">Pickup location</th>
	<th style="width:10%;">Return location</th>
	<th style="width:5%;"></th>
  </tr>
  <tr>
        <?php

			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
            $sq = "SELECT * FROM booking";
            
            $results = mysqli_query($con, $sq);
            
            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
            echo "<tr>\n";
            echo "<td>{$row['bookingID']}</td>\n";
            echo "<td>{$row['rego']}</td>\n";
            echo "<td>{$row['email']}</td>\n";
            echo "<td>{$row['dateBooked']}</td>\n";
            echo "<td>{$row['timeBooked']}</td>\n";
			echo "<td>{$row['hoursBooked']}</td>\n";
			echo "<td>{$row['totalPrice']}</td>\n";
			echo "<td>{$row['pickupLocation']}</td>\n";
			echo "<td>{$row['returnLocation']}</td>\n";
			echo "<td><a href=bookingdeleteprocess.php?bookingID=".$row['bookingID'].">Delete</a></td>";
            echo "</tr>\n";
            }
			?>
  </tr>
</table>

<script>
function searchRego() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchEmail() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</div>
    </div>
	</body>
	    <?php include_once('footer.php');?>
</html>
