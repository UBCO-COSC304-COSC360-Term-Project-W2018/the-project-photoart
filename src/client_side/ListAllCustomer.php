<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/general.css" />
<?php
require("../server_side/connection.php");
require("../server_side/header.php");

$results=mysqli_query($con,"SELECT * from User");
while($row = $results->fetch_assoc()){
  echo "<table><tr><th>Username</th><th>First name</th><th>Last Name</th><th>Email</th><th>EditProfile</th><th>Remove</th></tr>"
      ."<tr><td>".$row['username']."</td><td>".$row['firstName']."</td><td>".$row['lastName']."</td><td>".$row['email']."</td>"
      ."<td><a href='PhotoArtEditProfileAdmin.php?username=".$row['username']."'>Edit</a></td><td><a href='../server_side/removeUser.php?username=".$row['username']."' >Remove</a></td></tr>";

}
$con->close();
 ?>
