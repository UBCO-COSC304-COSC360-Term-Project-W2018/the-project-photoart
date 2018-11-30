<?php
if(isset($_SESSION["username"])){
  //if logged in
  if(isset($_SESSION["cart"])){
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
                  $stmt->bind_param('sss',$itemQuantity,$upc,$cartId);
                  $stmt->execute();
                }
             }
            $hasItem = true;
          }
         }
         if(!$hasItem){
           //remove item from database
           if($stmt=$con->prepare("Delete From InCart Where upc = ? and cartId = ?")){
              $stmt->bind_param('ss',$upc,$cartId);
              $stmt->execute();
            }
        }
       }
    }

    //put cart items into database
    foreach($_SESSION["cart"] as $key => $itemQuantity){
      if($stmt=$con->prepare("")){
         $stmt->bind_param('s',$_SESSION["username"]);
         $stmt->execute();
       }
    }
  }
}
 ?>
