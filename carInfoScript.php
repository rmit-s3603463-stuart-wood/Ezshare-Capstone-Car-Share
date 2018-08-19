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
//echo "Connected successfully";

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
 //sedan.jpg

echo '<tr><td rowspan="8">  <img src="resources\assets\icons\\'.$row["carPic"].'" class="rounded img-fluid"  alt="sedan" width="600" height="500"> </td><th>Registration Number:</th><td>'.$row["rego"].'</td></tr>';
echo "<tr><th>Model:</th><td>".$row["model"]."</td></tr>";
echo "<tr><th>Make:</th><td>".$row["make"]."</td></tr>";
echo "<tr><th>Year:</th><td>".$row["year"]."</td></tr>";
echo "<tr><th>Tier:</th><td>".$row["tier"]."</td></tr>";
echo "<tr><th>Number of Seats:</th><td>".$row["seatNo"]."</td></tr>";
echo "<tr><th>Engine Type:</th><td>".$row["engine"]."</td></tr>";
echo "<tr><th>Rental Price per hour:</th><td>".$row["price"]."</td></tr>";

}
} else {
echo "0 results";
}
?>
