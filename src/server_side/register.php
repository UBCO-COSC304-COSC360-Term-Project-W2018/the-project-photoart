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

    echo "wrong method";
    mysqli_close($con);
  }else{
    echo "<p>fill out all fields</p>";
  }
if($check==true){
    $results=mysqli_query($con,"SELECT firstName,lastName,email,username from Member");
    while($row = $results->fetch_assoc()){
      if((strcasecmp($row['email'],$email)==0)||(strcasecmp($row['username'],$uName)==0)){
        echo "<p> User already exists with this username and/or email</p>";
        echo "<a href =".$address."> Return to user entry</a>";
        $check = false;

      }
    }
    if($check ==true && $stmt=$con->prepare("INSERT into Member (username,firstName,lastName,email,password) values(?,?,?,?,?)")){
        $hashed = md5($pwd);
       $stmt->bind_param('sssss',$uName,$fName,$lName,$email,$hashed);
       $stmt->execute();
       echo "<p> An accout for the user ". $uName. " has been created";
  }

}
mysqli_close($con);





 ?>
