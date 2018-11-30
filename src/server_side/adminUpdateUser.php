<?php
require('connection.php');
session_start();
if(isset($_SESSION['adminUsername'])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
  //pre-exising user
  if(isset($_POST['email'])&&isset($_GET['username'])){
    $pwd=$_POST['newPass'];
    $hashed=md5($pwd);
    $firstN=$_POST['firstName'];
    $lastN = $_POST['lastName'];
    $email =$_POST['email'];
    $check=true;
    $uName =$_GET['username'];
if($_SERVER["REQUEST_METHOD"]=="GET"){

  echo "wrong method";
  mysqli_close($con);
}
if($check==true){
  $results=$con->prepare("SELECT email from User where username !=?");
  $results->bind_param('s',$uName);
  $results->execute();
  $results->bind_result($db_email);
echo "hello";
  while($results->fetch()){
    if((strcasecmp($db_email,$email)==0)){
    echo "<script type ='text/javascript'>
    alert('e-mail already in use')
    location='../client_side/PhotoArtEditProfileAdmin.php'
    </script>";
      $check = false;

    }
  }
}if($check ==true && $stmt1=$con->prepare( "UPDATE User set firstName=?, lastName=?, email=?,bio=? where username=?")){
  $stmt1->bind_param('sssss',$firstN,$lastN,$email,$bio,$uName);
  $stmt1->execute();
  echo "<script type ='text/javascript'>
   alert('Profile updated!')
   location='../client_side/ListAllCustomer.php'
  </script>";

}
//new user
}elseif(strlen($_POST['password'])!=0 &&strlen($_POST['email'])!=0){
  $user=$_POST['username'];
  $pwd=$_POST['password'];
  $hashed=md5($pwd);
  $firstN=$_POST['firstName'];
  $lastN = $_POST['lastName'];
  $email =$_POST['email'];
  $check=true;
  if($check==true){
    $results=$con->prepare("SELECT email from User where username !=?");
    $results->bind_param('s',$user);
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
    $sql=$con->prepare("INSERT into User (username, firstName,lastName,email,password)values(?,?,?,?,?)");
    $sql->bind_param('sssss',$user,$firstN,$lastN,$email,$hashed);
    $sql->execute();
    echo "<script type ='text/javascript'>
    alert('User added')
    location='../client_side/ListAllCustomer.php'
    </script>";

}else{
  header("location: ". $_SERVER['HTTP_REFERER']);
}
}
}else{
  header("location: processLogin.php");
}

mysqli_close($con);





?>
