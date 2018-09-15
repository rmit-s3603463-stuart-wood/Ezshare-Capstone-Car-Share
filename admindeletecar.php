<?php include_once('head.php'); ?>
<!doctype html>
<html lang="en">
<head>
  <title>CarList</title>
     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/ -->
      
      <link rel="stylesheet" href="css/card.css">
      <link href="css/card-js.min.css" rel="stylesheet" type="text/css" />
      <script src="css/card-js.min.js"></script>
  </head>
  <body>
    <?php  include_once('navbar.php');  ?>    
	<div class="container">
        <h2>Delete a Car</h2>
		<input type="text" id="myInput" onkeyup="searchRego()" placeholder="Search for registration.." title="Type in a registration">
        <table id="myTable">
			<tr class="header">
				<th style="width:10%;">Registration</th>
				<th style="width:10%;">Model</th>
				<th style="width:10%;">Make</th>
				<th style="width:10%;">Year</th>
				<th style="width:10%;">Tier</th>
				<th style="width:10%;">Seat Number</th>
				<th style="width:10%;">Engine</th>
				<th style="width:10%;">Price</th>
				<th style="width:10%;"></th>
			</tr>
            <?php
			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
			$sq = "SELECT rego, model, make, year, tier, seatNo, engine, price FROM cars";
            
			$results = mysqli_query($con, $sq);
            
			while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				print "<tr>\n";
				print "<td>{$row['rego']}</td>\n";
				print "<td>{$row['model']}</td>\n";
				print "<td>{$row['make']}</td>\n";
				print "<td>{$row['year']}</td>\n";
				print "<td>{$row['tier']}</td>\n";
				print "<td>{$row['seatNo']}</td>\n";
				print "<td>{$row['engine']}</td>\n";
				print "<td>{$row['price']}</td>\n";
				print "<td><a href=deletecar.php?rego=".$row['rego'].">Delete</a></td>";
				print "</tr>\n";
				}
			?>
        </table>
    </div>
				
	<script>
		function searchRego() {
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput");
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
</html>