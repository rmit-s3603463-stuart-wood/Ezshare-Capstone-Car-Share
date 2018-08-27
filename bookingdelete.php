
<?php
/*
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location:logIn.php");
        exit(0);
    }
	*/
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include_once('head.php'); ?>
		<link rel="stylesheet" type="text/css" href="cssBookingDelete.css">
</head>
<body>
		<?php include_once('navbar.php'); ?>
		
		<div class="container">
		
		<h1 class = "text-center">Delete Booking</h1>
<input type="text" id="myInput" onkeyup="searchRego()" placeholder="Search for registration.." title="Type in a registration">
<input type="text" id="myInput2" onkeyup="searchEmail()" placeholder="Search for Email.." title="Type in a email">

<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:30%;">Email</th>
	<th style="width:15%;">date booked</th>
	<th style="width:15%;">time booked</th>
	<th style="width:10%;"></th>
  </tr>
  <tr>
    <td>1</td>
	<td>Afd246</td>
	<td>Fred.Barnes@gmail.com</td>
	<td>12/02/2019</td>
    <td>17:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>2</td>
  <td>abc123</td>
  <td>geoff.stantly@gmail.com</td>
    <td>14/03/2019</td>
    <td>14:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>3</td>
  <td>ghk998</td>
  <td>emily.burke@gmail.com</td>
    <td>14/03/2019</td>
    <td>14:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>32</td>
  <td>mbn334</td>
  <td>kathythomas@outlook.com</td>
	<td>12/02/2019</td>
    <td>17:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>4</td>
  <td>xdf567</td>
  <td>rayjackson92@gmail.com</td>
	<td>12/02/2019</td>
    <td>17:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>5</td>
  <td>1we1nm</td>
  <td>chickencat22@outlook.com</td>
    <td>06/08/2018</td>
    <td>20:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>6</td>
  <td>kooool</td>
  <td>koolkid@yahoo.com</td>
    <td>12/12/2018</td>
    <td>12:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
  <tr>
  <td>7</td>
  <td>hgt469</td>
  <td>janeaustin@hotmail.com</td>
    <td>22/11/2018</td>
    <td>09:00</td>
	<td><button class="btn" onclick="btnalert()">delete</button></td>
  </tr>
</table>

<script>
function searchRego() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function searchEmail() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function btnalert() {
	alert("item deleted");
}
</script>



<!--
<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Booking ID</th>
    <th style="width:10%;">Registration</th>
	<th style="width:30%;">Email</th>
	<th style="width:15%;">date booked</th>
	<th style="width:15%;">time booked</th>
	<th style="width:10%;"></th>
  </tr>
  <tr>
        <?php
		/*
            $bookingID = $_GET['bookingid']; 
            
            //connect
            $db = mysqli_connect('localhost','root','','carshare') or die(mysqli_error($db));
            
            $sq = "select * from booking where bookingid = '$bookingID'";
            
            $results = mysqli_query($db, $sq);
            
            while($row=mysqli_fetch_array($results, MYSQLI_ASSOC))
            {
            print "<tr>\n";
            print "<td>{$row['bookingId']}</td>\n";
            print "<td>{$row['rego']}</td>\n";
            print "<td>{$row['email']}</td>\n";
            print "<td>{$row['dateBooked']}</td>\n";
            print "<td>{$row['timeBooked']}</td>\n";
			print "<td><a href=deletebookingprocess.php?bookingid=".$row['bookingID'].">Delete</a></td>";
            print "</tr>\n";
            }
			*/
        ?>
  </tr>
</table>
-->
</div>
    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>Footer</p>
    </div>
	</body>
</html>
