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
<<<<<<< HEAD
        <h2>Delete a Car</h2>
		<input type="text" id="myInput" onkeyup="searchRego()" placeholder="Search for registration.." title="Type in a registration">
=======
	<style>
#completed{
	margin-top: 10px;
}
.container table-responsive-sm{
border-style: solid;

}
.nav-tabs{
  background-color: #f1f1f1;
  left: 15px;
  top: 10px;
  bottom: 10px;

	position: relative;
	float: left;
}




#myInput {
  background-image: url('/css/searchicon.png');
  position: relative;
  float: right;
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  right: 15px;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  top: 10px;
}
</style>
    <div class="container table-responsive-sm">
		<input type="text" id="myInput" placeholder="Search for a vehicle.." title="Type in a registration">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#activeCars">Active Vehicles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#maintenance">Maintenance</a>
        </li>
      </ul>
	  <div class="tab-content">
<div id="activeCars" class="container tab-pane active">

>>>>>>> Development
        <table id="myTable">
			<tr class="header">
				<th style="width:10%;">Registration</th>
				<th style="width:10%;">Model</th>
				<th style="width:10%;">Make</th>
<<<<<<< HEAD
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
=======
				<th style="width:5%;">Year</th>
				<th style="width:5%;">Tier</th>
				<th style="width:10%;">Seat Number</th>
				<th style="width:10%;">Engine</th>
				<th style="width:5%;">Price</th>
				<th style="width:10%;">Station Name</th>
				<th style="width:10%;">Total KM/S</th>
				<th style="width:5%;"></th>
				<th style="width:5%;"></th>
			</tr>
            <?php
			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
			$sq = "SELECT * FROM cars";
>>>>>>> Development
            
			$results = mysqli_query($con, $sq);
            
			while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
<<<<<<< HEAD
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
=======
				if(($row["availability"]==1))
				{
			?>
					<tr>
					<td><?php echo"{$row['rego']}";?></td>
					<td><?php echo"{$row['model']}";?></td>
					<td><?php echo"{$row['make']}";?></td>
					<td><?php echo"{$row['year']}";?></td>
					<td><?php echo"{$row['tier']}";?></td>
					<td><?php echo"{$row['seatNo']}";?></td>
					<td><?php echo"{$row['engine']}";?></td>
					<td><?php echo"{$row['price']}";?></td>
					<td><?php echo"{$row['stationName']}";?></td>
					<td><?php echo"{$row['totalkm']}";?></td>
					<td><a <?php echo"href=maintenance.php?rego=".$row['rego'].""; ?> onclick="return confirm('are you sure you wish to SET this car to be UNAVAILABLE?\n This WILL remove all relevent bookings associated with this car')">Unavailable</a></td>
					<td><a <?php echo"href=deletecar.php?rego=".$row['rego'].""; ?> onclick="return confirm('are you sure you wish to DELETE this car?\n This WILL remove all relevent bookings associated with this car')">Delete</a></td>
					</tr>
			<?php
>>>>>>> Development
				}
			}
			?>
        </table>
<<<<<<< HEAD
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
=======
</div>
<div id="maintenance" class="container tab-pane fade">

        <table id="myTable">
			<tr class="header">
				<th style="width:10%;">Registration</th>
				<th style="width:10%;">Model</th>
				<th style="width:10%;">Make</th>
				<th style="width:5%;">Year</th>
				<th style="width:5%;">Tier</th>
				<th style="width:10%;">Seat Number</th>
				<th style="width:10%;">Engine</th>
				<th style="width:5%;">Price</th>
				<th style="width:10%;">Station Name</th>
				<th style="width:10%;">Total KM/S</th>
				<th style="width:5%;"></th>
				<th style="width:5%;"></th>
			</tr>
            <?php
			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
			$sq = "SELECT * FROM cars";
            
			$results = mysqli_query($con, $sq);
            
			while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				if(($row["availability"]==0))
				{
			?>
					<tr>
					<td><?php echo"{$row['rego']}";?></td>
					<td><?php echo"{$row['model']}";?></td>
					<td><?php echo"{$row['make']}";?></td>
					<td><?php echo"{$row['year']}";?></td>
					<td><?php echo"{$row['tier']}";?></td>
					<td><?php echo"{$row['seatNo']}";?></td>
					<td><?php echo"{$row['engine']}";?></td>
					<td><?php echo"{$row['price']}";?></td>
					<td><?php echo"{$row['stationName']}";?></td>
					<td><?php echo"{$row['totalkm']}";?></td>
					<td><a <?php echo"href=maintenanceReturn.php?rego=".$row['rego'].""; ?> onclick="return confirm('are you sure you wish to SET this car to be AVAILABLE?')">Available</a></td>
					<td><a <?php echo"href=deletecar.php?rego=".$row['rego'].""; ?> onclick="return confirm('are you sure you wish to DELETE this car?\n This WILL remove all relevent bookings associated with this car')">Delete</a></td>
					</tr>
			<?php
>>>>>>> Development
				}
			}
			?>
        </table>
</div>
</div>		
		
		
		
		
	</div>
    </div>
		
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	</script>
	</body>
</html>