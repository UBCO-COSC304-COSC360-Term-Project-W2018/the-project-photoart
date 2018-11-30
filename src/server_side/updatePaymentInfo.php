<?php
require("connection.php");
session_start();
if(isset($_SESSION['username'])){
  $user =$_SESSION['username'];
if($sql=$con->prepare("SELECT * from PaymentInfo  where username =?")){
  $sql->bind_param('s', $user);
  $sql->execute();
  $firstN=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $address=$_POST['address'];
  $country =$_POST['country'];
  $province = $_POST['Province'];
  $postal=$_POST['postal'];
  $email=$_POST['email'];
  $name=$_POST['Payment'];
  $carNum=$_POST['CardNumber'];
  $cardDate=$_POST['CardDate'];
  $cardCSV=$_POST['CardCSV'];
  $fullName=$firstN." ".$lastName;
  if($sql->num_rows){


  if($stmt=$con->prepare("UPDATE PaymentInfo set cardNum=?,username=?,nameOnCard=?,expDate=?,CSV=?,billingAddress=?,country=?,province=?,city=?,postalCode=?")){
    //$stmt->bind_param('iss');
    }else{

        }
}else{
echo "here";
  //nothing found new payment info
    $stmt1=$con->prepare("INSERT INTO PaymentInfo (cardNum,username,nameOnCard,expDate,CSV,billingAddress,country,province,city,postalCode)values(?,?,?,?,?,?,?,?,?,?)");
    $stmt1->bind_param('isssisssss',$cardNum,$user,$fullName,$cardDate,$cardCSV,$address,$country,$province,$city,$postal );
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
