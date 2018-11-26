<!DOCTYPE html>
<html>
<head>
  <title>Register - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/register.css">
  <script type="text/javascript" src="script/register.js"></script>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
</head>
<body>
  <?php require('../server_side/header.php'); ?>
  <div id="mainDiv">
  <form method="post" action="../server_side/register.php" id="mainForm"> <!-- server.php will have to be changed to an appropriate location -->
    <fieldset>
      <h2>Sign up</h2>
      <p>
        <img src="images/camImage.png" alt="camera picture" title="Camera Picture" id="camPic">
      </p>
      <p>
        <input type="text" name="firstName" placeholder="First Name"/>
        <input type="text" name="lastName" placeholder="Last Name"/>
        <!-- placed these two inputs in same p tag container, change this if necessary for styling -->
      </p>
      <p>
        <input id="email" type="email" name="regEmail" placeholder="Email" class="required" required/>
      </p>
      <p>
        <input type="text" name="regUsername" placeholder="Username" class="required" required/>
      </p>
      <p>
        <input id="pwd1" type="password" name="regPassword" placeholder="Password" class="required" required/>
        <!-- should name value for password and username be the same as the username and password name from login.html?-->
      </p>
      <p>
        <input id="pwd2" type="password" name="regPassword" placeholder="Confirm Password" class="required" required/>
        <!-- should name value for password and username be the same as the username and password name from login.html?-->
      </p>
      <p>
      <button type="submit" name="regSubmit" id="submit">Register</button> <!-- use javascript? or just make href to reference another page? DISCUSS -->
      </p>
      <p id="termsCond">By signing up you agree to our Terms and Conditions</p> <!-- could potentially link terms and policy to an actual terms and conditions document -->
    </fieldset>
  </form>
  </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
