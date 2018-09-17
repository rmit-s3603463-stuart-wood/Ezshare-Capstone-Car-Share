
<!DOCTYPE html>
<html>
	<head>
		<?php include_once('head.php'); ?>
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
    <th style="width:20%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:30%;">Email</th>
	<th style="width:15%;">date booked</th>
	<th style="width:15%;">time booked</th>
	<th style="width:10%;"></th>
  </tr>
  <tr>
        <?php

			$con = mysqli_connect("localhost","Admin","p@ssword","carshare") or die("Error " . mysqli_error($con));
            $sq = "SELECT bookingID, rego, email, dateBooked, timeBooked FROM booking";

            $results = mysqli_query($con, $sq);

            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
            print "<tr>\n";
            print "<td>{$row['bookingID']}</td>\n";
            print "<td>{$row['rego']}</td>\n";
            print "<td>{$row['email']}</td>\n";
            print "<td>{$row['dateBooked']}</td>\n";
            print "<td>{$row['timeBooked']}</td>\n";
			print "<td><a href=bookingdeleteprocess.php?bookingID=".$row['bookingID'].">Delete</a></td>";
            print "</tr>\n";
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

function btnalert() {
	alert("item deleted");
}
</script>


        <?php
		/*
			$con = mysqli_connect("localhost","Admin","p@ssword","carshare") or die("Error " . mysqli_error($con));
            $sq = "SELECT bookingID, rego, email, dateBooked, timeBooked FROM booking";

            $results = mysqli_query($con, $sq);

            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
            print "<tr>\n";
            print "<td>{$row['bookingID']}</td>\n";
            print "<td>{$row['rego']}</td>\n";
            print "<td>{$row['email']}</td>\n";
            print "<td>{$row['dateBooked']}</td>\n";
            print "<td>{$row['timeBooked']}</td>\n";
			print "<td><a href=bookingdeleteprocess.php?bookingID=".$row['bookingID'].">Delete</a></td>";
            print "</tr>\n";
            }
			*/
		?>
</div>
    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>Footer</p>
    </div>
	</body>
</html>
