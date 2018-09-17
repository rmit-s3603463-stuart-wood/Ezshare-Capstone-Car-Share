<?php
	$bookingID = $_GET['bookingID'];


$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));

$sql = "DELETE FROM booking WHERE bookingID = $bookingID";

if(mysqli_query($con,$sql))
{
	header("refresh:1; url=bookingdelete.php");
}
else{
	echo "not deleted";
}
?>