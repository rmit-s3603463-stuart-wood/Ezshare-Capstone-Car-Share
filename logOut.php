<?php
session_start();
if (isset($_SESSION['email'])) {
   session_destroy();
   echo "<br> you are logged out successufuly!";
}
   header('location: index.php');

 ?>
