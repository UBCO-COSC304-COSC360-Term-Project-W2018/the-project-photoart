<?php
session_start();
$upc = $_POST["upc"];
unset($_SESSION["cart"][$upc]);
//update DB
include("updateCartDB.php");
 ?>
