<?php
require('connection.php');
session_start();
if(isset($_SESSION['adminUsername'])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['email'])&&isset($_POST['newPass'])){
    $email =$_POST['email'];
    $pwd =$_POST['newPass'];
    $bio=$_POST['bio'];
    $hashed = md5($pwd);
    $check=true;
    $uName = $_GET['username'];
  }
}elseif($_SERVER["REQUEST_METHOD"]=="GET"){

  echo "wrong method";
  mysqli_close($con);
}else{
  echo "<p>fill out all fields</p>";
}
if($check==true){
  $results=$con->prepare("SELECT email from User where username !=?");
  $results->bind_param('s',$uName);
  $results->execute();
  $results->bind_result($db_email);

  while($results->fetch()){
    if((strcasecmp($db_email,$email)==0)){
    echo "<script type ='text/javascript'>
    alert('e-mail already in use')
    location='../client_side/PhotoArtEditProfileAdmin.php'
    </script>";
      $check = false;

    }
  }
}
}
if($check ==true && $stmt1=$con->prepare( "UPDATE User set email=?,password=?,bio=? where username=?")){

     $stmt1->bind_param('ssss',$email,$hashed,$bio,$uName);
     $stmt1->execute();
     echo "<script type ='text/javascript'>
      alert('Profile updated!')
      location='../client_side/ListAllCustomer.php'
     </script>";

}
else{
  header("location: processLogin.php");
}

mysqli_close($con);





?>
