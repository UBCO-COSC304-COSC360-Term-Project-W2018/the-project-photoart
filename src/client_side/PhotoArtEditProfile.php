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
<?php
    require('../server_side/header.php');
    require('../server_side/connection.php');
    $sql = $con->prepare("SELECT username, firstName, lastName, email,bio FROM User WHERE username = ?");
    $sql->bind_param("s", $_SESSION['username']);
    $sql->execute();
    $sql->bind_result($username, $firstN, $lastN, $email,$bio);
    $outArray = array();
    while($row = $sql->fetch()){
      $outArray = array('username'=>$username, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email,'bio'=>$bio);
}
include('../server_side/profilePic.php');
?>
    <div id="entireBG" class="shadow">
      <h2>My Profile</h2>
      <div id="sideBar">
        <?php echo $pic ?>
        <form enctype="multipart/form-data" class="" action="../server_side/userUpdateProfilePicture.php" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
        <input type="file" name="userImage" value=""/>
        <input type="submit"  value="Profile"/>
        </form>

        <!-- CHANGING PROFILE PICTURE HOWTO LINK: https://stackoverflow.com/questions/40441482/making-user-edited-profile-pictures-html -->
        <a href="" class="sbarFunctions"><strong>Edit Profile</strong></a>
        <a href="PhotoArtPaymentInfo.php" class="sbarFunctions">Payment/Shipping Information</a>
        <a href="logout.php" class="sbarFunctions">Log Out</a> <!-- this button logs out the page -->
      </div>
        <form method="post" action="../server_side/profileUpdate.php">
          <fieldset>
            <table>
              <tbody>

              <tr>
              <tr><td><label>About Me</label></td></tr>
              <tr><td colspan="2"><textarea class="button2" placeholder="Tell us about yourself!" name="bio" value= "<?php echo $bio; ?>"></textarea></td></tr>
              <tr><td><label>Email</label></td></tr>
              <tr><td colspan="2"><input class="button2 required" type="text" name="email" value= "<?php echo $email; ?>"/></td></tr>
              <tr><td><label>Change Password</label></td></tr>
              <tr><td><input class="button1" type="password" name="oldPass" placeholder="Old Password"/></td></tr>
              <tr><td><input class="button1" type="password" name="newPass" placeholder="New Password"/></td>
                  <td><input class="button1" type="password" name="confPass" placeholder="Confirm Password"/></td></tr>
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
