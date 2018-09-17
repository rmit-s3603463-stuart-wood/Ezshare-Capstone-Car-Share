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

$currkm = $_GET['currkm'];
$Rego = $_GET['carRego'];

//GET COORDS FROM DATABASE
      $sql = "UPDATE cars SET journeykm='".$currkm."'WHERE rego ='".$Rego."'";

      if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $conn->error;
      }
    mysqli_close($conn);
 ?>
