<?php
	$rego = $_GET['rego'];


$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));

$sql = "DELETE cars, booking 
FROM cars, booking
WHERE cars.rego = '$rego'
AND cars.rego = booking.rego";

$sqlt = "DELETE FROM cars WHERE rego = '$rego'";
	if(mysqli_query($con,$sql))
	{
		if(mysqli_query($con,$sqlt))
		{
			header("refresh:1; url=admindeletecar.php");
		}
	}
else{
	echo "not deleted";
}
?>
