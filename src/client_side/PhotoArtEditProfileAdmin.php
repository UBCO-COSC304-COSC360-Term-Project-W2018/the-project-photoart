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
<?php require('../server_side/header.php');
      require('../server_side/connection.php');
      if(isset($_GET['username'])){
        $uName=$_GET['username'];
      }
    $sql = $con->prepare("SELECT username, firstName, lastName, email,bio FROM User WHERE username = ?");
    $sql->bind_param("s",$uName);
    $sql->execute();
    $sql->bind_result($username, $firstN, $lastN, $email,$bio);
    $outArray = array();
    while($row = $sql->fetch()){
      $outArray = array('username'=>$username, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email,'bio'=>$bio);
}
?>
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
        <form method="post" action='../server_side/adminUpdateUser.php?username=<?php echo $uName; ?>'>
          <fieldset>
            <table>
              <tbody>

              <tr>
              <tr><td><label>About Me</label></td></tr>
              <tr><td colspan="2"><textarea class="button2" placeholder="Tell us about yourself!" name="bio" value= "<?php echo $bio; ?>"></textarea></td></tr>
              <tr><td><label>Email</label></td></tr>
              <tr><td colspan="2"><input class="button2 required" type="text" name="email" value= "<?php echo $email; ?>"/></td></tr>
              <tr><td><label>Change Password</label></td></tr>
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
