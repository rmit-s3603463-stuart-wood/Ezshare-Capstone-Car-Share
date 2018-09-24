
<header>
  <style>
  .navbar{
    background-color: #1e3f5a;
  }
  .navbar a{
    color:white;
  }
  .dropdown-menu{
    background-color: #1e3f5a;
  }
  .dropdown-menu a:hover{
    background-color: white;
  }
  .dropdown-menu a:active{
    background-color: white;
    color:black;
  }

  </style>
  <!-- Optional JavaScript -->
  <nav class="navbar navbar-expand-sm navbar-dark">
    <a class="navbar-brand" href="#">EZshare</a>
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
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Map</a>
    </li>
        <li class="nav-item">
        <?php    if(isset($_SESSION["email"])){  echo"<a class='nav-link' href='bookinginfo.php'>Make a Booking</a>"; } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carInfo.php">Fleet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faqs.php">FAQS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacts.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
