<?php
$rego = $_GET['rego'];


$con = mysqli_connect("localhost","Admin","password","carshare") or die("Error " . mysqli_error($con));
$sqlt = "UPDATE cars SET availability = !availability WHERE rego = '$rego'";
	if(mysqli_query($con,$sqlt))
	{
		header("refresh:1; url=admindeletecar.php");
	}
?>