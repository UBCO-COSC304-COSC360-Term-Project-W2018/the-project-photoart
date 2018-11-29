<!DOCTYPE html>
<html>
<head>
  <title>Login - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/Login.css">
  <script type="text/javascript" src="script/checkRequired.js"></script>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
   <script src="script/checkRequired.js"></script>
</head>
<body>
<?php require('../server_side/header.php'); ?>
  <div id="mainDiv">
  <form method="post" action="../server_side/login.php" class="shadow"> <!-- server.php will have to be changed to an appropriate location -->
    <fieldset>
      <p id="formLogo" class="shadow">PhotoArt<p>
        <p>
          <input class="required" type="text" name="username" placeholder="Username" required/>
        </p>
        <p>
          <input class="required" type="password" name="password" placeholder="Password" required/>
        </p>
        <p id= "formLogin">
        <button id="submit" type="submit" name="loginSubmit" class="shadow">Log In</button> <!-- use javascript? or just make href to reference another page? DISCUSS -->
        </p>
        <p>
          <a href="PhotoArtRegister.php" class="regStyle linkColor">Register</a> <!-- references register html page -->
          <a href="PhotoArtPasswordReset.php" class="pswStyle linkColor">Forgot Password?</a> <!-- references password reset html page -->
          <a href="adminPortal.php"class="pswStyle linkColor">Admin login</a>
        </p>
    </fieldset>
  </form>
  </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
