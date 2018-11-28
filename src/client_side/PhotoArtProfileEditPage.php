<!DOCTYPE html>
<html>
<head>
  <title>Profile - PhotoArt</title>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
   <link rel="stylesheet" href="css/reset.css" />
   <link rel="stylesheet" href="css/general.css" />
   <link rel="stylesheet" href="css/editprofile.css" />
   <script type="text/javascript" src="script/checkRequired.js"></script>
   <script type="text/javascript" src="script/profilePage.js"></script>

</head>
<body>
<?php require('../server_side/header.php'); ?>
    <div id="entireBG" class="shadow">
      <h2>My Profile</h2>
      <div id="sideBar">
        <img id="profileImg" src="profPic.jpg" alt="Profile Picture" title="Profile Picture">
        <a href="" id="changePic">Change Profile Picture</a>
        <!-- CHANGING PROFILE PICTURE HOWTO LINK: https://stackoverflow.com/questions/40441482/making-user-edited-profile-pictures-html -->
        <a href="" class="sbarFunctions"><strong>Edit Profile</strong></a>
        <a href="PhotoArtPaymentInfo.php" class="sbarFunctions">Payment/Shipping Information</a>
        <a href="logout.php" class="sbarFunctions">Log Out</a> <!-- this button logs out the page -->
      </div>
        <form method="post" action="../server_side/profile.php">
          <fieldset>
            <table>
              <tbody>
              <tr>
                <td><label>First Name</label></td>
                <td><label>Last Name</label></td>
                </tr>
              <tr>
                <td><input class="button1" type="text" name="firstName"/></td>
                <td><input class="button1" type="text" name="lastName"/></td>
              </tr>
              <tr><td><label>Username</label><td></tr>
              <tr><td colspan="2"><input class="button2 required" type="text" name="username"/></td></tr>
              <tr><td><label>About Me</label></td></tr>
              <tr><td colspan="2"><textarea class="button2" placeholder="Tell us about yourself!"></textarea></td></tr>
              <tr><td><label>Email</label></td></tr>
              <tr><td colspan="2"><input class="button2 required" type="text" name="email"/></td></tr>
              <tr><td><label>Change Password</label></td></tr>
              <tr><td><input class="button1" type="password" name="oldPass" placeholder="Old Password"/></td> <!-- should be the type "password" or "text"? -->
              <td><input class="button1" type="password" name="newPass" placeholder="New Password"/></td></tr>
              <tr><td colspan="2"><button id="submit" class="button2" type="submit" name="confChanges">Confirm Changes</button></td></tr>
          </tbody></table>
          </fieldset>
        </form>
    </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
