<?php
require('connection.php');
error_reporting(E_ALL);
ini_set('display_erros',1);
session_start();
if(isset($_SESSION['username'])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['firstName'])&& isset($_POST['lastName'])&& isset($_POST['username'])&& isset($_POST['email'])&&isset($_POST['oldPass'])&&isset($_POST['newPass'])){
    $fName= $_POST['firstName'];
    $lName= $_POST['lastName'];
    $uName= $_POST['username'];
    $email =$_POST['email'];
    $pwd =$_POST['newPass'];
    $bio=$_POST['bio'];

    $check=true;
  }
}elseif($_SERVER["REQUEST_METHOD"]=="GET"){

  echo "wrong method";
  mysqli_close($con);
}else{
  echo "<p>fill out all fields</p>";
}
if($check==true){
  $results=mysqli_query($con,"SELECT firstName,lastName,email,username from User");
  while($row = $results->fetch_assoc()){
    if((strcasecmp($row['email'],$email)==0)||(strcasecmp($row['username'],$uName)==0)){
    echo "<script type ='text/javascript'>
    alert('Username and/or e-mail already in use')
    location='../client_side/PhotoArtEditProfile.php'
    </script>";
      $check = false;

    }
  }
}
if($check ==true && $stmt=$con->prepare( "UPDATE User set username=?,firstName=?,lastName=?,email=?,password=?,bio=? where username=?")){
    $hashed = md5($pwd);
     $stmt->bind_param('sssssss',$uName,$fName,$lName,$email,$hashed,$bio,$_SESSION['username']);
     $stmt->execute();
     $_SESSION['username']= $uName;
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
