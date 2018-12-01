<?php
session_start();
include("connection.php");
//put cart items into order
$cartTotal;
if($stmt=$con->prepare("Select cartTotal From Cart Where username = ?")){
   $stmt->bind_param('s', $_SESSION["username"]);
   $stmt->execute();
   $stmt->bind_result($cartAmount);
   while ($stmt->fetch()){
     $cartTotal = $cartAmount;
   }
 }
 $_SESSION["ordered"] = $cartTotal;
//add tax to amount
$cartTotal = $cartTotal * 1.12;
$orderId;
if($stmt=$con->prepare("Insert Into Orders(totalPrice, username, orderDate) Values(?,?,?)")){
   $time = date("Y-m-d h:i:s");
   $stmt->bind_param('sss', $cartTotal, $_SESSION["username"], $time);
   $stmt->execute();
   $orderId = $con->insert_id;
 }
foreach($_SESSION["cart"] as $key => $quantity){
  if($stmt=$con->prepare("Insert Into Contains(amount, orderId, upc) Values(?,?,?)")){
     $stmt->bind_param('sss', $quantity, $orderId, $key);
     $stmt->execute();
   }
}

$_SESSION["ordered"] = 1;
//show alert and go to homepage
unset($_SESSION['cart']);
include("updateCartDB.php");
mysqli_close($con);
header("Location: ../client_side/PhotoArtMain.php");
exit;
 ?>
