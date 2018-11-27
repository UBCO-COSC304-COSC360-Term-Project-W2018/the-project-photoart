<?php
include('connection.php');

session_start();
if(isset($_SESSION['username'])){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $email = $_POST["email"];
}
    $sql = $connection->prepare("SELECT username, firstName, lastName, email FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->bind_result($user, $firstN, $lastN, $email);
    $outArray = array();
    while($row = $sql->fetch()){
      $outArray = array('username'=>$user, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email);
      echo
       "<form>
        <fieldset>
        <legend>User: " . $user . "</legend>
        <table><tr><td>First Name: " . $firstN . "</td></tr>
        <tr><td>Last Name: " . $lastN . "</td></tr>
        <tr><td>Email: " . $email . "</td></tr></table></fieldset></form>";
        $sql->close();
  }
}
else{
  header("Location: login.php");
}
 ?>
