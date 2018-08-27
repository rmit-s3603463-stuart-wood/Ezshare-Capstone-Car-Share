<?php
$db = mysqli_connect('localhost', 'root', '', 'carshare') or die(mysqli_error($db));

$sql = "DELETE FROM booking WHERE BOOKINGID='$_GET[bookingID]'";

if(mysqli_query($con,$sql))
{
	header("refresh:1; url=bookingdelete.php");
	else
	echo "not deleted";
}
?>