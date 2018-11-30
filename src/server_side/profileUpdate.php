<?php
require('connection.php');
session_start();
if(isset($_SESSION['username'])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['email'])&&isset($_POST['oldPass'])&&isset($_POST['newPass'])){
    $email =$_POST['email'];
    $oldPwd = md5($_POST['oldPass']);
    $pwd =$_POST['newPass'];
    $bio=$_POST['bio'];
    $hashed = md5($pwd);
    $check=true;
  }
}elseif($_SERVER["REQUEST_METHOD"]=="GET"){

  echo "wrong method";
  mysqli_close($con);
}else{
  echo "<p>fill out all fields</p>";
}
if($check==true){
  if($stmt=$con->prepare("SELECT password from User where username =?")){
    $stmt->bind_param('s',$_SESSION['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_pwd);
    $stmt->fetch();



  }
  if(strcasecmp($oldPwd,$db_pwd)==0){
  $results=$con->prepare("SELECT email from User where username !=?");
  $results->bind_param('s',$_SESSION['username']);
  $results->execute();
  $results->bind_result($db_email);

  while($results->fetch()){
    if((strcasecmp($db_email,$email)==0)){
    echo "<script type ='text/javascript'>
    alert('e-mail already in use')
    location='../client_side/PhotoArtEditProfile.php'
    </script>";
      $check = false;

    }
  }
}else{

   echo "<script type ='text/javascript'>
   alert('old password does not match')
  location='../client_side/PhotoArtEditProfile.php'
  </script>";

  $check =false;
}
}
if($check ==true && $stmt1=$con->prepare( "UPDATE User set email=?,password=?,bio=? where username=?")){

     $stmt1->bind_param('ssss',$email,$hashed,$bio,$_SESSION['username']);
     $stmt1->execute();

     echo "<script type ='text/javascript'>
     alert('Profile updated!')
     location='../client_side/PhotoArtEditProfile.php'
     </script>";

}
}else{
  header("location: processLogin.php");
}

mysqli_close($con);





?>
