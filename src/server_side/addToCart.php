<?php
$upc = $_POST["upc"];
$quantity = $_POST["quantity"];
if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = array($upc=>$quantity);
}else{
  $_SESSION["cart"][$upc] = $quantity;
}
 ?>
