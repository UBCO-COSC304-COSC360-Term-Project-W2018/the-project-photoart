<?php
session_start();
include("connection.php");
$totalPrice = 0;
foreach ($_SESSION["cart"] as $key => $quantity) {
if($stmt=$con->prepare("Select price From Product Where upc = ?")){
   $stmt->bind_param('s', $key);
   $stmt->execute();
   $stmt->bind_result($price);
   while ($stmt->fetch()){
     $totalPrice += $price * $quantity;
   }
 }
}
echo($totalPrice);
 mysqli_close($con);
 ?>
