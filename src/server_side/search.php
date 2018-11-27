<?php

session_start();

require('../server_side/header.php');
require('../server_side/connection.php');
  $sql = $con->prepare("SELECT username, firstName, lastName, email,bio FROM User WHERE username = ?");
  $sql->bind_param("s", $_SESSION['username']);
  $sql->execute();
  $sql->bind_result($username, $firstN, $lastN, $email,$bio);
  $outArray = array();
  while($row = $sql->fetch()){
    $outArray = array('username'=>$username, 'firstName'=>$firstN, 'lastName'=>$lastN, 'email'=>$email,'bio'=>$bio);
}

 ?>
