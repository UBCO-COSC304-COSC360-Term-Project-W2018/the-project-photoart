<?php
session_start();
$upc = $_POST["upc"];
$quantity = $_POST["quantity"];
if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = array($upc=>$quantity);
}else{
  $updated = false;
  //check if item already in cart
  foreach($_SESSION["cart"] as $key => $item) {
    //if item already in cart
    if ($key == $upc){
      //update quantity
      $_SESSION["cart"][$upc] = $_SESSION["cart"][$upc] + $quantity;
      $updated = true;
    }
  }
  //if not updated
  if(!$updated){
    $_SESSION["cart"][$upc] = $quantity;
  }
}
$_SESSION["test"] = 0;
//try to write to DB
include("addCartDB.php");
echo($_SESSION["test"]);
 ?>
