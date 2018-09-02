<?php
	$rego = $_GET['rego'];


$con = mysqli_connect("localhost","Admin","p@ssword","carshare") or die("Error " . mysqli_error($con));

$sql = "DELETE FROM cars WHERE rego = $rego";

if(mysqli_query($con,$sql))
{
	header("refresh:1; url=addremovecar.php");
}
else{
	echo "not deleted";
}
?>
