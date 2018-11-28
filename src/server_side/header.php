<?php
session_start();
if(isset($_SESSION['adminUsername'])){
  echo "<header>

    <nav>
      <p>Hello, ". $_SESSION['adminUsername'] . "
      <a href='ListAllCustomer.php' class='navBtns'>List all Customers</a>
      <a href='SalesReport.php' class='navBtns'>Sales Report</a>
      <a href ='AlterProduct.php' class='navBtns'>Alter Product</a>
      <a href='../server_side/logout.php' class='navBtns'>Logout</a>
    </nav>
  </header>";
}elseif(isset($_SESSION['username'])){
  echo "<header>
    <a href='PhotoArtMain.php'><h1>PhotoArt</h1></a>
    <nav>
      <p>Hello, ". $_SESSION['username'] . "
      <a href='PhotoArtExplore.php' class='navBtns'>Explore</a>
      <a href='PhotoArtCart.php' class='navBtns'>Cart</a>
      <a href ='PhotoArtProfilePage.php' class='navBtns'>My Profile</a>
      <a href='../server_side/logout.php' class='navBtns'>Logout</a>
    </nav>
  </header>";
}else{

echo "<header>
  <a href='PhotoArtMain.php'><h1>PhotoArt</h1></a>
  <nav>
    <a href='PhotoArtExplore.php' class='navBtns'>Explore</a>
    <a href='PhotoArtRegister.php' class='navBtns'>Register</a>
    <a href='PhotoArtCart.php' class='navBtns'>Cart</a>
    <a href='../server_side/processLogin.php' class='navBtns'>Login</a>
  </nav>
</header>";
}
 ?>
