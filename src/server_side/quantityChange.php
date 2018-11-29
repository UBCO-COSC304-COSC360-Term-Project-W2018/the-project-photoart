<?php
include("../server_side/connection.php");
if($stmt=$con->prepare("Select price From Product Where upc = ?")){
   $stmt->bind_param('i',$_POST["upc"]);
   $stmt->execute();
   $stmt->bind_result($price);

   while ($stmt->fetch()){
     echo($price);
   }
}
 ?>
