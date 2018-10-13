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

//GET COORDS FROM DATABASE
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row_count = $result->num_rows;
    $x=0;
    $loc=array();

    while($row = $result->fetch_assoc()) {
      $loc[] = $row["journeykm"];
    }
    echo json_encode($loc);
   }
    mysqli_close($conn);
    
 ?>
