<?php
include('connection.php');

  $check = false;
  $address= $_SERVER['HTTP_REFERER'];

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST['firstName'])&& isset($_POST['lastName'])&& isset($_POST['regUsername'])&& isset($_POST['regEmail'])&&isset($_POST['regPassword'])){
      $fName= $_POST['firstName'];
      $lName= $_POST['lastName'];
      $uName= $_POST['regUsername'];
      $email =$_POST['regEmail'];
      $pwd =$_POST['regPassword'];
      $check=true;
    }
  }elseif($_SERVER["REQUEST_METHOD"]=="GET"){

    echo "Error: Request Method is not Post";
    mysqli_close($con);
  }else{
    echo "<p>fill out all fields</p>";
  }
if($check==true){
    $results=mysqli_query($con,"SELECT firstName,lastName,email,username from User");
    while($row = $results->fetch_assoc()){
      if((strcasecmp($row['email'],$email)==0)||(strcasecmp($row['username'],$uName)==0)){
      echo "<script type ='text/javascript'>
      alert('Username and/or email already in use')
      location='../client_side/PhotoArtRegister.php'
      </script>";
        $check = false;

      }
    }
  }
    if($check ==true && $stmt=$con->prepare("INSERT into User (username,firstName,lastName,email,password) values(?,?,?,?,?)")){
        $hashed = md5($pwd);
       $stmt->bind_param('sssss',$uName,$fName,$lName,$email,$hashed);
       $stmt->execute();
       session_start();
       $_SESSION['username']= $uName;
       header("location: processLogin.php");
  }
mysqli_close($con);
 ?>
