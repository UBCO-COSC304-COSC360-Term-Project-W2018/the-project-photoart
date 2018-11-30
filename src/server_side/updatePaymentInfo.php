<?php
require("connection.php");
session_start();
if(isset($_SESSION['username'])){
  $user =$_SESSION['username'];
if($sql=$con->prepare("SELECT * from PaymentInfo  where username =?")){
  $sql->bind_param('s', $user);
  $sql->execute();
   $firstN=$_POST['firstName'] ."<br>";
   $lastN=$_POST['lastName'] . "<br>";
echo $address=$_POST['address'] ."<br>";
echo $country =$_POST['country']."<br>";
echo $province = $_POST['Province']."<br>";
echo $postal=$_POST['postal']."<br>";
echo $email=$_POST['email']."<br>";
echo $name=$_POST['Payment']."<br>";
echo $cardNum=$_POST['CardNumber']."<br>";
echo $cardDate=$_POST['CardDate']."<br>";
echo $cardCSV=$_POST['CardCSV']."<br>";
echo $fullName=$firstN." ".$lastN;
  if($sql->num_rows){


  if($stmt=$con->prepare("UPDATE PaymentInfo set cardNum=?,username=?,nameOnCard=?,expDate=?,CSV=?,billingAddress=?,country=?,province=?,city=?,postalCode=?")){
    //$stmt->bind_param('i',$);
    }else{

        }
}else{
echo "here";

  //nothing found new payment info
    $stmt1=$con->prepare("INSERT INTO PaymentInfo (cardNum,username,nameOnCard,expDate,CSV,billingAddress,country,province,city,postalCode) values (?,?,?,?,?,?,?,?,?,?)");
    $stmt1->bind_param('ssssssssss',$cardNum,$user,$fullName,$cardDate,$cardCSV,$address,$country,$province,$city,$postal );
    $stmt1->execute();
    echo "it worked";

      var_dump($cardDate);
  // not working

}

}else{
  echo "bad query";
}

}else{
  echo "user not set";
}

 ?>
