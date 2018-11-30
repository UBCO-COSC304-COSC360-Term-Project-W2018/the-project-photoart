<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/general.css" />
<link rel="stylesheet" href="css/listallCustomer.css"/>

<?php

  require("../server_side/connection.php");
  require("../server_side/header.php");

?>
<div class="search-container">
<form method='post' action='ListAllCustomer.php'>
<input type= 'text' name='searchBar' placeholder='Search for a user..' class='shadow'/>
<button type='submit' name="searchButton">Search</button></form></div>
<form class="" action="PhotoArtEditProfileAdmin.php" method="post">
<button type="submit" name="button">Add User</button></form>

<div id="mainBG" class="shadow">
<?php
if(isset($_SESSION['adminUsername'])){
if(isset($_POST['searchBar'])){
  $search="%".$_POST['searchBar']."%";


  if($sql=$con->prepare("SELECT username, firstName,lastName,email from User where (username like ?) or (firstName like ?) or (lastName like ?) or (email like ?)")){
    $sql->bind_param('ssss',$search,$search,$search,$search);
      $sql->execute();
      $sql->bind_result($uName,$fName,$lName,$email);
echo "<table><tr><th>Username</th><th>First name</th><th>Last Name</th><th>Email</th><th>Edit Profile</th><th>Remove</th></tr>";

 while($sql->fetch()){
      echo "<tr><td>".$uName."</td><td>".$fName."</td><td>".$lName."</td><td>".$email."</td>";
      if($uName!=null){
          echo "<td><a href='PhotoArtEditProfileAdmin.php?username=".$uName."'>Edit</a></td><td><a href='../server_side/removeUser.php?username=".$uName."' >Remove</a></td></tr>";

        }
      }
      echo "</table";
  }else{
    echo "bad";
  }
}else{
$results=mysqli_query($con,"SELECT * from User");
echo "<table><tr><th>Username</th><th>First name</th><th>Last Name</th><th>Email</th><th>EditProfile</th><th>Remove</th></tr>";
while($row = $results->fetch_assoc()){
  echo "<tr><td>".$row['username']."</td><td>".$row['firstName']."</td><td>".$row['lastName']."</td><td>".$row['email']."</td>"
      ."<td><a href='PhotoArtEditProfileAdmin.php?username=".$row['username']."'>Edit</a></td><td><a href='../server_side/removeUser.php?username=".$row['username']."' >Remove</a></td></tr>";
}
echo "</table>";
}
}else{
  header("location: ../server_side/processLogin.php");
}
$con->close();
 ?>
</div>
