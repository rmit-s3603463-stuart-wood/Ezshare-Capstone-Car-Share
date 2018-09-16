<?php include_once('head.php'); ?>
<!doctype html>
<html lang="en">
<head>
  <title>Car List</title>
     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->
      
		<link rel="stylesheet" type="text/css" href="cssBookingDelete.css">
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>    
	<div class="container">
        <h2 class = "text-center">Delete a Car</h2>
		<input type="text" id="myInput3" onkeyup="searchRego()" placeholder="Search for registration.." title="Type in a registration">
        <table id="myTable">
			<tr class="header">
				<th style="width:10%;">Registration</th>
				<th style="width:10%;">Model</th>
				<th style="width:10%;">Make</th>
				<th style="width:10%;">Year</th>
				<th style="width:5%;">Tier</th>
				<th style="width:10%;">Seat Number</th>
				<th style="width:10%;">Engine</th>
				<th style="width:10%;">Price</th>
				<th style="width:10%;">Station Name</th>
				<th style="width:10%;">Total KM/S</th>
				<th style="width:5%;"></th>
			</tr>
            <?php
			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
			$sq = "SELECT rego, model, make, year, tier, seatNo, engine, price, stationName, totalkm FROM cars";
            
			$results = mysqli_query($con, $sq);
            
			while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				echo "<tr>\n";
				echo "<td>{$row['rego']}</td>\n";
				echo "<td>{$row['model']}</td>\n";
				echo "<td>{$row['make']}</td>\n";
				echo "<td>{$row['year']}</td>\n";
				echo "<td>{$row['tier']}</td>\n";
				echo "<td>{$row['seatNo']}</td>\n";
				echo "<td>{$row['engine']}</td>\n";
				echo "<td>{$row['price']}</td>\n";
				echo "<td>{$row['stationName']}</td>\n";
				echo "<td>{$row['totalkm']}</td>\n";
				echo "<td><a href=deletecar.php?rego=".$row['rego'].">Delete</a></td>";
				echo "</tr>\n";
				}
			?>
        </table>
    </div>
				
	<script>
		function searchRego() {
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput3");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
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
	</body>
	    <?php include_once('footer.php');?>
</html>