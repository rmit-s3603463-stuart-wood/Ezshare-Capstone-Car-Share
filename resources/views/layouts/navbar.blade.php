
<header>
  <style>
.navbar{
    background-color: #1e3f5a;
  }
  .navbar a{
    color:black;

  }
  .dropdown-menu{
    background-color: white;
    color:black;

  }
  .dropdown-menu a:hover{
    background-color: white;
    color:black;

  }
  .dropdown-menu a:active{
    background-color: white;
    color:black;
  }

  </style>
  <!-- Optional JavaScript -->
  <nav class="navbar navbar-expand-sm navbar-dark">
    <a class="navbar-brand" href="index.php">EZshare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        My Account
      </a>
      <div class="dropdown-menu">
    <?php    if(isset($_SESSION["email"]))
    {
      echo"<a class='dropdown-item' href='myAccount.php'>My Account</a>";
      echo"<a class='dropdown-item' href='logOut.php'>LogOut</a>";

     }
    else
    { echo"<a class='dropdown-item' href='logIn.php'>Login</a>";
      echo"<a class='dropdown-item' href='signUp.php'>Sign Up</a>";
    }
    ?>
    <!--    <a class="dropdown-item" href="logIn.php">Login</a>  //-->
      </div>
    </li>
    <?php    if(isset($_SESSION["email"])){
      if($_SESSION['email'] == 'admin@ezshare.com.au'){
  echo    "<li class='nav-item dropdown'>";
  echo  "<a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>";
    echo "Admin Tools";
  echo "</a>";
  echo  "<div class='dropdown-menu'>";

        echo"<a class='dropdown-item'href='adminaddcar.php'>Add a Car</a>";
        echo"<a class='dropdown-item'href='admindeletecar.php'>Remove a Car</a>";
        echo"<a class='dropdown-item'href='bookingdelete.php'>User Bookings</a>";

echo  "</div>";
echo  "</li>";

}
}
    ?>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">

    <?php
    if(isset($_SESSION["email"])){
            echo"<a class='nav-link' href='map.php'>Map</a>";
}

      ?>

    </li>
        <li class="nav-item">
          <a class="nav-link" href="carFleet.php">Fleet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faqs.php">FAQS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactUs.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
