<?php
$servername = "localhost";
$username = "Admin";
$password = "password";
$dbname = "carshare";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
   die("Database Connection failed: " . $conn->connect_error);
}

$bookID = $_POST['bookId'];
$Rego = $_POST['carRego'];

 $sql = "SELECT * FROM cars WHERE rego ='".$Rego."'";
 $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       $calckm = $row["journeykm"];
       $calckm += $row["totalkm"];
     }
    }

$sql = "UPDATE cars SET totalkm='".$calckm."'WHERE rego ='".$Rego."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE cars SET journeykm='0' WHERE rego ='".$Rego."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$sql = "UPDATE cars SET booked='0' WHERE rego ='".$Rego."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$sql = "UPDATE booking SET completed='1' WHERE bookingID ='".$bookID."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
mysqli_close($conn);
 ?>
