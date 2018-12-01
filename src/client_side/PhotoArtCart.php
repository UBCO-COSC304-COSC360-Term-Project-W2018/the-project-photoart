<!DOCTYPE html>
<html>
<head>
  <title>Cart - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/shoppingCart.css">
  <!-- get jquery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
  window.onload = function() {

    //dynamically update quantity
    $(".quantity").on("change paste keyup", function() {
      var upc = $(this).attr("name");
      var quantity = $(this).val();
      //make sure value is valid
      if(quantity.length != 0){
        if(quantity<1){
          quantity = 1;
          $(this).val(quantity);
        }
      }
      //allow only numbers
      var sanitized = quantity.replace(/[^0-9]/g, '');
      $(this).val(sanitized);

      var price;
      //get price and update database
      $.post("../server_side/getPrice.php", {upc:upc,quantity:quantity}, function(result){
        price = quantity * result;
        var id = "#sub" + upc;
        $(id).text("Price: $"+price);
      });

      //update total price
      $.post("../server_side/getTotalPrice.php", {}, function(result){
        $("#subtotal").text("Subtotal: $"+result);
      });
    });

    //if checkout is clicked
    $("#checkout").on("click", function(){
      window.location.href = "PhotoArtCheckout.php";
    });

    //remove an item from cart
    $(".remItem").on("click", function(){
      //update price total
      $.post("../server_side/calculateSubtotal.php", {upc:upc}, function(result){
        document.getElementById("subtotal").innerHTML = "Subtotal: $" + result;
      });

      var upc = $(this).attr("name");
      var div = "#prod" + upc;
      $(div).remove();
      //remove item from cart
      $.post("../server_side/removeItemFromCart.php", {upc:upc}, function(result){});
    });
  }
  </script>


</head>
<body>
  <?php require('../server_side/header.php'); ?>
  <div id="mainBG">
    <h2>Shopping Cart</h2>
    <!-- <img src="shoppingCartPic.jpg" alt="Cart" title="Cart" id="cartPic"> -->
      <div id="content">
        <?php
include("../server_side/connection.php");
if(isset($_SESSION["cart"]) and !empty($_SESSION["cart"])){
  foreach($_SESSION["cart"] as $key => $quantity){
    if($stmt=$con->prepare("Select price, imageLink, description, title From Product Where upc = ?")){
       $stmt->bind_param('s',$key);
       $stmt->execute();
       $stmt->bind_result($price, $imageLink, $description, $title);
       while ($stmt->fetch()){
         $stock = 1;
         echo("<div class='item shadow' id='prod".$key."'>");
         echo("<img class='prodImg shadow' src='".$imageLink."' alt='Product Picture'>");
         echo("<span class='title'>".$title."</span>");
         echo("<div class='priceInfo'>");
         echo('<button type="button" class="remItem" name="'.$key.'">Remove Item</button>');
         // echo("<p class='stock'>In Stock: ".$stock."</p>");
         echo('<p>Quantity: <input type="number"  name="'.$key.'" class="quantity" id="quant'.$key.'" min="1" value="'.$quantity.'"></p>');
         echo("<br><p id='sub".$key."' class='subtotal'>Price: $".$price*$quantity."</p>");
         echo("</div></div>");
       }
     }
   }
}else{
  //if cart is not set
  echo("<p>Nothing in cart</p>");
}
         ?>
    </div>
    <button class="shadow" type="button" name="checkout" id="checkout">Checkout</button>
  <div id="total" class="shadow">
    <p id="subtotal">Subtotal: $
<?php
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
</p>
  </div>
  </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
