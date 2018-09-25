<?php include_once('head.php');
if($_SESSION['email'] !== 'admin@ezshare.com.au'){
		// isn't admin, redirect them to home page
		header("Location:home.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Booking List</title>
		<link rel="stylesheet" type="text/css" href="cssBookingDelete.css">
</head>
<body>
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
		<?php include_once('navbar.php'); ?>

		<div class="container">

		<h1 class = "text-center">Delete Booking</h1>

    <div class="container table-responsive-sm">
<input type="text" id="myInput" placeholder="Search for a booking.." title="search">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#notCompleted">Current Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completed">Past Bookings</a>
        </li>
      </ul>
	  <div class="tab-content">
<div id="notCompleted" class="container tab-pane active">

<table id="myTable" action="bookingdeleteprocess.php">
  <tr class="header">
    <th style="width:5%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:20%;">Email</th>
	<th style="width:10%;">Date booked</th>
	<th style="width:10%;">Time booked</th>
	<th style="width:10%;">Hours booked</th>
	<th style="width:5%;">Total price</th>
	<th style="width:10%;">Pickup location</th>
	<th style="width:10%;">Return location</th>
	<th style="width:10%;"></th>
  </tr>
  <tr>
        <?php

			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
            $sq = "SELECT * FROM booking";

            $results = mysqli_query($con, $sq);

            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
			{
				if(($row["completed"]==0))
				{
			?>
					<tr>
					<td><?php echo"{$row['bookingID']}"; ?></td>
					<td><?php echo"{$row['rego']}"; ?></td>
					<td><?php echo"{$row['email']}"; ?></td>
					<td><?php echo"{$row['dateBooked']}"; ?></td>
					<td><?php echo"{$row['timeBooked']}"; ?></td>
					<td><?php echo"{$row['hoursBooked']}";?></td>
					<td><?php echo"{$row['totalPrice']}"; ?></td>
					<td><?php echo"{$row['pickupLocation']}"; ?></td>
					<td><?php echo"{$row['returnLocation']}"; ?></td>
					<td><a <?php echo"href=bookingdeleteprocess.php?bookingID=".$row['bookingID'].""; ?> onclick="return confirm('are you sure you wish to DELETE/CANCEL this booking?')">Delete</a></td>
					</tr>
<?php			}
			}		?>
  </tr>
</table>
</div>

<div id="completed" class="container tab-pane fade">
<table id="myTable">
  <tr class="header">
    <th style="width:5%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:20%;">Email</th>
	<th style="width:10%;">Date booked</th>
	<th style="width:10%;">Time booked</th>
	<th style="width:10%;">Hours booked</th>
	<th style="width:5%;">Total price</th>
	<th style="width:10%;">Pickup location</th>
	<th style="width:10%;">Return location</th>
	<th style="width:10%;">Progress</th>
  </tr>
  <tr>
        <?php

			$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
            $sq2 = "SELECT * FROM booking";

            $results = mysqli_query($con, $sq2);

            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
				if(($row["completed"]==1))
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
					echo "<td>completed</td>\n";
					echo "</tr>\n";
				}
			}
			?>
  </tr>
</table>
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
</div>
    </div>
	</div>
	</body>
	    <?php include_once('footer.php');?>
</html>
