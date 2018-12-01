<?php
session_start();
include("connection.php");
$upc = $_POST["upc"];
$quantity = $_POST["quantity"];
//update cart
$_SESSION["cart"][$upc] = $quantity;
include("updateCartDB.php");
//get and return price
if($stmt=$con->prepare("Select price From Product Where upc = ?")){
   $stmt->bind_param('s', $upc);
   $stmt->execute();
   $stmt->bind_result($price);
   while ($stmt->fetch()){
     echo($price);
   }
 }

 mysqli_close($con);
 ?>
