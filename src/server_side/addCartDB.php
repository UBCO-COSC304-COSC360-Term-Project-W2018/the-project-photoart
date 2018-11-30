<?php
$_SESSION["test"] = 0;
include("connection.php");
if(isset($_SESSION["username"])){
  //if logged in
  if(isset($_SESSION["cart"])){
    //make sure there is a cart and get cartId
    $cartIdVar;
    if($stmt=$con->prepare("Select cartId From Cart Where username = ?")){
       $stmt->bind_param('s', $_SESSION["username"]);
       $stmt->execute();
       $stmt->bind_result($cartId);
       $hasCart = false;
       while ($stmt->fetch()){
         $cartIdVar = $cartId;
         $hasCart = true;
       }
       //if does not have cart
       if(!$hasCart){
         //create new cart
         if($stmt=$con->prepare("Insert Into Cart(username, cartTotal) Values(?, 0)")){
            $stmt->bind_param('s',$_SESSION["username"]);
            $stmt->execute();
          }
          //get cartId of new cart
          if($stmt=$con->prepare("Select cartId From Cart Where username = ?")){
             $stmt->bind_param('s', $_SESSION["username"]);
             $stmt->execute();
             $stmt->bind_result($cartId);
             while ($stmt->fetch()){
               $cartIdVar = $cartId;
             }
           }
       }
     }

    //if items in cart
    //remove all old items from cart in database that are not in cart anymore and update quantities
    if($stmt=$con->prepare("Select upc,Cart.cartId,quantity From InCart Join Cart Where InCart.cartId = Cart.cartId and username = ?")){
       $stmt->bind_param('s',$_SESSION["username"]);
       $stmt->execute();
       $stmt->bind_result($upc,$cartId,$quantity);
       while ($stmt->fetch()){
         $hasItem = false;
         foreach($_SESSION["cart"] as $key => $itemQuantity){
           //check if cart has item
           if($upc==$key){
             if($quantity!=$itemQuantity){
               //update quantity
               if($stmt=$con->prepare("Update InCart Set quantity = ? Where upc = ? and cartId = ?")){
                  $stmt->bind_param('sss',$itemQuantity,$upc,$cartIdVar);
                  $stmt->execute();
                }
             }
            $hasItem = true;
          }
         }
         if(!$hasItem){
           //remove item from database
           if($stmt=$con->prepare("Delete From InCart Where upc = ? and cartId = ?")){
              $stmt->bind_param('ss',$upc,$cartIdVar);
              $stmt->execute();
            }
        }
       }
    }

    //put cart items into database
    foreach($_SESSION["cart"] as $key => $itemQuantity){
      if($stmt=$con->prepare("Select upc From InCart Where cartId = ? and upc = ?")){
         $stmt->bind_param('ss',$cartIdVar,$key);
         $stmt->execute();
         $stmt->bind_result($upc);
         $hasItem = false;
         while ($stmt->fetch()){
           $_SESSION["test"] = 1;
           //if item is in DB
           $hasItem = true;
         }
         //if does not have item
         if(!$hasItem){
           //get product details
           $price;
           if($stmt=$con->prepare("Select price From Product Where upc = ?")){
              $stmt->bind_param('s',$key);
              $stmt->execute();
              $stmt->bind_result($cost);
              while ($stmt->fetch()){
                $price = $cost;
              }
            }

              // $_SESSION["test"] = 1;
           //add item to database
           if($stmt=$con->prepare("Insert Into InCart(cartId,price,quantity,totalPrice,upc) Values(?,?,?,?,?)")){
             $totalPrice = $itemQuantity*$price;
              $stmt->bind_param('sssss',$cartIdVar,$price,$itemQuantity,$totalPrice,$key);
              $stmt->execute();
          }
        }
       }
    }
  }
}
 ?>
