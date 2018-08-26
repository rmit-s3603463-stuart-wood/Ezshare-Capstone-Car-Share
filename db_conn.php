<?php
$servername = "localhost";
$username = "Admin";
$password = "p@ssword";
$dbname = "carshare";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>
