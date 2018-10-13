<?php include_once('head.php'); ?>
<?php include('addcar.php'); ?>
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
        <h2>Add a Car</h2>
        <form action="addremovecar.php" method="post" name="addcar" role="form">
			<?php include('errors.php'); ?>
            <label for="rego">Registration</label><input type="text" id="rego" name="rego">

			<label for="model">Car Model</label><input type="text" id="model" name="model">

            <label  for="make">Make</label><input type="text" id="make" name="make">

            <label  for="year">Year</label><input type="number" id="year" name="year">

            <label for="tier">Car Tier</label><input type="number" id="tier" name="tier">

            <label for="seatNo">Number Of Seats</label><input type="number" id="seatNo" name="seatNo">

            <label for="engine">Engine</label><input type="text"id="engine" name="engine">

            <label for="price">Price</label><input type="number" id="price" name="price">

			<label for="carImage">Car Image</label><input type="file" id="carPic" name="carPic">

            <label  for="stationName">Station Name</label><input type="text" id="stationName" name="stationName">

			<label for="carCords">carCords</label><input type="text" id="carCords" name="carCords">

			<label for="booked">Is the car booked</label><input type="text" id="booked" name="booked">

			<label for="availability">availability</label><input type="text" id="availability" name="availability">

			<button type="submit" class="btn" name="add_car">Add Car</button>
        </form>
	</div>

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
			$con = mysqli_connect("localhost","Admin","p@ssword","carshare") or die("Error " . mysqli_error($con));
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
    <?php include_once('footer.php');?>
</html>
