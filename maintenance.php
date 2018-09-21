<?php
$rego = $_GET['rego'];


$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));

$sql = "DELETE b
FROM booking b
INNER JOIN cars c
ON b.rego = c.rego
WHERE c.rego = '$rego'";

$sqlt = "UPDATE cars SET availability = !availability WHERE rego = '$rego'";

	if(mysqli_query($con,$sql))
	{
		if(mysqli_query($con,$sqlt))
		{
			header("refresh:1; url=admindeletecar.php");
		}
	}
?>