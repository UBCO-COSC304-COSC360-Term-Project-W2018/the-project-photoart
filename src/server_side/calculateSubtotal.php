<?php
include("connection.php");
session_start();
//get subtotal price
if(isset($_SESSION["username"])){
if($stmt=$con->prepare("Select cartTotal From Cart Where username = ?")){
   $stmt->bind_param('s', $_SESSION["username"]);
   $stmt->execute();
   $stmt->bind_result($cartTotal);
   while ($stmt->fetch()){
     echo($cartTotal);
   }
 }}
 else if(isset($_SESSION["cart"])){
   $cartIdVar;
   if($stmt=$con->prepare("Select cartId From Cart Where username = ?")){
      $stmt->bind_param('s', $_SESSION["username"]);
      $stmt->execute();
      $stmt->bind_result($cartId);
      while ($stmt->fetch()){
        $cartIdVar = $cartId;
      }}
   $total = 0;
   foreach($_SESSION["cart"] as $key => $quantity){
     if($stmt=$con->prepare("Select price From Product Where upc = ?")){
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result($price);
        while ($stmt->fetch()){
          $total += $price * $quantity;
        }}
   }
   echo($total);
 }
 ?>
