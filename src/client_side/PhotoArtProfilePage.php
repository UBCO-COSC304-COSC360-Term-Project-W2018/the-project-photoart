
<?php
include('../server_side/connection.php');
include('../server_side/header.php');
echo  "<link rel='stylesheet' href='css/reset.css' />
 <link rel='stylesheet' href='css/general.css' />
 <link rel='stylesheet' href='css/editprofile.css'/>
 <link rel='stylesheet' href='css/profileView.css' />
 <script type='text/javascript' src='script/checkRequired.js'></script>
 <script type='text/javascript' src='script/profilePage.js'></script>";
if(isset($_SESSION['username'])){
    $sql = $con->prepare("SELECT username, firstName, lastName, email,bio FROM User WHERE username = ?");
    $sql->bind_param("s", $_SESSION['username']);
    $sql->execute();
    $sql->bind_result($username, $firstN, $lastN, $email,$bio);
    $outArray = array();
    while($row = $sql->fetch()){
      $outArray = array('username'=>$username, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email,'bio'=>$bio);

}
include('../server_side/profilePic.php');
      echo"<div id='entireBG' class='shadow'>
           <h2>My Profile</h2>
           <div id='sideBar'>"
           .$pic."
             <a href='PhotoArtEditProfile.php' class='sbarFunctions'><strong>Edit Profile</strong></a>
             <a href='PhotoArtPaymentInfo.php' class='sbarFunctions'>Payment/Shipping Information</a>

           </div>

                 <table>
                   <tbody>
                   <tr>
                     <td><label>First Name</label></td>
                     <td><label>Last Name</label></td>
                     </tr>
                   <tr>
                     <td><p class='button1'>".$firstN."</p></td>
                     <td><p class='button1'>".$lastN."</p></td>
                   </tr>
                   <tr><td><label>Username</label><td></tr>
                   <tr><td colspan='2'><p class='button2 required'>".$username."</p></td></tr>
                   <tr><td><label>About Me</label></td></tr>
                   <tr><td colspan='2'><p>".$bio."</p></td></tr>
                   <tr><td><br><label>Email</label></td></tr>
                   <tr><td colspan='2'><p class='button2 required'>".$email."</p></td></tr>
                   </tbody></table>

         </div>
       <footer>
         <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
       </footer>";
        $sql->close();

}
else{
  header("Location: ../server_side/processLogin.php");
}
 ?>
