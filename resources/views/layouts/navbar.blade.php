
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
    <a class="navbar-brand" href="/">EZshare</a>
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
    <?php   if(session()->has('email'))
    {
      echo"<a class='dropdown-item' href='myAccount'>My Account</a>";
      echo"<a class='dropdown-item' href='logout'>LogOut</a>";

     }
    else
    { echo"<a class='dropdown-item' href='login'>Login</a>";
      echo"<a class='dropdown-item' href='signUp'>Sign Up</a>";
    }
    ?>
    <!--    <a class="dropdown-item" href="logIn.php">Login</a>  //-->
      </div>
    </li>
    <?php    if(session()->has('email')){
      if(session()->get('email') == 'admin@ezshare.com.au'){
  echo    "<li class='nav-item dropdown'>";
  echo  "<a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>";
    echo "Admin Tools";
  echo "</a>";
  echo  "<div class='dropdown-menu'>";

        echo"<a class='dropdown-item'href='adminAddCar'>Add a Car</a>";
        echo"<a class='dropdown-item'href='adminDeleteCar'>Remove a Car</a>";
        echo"<a class='dropdown-item'href='adminBookings'>User Bookings</a>";

echo  "</div>";
echo  "</li>";

}
}
    ?>
    <li class="nav-item">
      <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">

    <?php
    if(session()->has('email')){
          if(session()->get('email')=='admin@ezshare.com.au'){
            echo"<a class='nav-link' href='adminMap'>Admin Map</a>";
          }else{
            echo"<a class='nav-link' href='map'>Map</a>";
          }
}

      ?>

    </li>
        <li class="nav-item">
          <a class="nav-link" href="carFleet">Fleet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faqs">FAQS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactUs">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
