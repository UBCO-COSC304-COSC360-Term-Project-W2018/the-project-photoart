<?php
require("connection.php");
session_start();
$check=false;
if(isset($_SESSION['adminUsername'])){
if(isset($_GET['upc'])){
    $upc=$_GET['upc'];
  }
if($check ==false &&$stmt=$con->prepare("DELETE from Product where upc=?")){
  $stmt->bind_param('s',$upc);
  $stmt->execute();
  echo "<script type ='text/javascript'>
  alert('Product has been dropped')
  location='../client_side/alterProduct.php'
  </script>";
}else{
  echo "<script type ='text/javascript'>
  alert('Product could Not be dropped')
  location='../client_side/alterProduct.php'
  </script>";
}
}else{
  header("location: processLogin.php");
}
$con->close()

 ?>
