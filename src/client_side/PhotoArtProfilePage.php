
<?php
include('../server_side/connection.php');
include('../server_side/header.php');
echo  "<link rel='stylesheet' href='css/reset.css' />
 <link rel='stylesheet' href='css/general.css' />
 <link rel='stylesheet' href='css/editprofile.css' />
 <script type='text/javascript' src='script/checkRequired.js'></script>
 <script type='text/javascript' src='script/profilePage.js'></script>";
if(isset($_SESSION['username'])){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $firstname = $_POST["firstName"];
  $lastname = $_POST["lastName"];
  $username = $_POST["username"];
  $email = $_POST["email"];
}
    $sql = $con->prepare("SELECT username, firstName, lastName, email,bio FROM User WHERE username = ?");
    $sql->bind_param("s", $_SESSION['username']);
    $sql->execute();
    $sql->bind_result($username, $firstN, $lastN, $email,$bio);
    $outArray = array();
    while($row = $sql->fetch()){
      $outArray = array('username'=>$username, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email,'bio'=>$bio);
}
      echo"<div id='entireBG' class='shadow'>
           <h2>My Profile</h2>
           <div id='sideBar'>
             <img id='profileImg' src='profPic.jpg' alt='Profile Picture' title='Profile Picture'>
             <a href='' id='changePic'>Change Profile Picture</a>
             <a href='PhotoArtEditProfile.php' class='sbarFunctions'><strong>Edit Profile</strong></a>
             <a href='PhotoArtPaymentInfo.php' class='sbarFunctions'>Payment/Shipping Information</a>

           </div>
             <form method='post' action=''../server_side/profile.php'>
               <fieldset>
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
                   <tr><p colspan='2'>".$bio."</td></tr>
                   <tr><td><label>Email</label></td></tr>
                   <tr><td colspan='2'><p class='button2 required'>".$email."</p></td></tr>
                   </tbody></table>
               </fieldset>
             </form>
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
