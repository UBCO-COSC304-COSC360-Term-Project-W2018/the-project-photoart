<?php
require("connection.php");
session_start();
if(isset($_SESSION['username'])){
  $user =$_SESSION['username'];
if($sql=$con->prepare("SELECT * from PaymentInfo  where username =?")){
  $sql->bind_param('s', $user);
  $sql->execute();
   $firstN=$_POST['firstName'];
   $lastN=$_POST['lastName'];
$address=$_POST['address'];
$country =$_POST['country'];
$province = $_POST['Province'];
$city = $_POST['city'];
$postal=$_POST['postal'];
$email=$_POST['email'];
$name=$_POST['Payment'];
$cardNum=$_POST['CardNumber'];
$cardDate=$_POST['CardDate'];
$cardCSV=$_POST['CardCSV'];
$fullName=$firstN." ".$lastN;

  if($sql->fetch()>0){

    $sql->close();
  if($stmt=$con->prepare("UPDATE PaymentInfo set cardNum=?,nameOnCard=?,expDate=?,CSV=?,billingAddress=?,country=?,province=?,city=?,postalCode=? where username=?")){
    $stmt->bind_param('ssssssssss',$cardNum,$fullName,$cardDate,$cardCSV,$address,$country,$province,$city,$postal,$user);
    $stmt->execute();
    echo "<script type ='text/javascript'>
    alert('Payment/shipping information has been updated')
    location='../client_side/PhotoArtEditProfile.php'
    </script>";
    }else{

        }
}else{

$sql->close();
  //nothing found new payment info
    $stmt1=$con->prepare("INSERT INTO PaymentInfo (cardNum,username,nameOnCard,expDate,CSV,billingAddress,country,province,city,postalCode) values (?,?,?,?,?,?,?,?,?,?)");
    $stmt1->bind_param('ssssssssss',$cardNum,$user,$fullName,$cardDate,$cardCSV,$address,$country,$province,$city,$postal );
    $stmt1->execute();
    echo "<script type ='text/javascript'>
    alert('Payment/shipping information has been created')
    location='../client_side/ListAllCustomer.php'
    </script>";

  // not working

}

}else{
  echo "bad query";
}

}else{
  echo "user not set";
}

 ?>
