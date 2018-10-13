
<?php
session_start();
require 'db_conn.php';?>
<?php
	$rego = $_SESSION['rego'];
	$email = $_SESSION["email"];
	$pdate = $_SESSION['pdate'];
	$ptime = $_SESSION['ptime'];
	$hrs = $_POST['hrs'];
    $mins = $_POST['mins'];
    $gtotal = $_POST['gtotal'];
    $_SESSION['price'] = $gtotal;
    $plocation = $_SESSION['plocation'];
	$dlocation = $_SESSION['dlocation'];

 $query = "INSERT INTO booking (rego, email, dateBooked, timeBooked, hoursBooked, minutesBooked, totalPrice, returnLocation, pickupLocation, completed)
          VALUES ('$rego', '$email', '$pdate', '$ptime', '$hrs', '$mins', '$gtotal', '$dlocation', '$plocation', '0')";
    mysqli_query($conn, $query);
		$sql = "UPDATE cars SET currDriver='".$email."' WHERE rego ='".$rego."'";

		if ($conn->query($sql) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}


		?>
