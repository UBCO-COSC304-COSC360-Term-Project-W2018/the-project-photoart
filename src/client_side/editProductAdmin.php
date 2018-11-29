
   <link rel="stylesheet" href="css/reset.css" />
   <link rel="stylesheet" href="css/general.css" />

<?php


  require('../server_side/header.php');
  require('../server_side/connection.php');
  if(isset($_SESSION['adminUsername'])){
      if(isset($_GET['upc'])){
        $upc=$_GET['upc'];
      }
    $sql = $con->prepare("SELECT * FROM Product WHERE upc = ?");
    $sql->bind_param("s",$upc);
    $sql->execute();
    $sql->bind_result($upc,$title,$category,$price,$imageLink,$description,$timesOrdered);
  echo"<form method='post' action='../server_side/adminUpdateProduct.php?upc=".$upc."'>"
  ."<table><thead><tr><th>UPC</th><th>Title</th><th>Category</th><th>Price</th><th>Imagelink</th><th>Description</th></tr></thead>";
    while($sql->fetch()){
      echo "<tr><td><input type='text' name='upc' value='$upc'/></td>"
      ."<td><input type='text' name='title' value='$title'/></td>"
      ."<td><input type='text' name='category' value='$category'/></td>"
      ."<td><input type='text' name='price' value='$price'/></td>"
      ."<td><input type='text' name='imageLink' value='$imageLink'/></td>"
      ."<td><input type='text' name='description' value='$description'/></td></tr>";
    }
    echo "<tr><td colspan= '2'><button id='submit' class='button2' type='submit' name='confChanges'>Confirm Changes</button></td></tr>";

}else{
  header("location: ../server_side/processLogin.php");
}

?>
