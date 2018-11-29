<?php

require('connection.php');
session_start();
if(isset($_SESSION['adminUsername'])){
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_GET['upc'])&&isset($_POST['upc'])&&isset($_POST['title'])&&isset($_POST['category'])&&isset($_POST['price'])&&isset($_POST['imageLink'])&&isset($_POST['description'])){

 $upc =$_POST['upc'];
 $title=$_POST['title'];
 $cat=$_POST['category'];
 $price=$_POST['price'];
 $imageLink=$_POST['imageLink'];
 $desc=$_POST['description'];
 $upc_original=$_GET['upc'];






$stmt1=$con->prepare( "UPDATE Product set upc=?,title=?,category=?,price=?,imageLink=?,description=? where upc=?");

     $stmt1->bind_param('issdssi',$upc,$title,$cat,$price,$imageLink,$desc,$upc_original);
     $stmt1->execute();
     echo "<script type ='text/javascript'>
      alert('item updated!')
      location='../client_side/alterProduct.php'
     </script>";

}elseif (strlen($_POST['upc'])!=0 &&strlen($_POST['imageLink'])!=0) {
  $upc =$_POST['upc'];
  $title=$_POST['title'];
  $cat=$_POST['category'];
  $price=$_POST['price'];
  $imageLink=$_POST['imageLink'];
  $desc=$_POST['description'];
  if($sql=$con->prepare("INSERT INTO Product (upc,title,category,price,imageLink,description) values(?,?,?,?,?,?)")){
    $sql->bind_param('issdss', $upc,$title,$cat,$price,$imageLink,$desc);
    $sql->execute();
    echo "<script type ='text/javascript'>
     alert('item inserted!')
     location='../client_side/alterProduct.php'
    </script>";
  }
}
}elseif($_SERVER["REQUEST_METHOD"]=="GET"){

  echo "<script type ='text/javascript'>
   alert('Wrong Method!')
   location='../client_side/alterProduct.php'
  </script>";
}else{
  header("location: processLogin.php");
}
}
mysqli_close($con);





?>
