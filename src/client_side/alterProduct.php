
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/adminTable.css">
<?php
require("../server_side/connection.php");
require("../server_side/header.php");
if($stmt=$con->query("SELECT * from Product")){
echo "<table><thead><tr><th>UPC</th><th>Title</th><th>Category</th><th>Price</th><th>Imagelink</th><th>Description</th></tr></thead>";
  while($row=$stmt->fetch_assoc()){
    echo "<tr><td>".$row['upc']."</td><td>".$row['title']."</td><td>".$row['category']."</td><td>".$row['price']."</td>"
        ."<td>".$row['imageLink']."</td><td>".$row['description']."</td>
        .<td><a href='editProductAdmin.php?upc=".$row['upc']."'>Edit</a></td><td><a href='../server_side/removeUser.php?username=".$row['title']."' >Remove</a></td></tr>";

  }
  echo "</table>";
}

 ?>
