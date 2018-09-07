<!doctype html>
<html lang="en">
  <head>
    <?php  include_once('head.php');  ?>
        <title>EZshare - Car  Information</title>
<link href="css/fleet.css" rel="stylesheet" type="text/css" >

     <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/ -->
     <!-- Pictures sourced from https://www.carsales.com.au -->
	<style>

       </style>

  </head>
  <body>
    <?php
    include_once('navbar.php');
    ?>

    <div class="container table-responsive-sm">
      <h1 class = "text-center"> Our Fleet</h1>

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Tier1">Tier 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tier2">Tier 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Tier3">Tier 3</a>
        </li>
      </ul>
<div class="tab-content">
  <?php require 'db_conn.php';?>
  <?php require 'carInfoScript.php';?>

    </div>

    </div>



    </body>
    <?php
    include_once('footer.php');
    ?>
</html>
