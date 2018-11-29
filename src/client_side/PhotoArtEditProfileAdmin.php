<?php require('../server_side/header.php');
      require('../server_side/connection.php');?>
   <link rel="stylesheet" href="css/reset.css" />
   <link rel="stylesheet" href="css/general.css" />
<<<<<<< HEAD
=======
   <link rel="stylesheet" href="css/editprofileAdmin.css" />
>>>>>>> be875a02085858942773043e8616964899561a2d
   <script type="text/javascript" src="script/checkRequired.js"></script>
   <script type="text/javascript" src="script/profilePage.js"></script>

<div id="mainBG" class="shadow">
<?php
if(isset($_SESSION['adminUsername'])){
  //editing pre-existing users
      if(isset($_GET['username'])){
        $uName=$_GET['username'];

    $sql = $con->prepare("SELECT firstName, lastName, email,bio,password FROM User WHERE username = ?");
    $sql->bind_param("s",$uName);
    $sql->execute();
    $sql->bind_result($firstN, $lastN, $email,$bio,$password);
    echo"<form method='post' action='../server_side/adminUpdateUser.php?username=".$uName."'>"
    ."<table><thead><tr><th>FirstName</th><th>Lastname</th><th>Email</th><th>Bio</th><th>Password</th></tr></thead>";
while($sql->fetch()){
    echo "<tr><td><input type='text' name='firstName' value='$firstN'/></td>"
    ."<td><input type='text' name='lastName' value='$lastN'/></td>"
    ."<td><input type='text' name='email' value='$email'/></td>"
    ."<td><input type='text' name='bio' value='$bio'/></td>"
    ."<td><input type='text' name='newPass' value=''/></td></tr>";
  }
  echo "<tr><td colspan= '2'><button id='submit' class='button2' type='submit' name='confChanges'>Confirm Changes</button></td></tr>";
}else{
  echo"<form method='post' action='../server_side/adminUpdateUser.php'>"
  ."<table><thead><tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr></thead>";

      echo "<tr><td><input type='text' name='username'/></td>"
      ."<td><input type='text' name='firstName' /></td>"
      ."<td><input type='text' name='lastName'/></td>"
      ."<td><input type='text' name='email' /></td>"
      ."<td><input type='text' name='password'/></td></tr>";
    echo "<tr><td colspan= '5'><button id='submit' class='button2' type='submit' name='confChanges'>Add User</button></td></tr>";

}
}else {
  header("location: ../server_side/processLogin.php");
}
?>
</div>
