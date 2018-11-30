<?php
require('connection.php');

if(isset($_SESSION['username'])){
  $uName = $_SESSION['username'];

if($stmt =$con->prepare("SELECT username,imageLink,contentType from ProfilePic where username =?")){
  $stmt->bind_param('s',$uName);
  $stmt->execute();
  $stmt->store_result();
  $stmt-> bind_result($uID,$image,$type);
  $stmt->fetch();


  $pic='<img src ="data:image/'.$type.';base64,'.base64_encode($image).'"/>';
}else{
  echo "could not prepare";
  $checked=false;
  $con->error;
}



}else{
      echo "user does not exist";
    }
mysqli_close($con);
?>
