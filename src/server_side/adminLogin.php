<?php
//credentials nested in connection.php
session_start();
include('connection.php');
//setting a variable to make sure all the code does not get executed if it set to false
  $check = true;
  //checking to see if the method is a post
  //look at html from tag
  //$_POST is a super global that takes info from html form
  //will return an array so 'username is the key and grabs that from the html form
  //that value is the name="_____" in the html form
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST['username'])&& isset($_POST['password'])){
      $uName= $_POST['username'];
      $pwd =$_POST['password'];

    }
    //checking to make sure it is set via post method
    //if it is sets boolean to false so connection gets closed
  }elseif($_SERVER["REQUEST_METHOD"]=="GET"){
$check = false;
    echo "wrong method";
    mysqli_close($con);
  }
  // if everything went right
if($check= true){
 //making a variable to check if the username and password exist in the database
  $found = false;
  $results=mysqli_query($con,"SELECT username from Admin");
  $hashed = md5($pwd);
  //returns an array called row with keys that are what you are returning from the sql query
  while($row = $results->fetch_assoc()){
      $results1=mysqli_query($con,"SELECT username,password from User");
      while($row1=$results1->fetch_assoc()){
        if(strcasecmp($row1['username'],$row['username'])==0){
          if(strcasecmp($row1['password'],$hashed)==0){
            $_SESSION['adminUsername']=$row['username'];
            header("location: ../client_side/PhotoArtMain.php");
            $found =true;
            break;
          }
        }
      }

}
}if($found == false){
  echo "<script type ='text/javascript'>
  alert('username and/or password is incorrect')
  location='../client_side/adminPortal.php'
  </script>";
  
}

mysqli_close($con);

 ?>
