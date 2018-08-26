<?php
//echo "Connected successfully";

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row

for ($x = 1; $x <= 3; $x++) {
  //iterates through each car tier
if($x!==1){//checks if it's first tab or not
  echo '<div id="Tier'.$x.'" class="container tab-pane fade"><br>';
}else{
  echo '<div id="Tier'.$x.'" class="container tab-pane active"><br>';
}
echo '<table class="table">';
 echo '      <thead class="thead-dark">';
 echo '           <tr>';
 echo '             <th colspan = "3">Tier '.$x.'</th>';
 echo '           </tr>';
 echo '         </thead>';
 echo '         <tbody>';

 while($row = $result->fetch_assoc()) {
   //cycles through the entire query result, one row at a time
 if($row["tier"]==$x){
   //checks if the tier matches the table tier
echo '<tr><th>'.$row["model"].'</th></tr>';
echo '<tr><td rowspan="7">  <img src="resources\assets\icons\\'.$row["carPic"].'" class="rounded img-fluid"  alt="sedan" width="600" height="500"> </td><th class="table-active">Registration Number:</th><td>'.$row["rego"].'</td></tr>';
echo '<tr><th class="table-active">Make:</th><td>'.$row["make"].'</td></tr>';
echo '<tr><th class="table-active">Year:</th><td>'.$row["year"].'</td></tr>';
echo '<tr><th class="table-active">Tier:</th><td>'.$row["tier"].'</td></tr>';
echo '<tr><th class="table-active">Number of Seats:</th><td>'.$row["seatNo"].'</td></tr>';
echo '<tr><th class="table-active">Engine Type:</th><td>'.$row["engine"].'</td></tr>';
echo '<tr><th class="table-active border-color:black">Rental Price per hour:</th><td>$'.$row["price"].'</td></tr>';


}
}
echo'</tbody>';
echo'</table>';
 echo'</div>';
 echo $row["tier"];
    $result->free();
    $result = $conn->query($sql);
//  resets the result to null and fills it with the query result again - required if iterating through the result multiple times
}

} else {
echo "0 results";
}
?>
