
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/general.css">
<link rel="stylesheet" href="css/adminTable.css">
<?php
require("../server_side/connection.php");
require("../server_side/header.php");
?>
<div class="search-container"><form method='post' action='alterProduct.php'><input type= 'text' name='searchBar' placeholder='Search for a product..' class='shadow'/>
<button type='submit' name="searchButton">Search</button>
</form></div>
<form class="" action="editProductAdmin.php" method="post">
  <button type="submit" name="button">Add Product</button>
</form>
<div id="mainBG">
<?php
if(isset($_SESSION['adminUsername'])){
if(isset($_POST['searchBar'])){
  $search="%".$_POST['searchBar']."%";
  $search = filter_var($search,FILTER_SANITIZE_STRING);

  if($sql=$con->prepare("SELECT upc, title,category,price,imageLink,description from Product where (upc like ?) or (title like ?) or (category like ?) or (price like ?) or (imageLink like ?) or (description like ?)")){
      $sql->bind_param('ssssss',$search,$search,$search,$search,$search,$search);
      $sql->execute();
      $sql->bind_result($upc,$title,$cat,$price,$imageLink,$description);

echo "<table><tr><th>UPC</th><th>Title</th><th>Category</th><th>Price</th><th>Image Link</th><th>Description</th><th>edit</th><th>remove</th></tr>";
  while($sql->fetch()){
    echo  "<tr><td>".$upc."</td><td>".$title."</td><td>".$cat."</td><td>".$price."</td><td>".$imageLink."</td><td>".$description."</td>";
      if($upc>=0){
          echo "<td><a href='editProductAdmin.php?upc=".$upc."'>Edit</a></td><td><a href='../server_side/removeProduct.php?upc=".$upc."' >Remove</a></td></tr>";

        }
      }
      echo "</table>";
  }else{
    echo "bad";
  }
}elseif($stmt=$con->query("SELECT * from Product")){
  echo "<table><thead><tr><th>UPC</th><th>Title</th><th>Category</th><th>Price</th><th>Imagelink</th><th>Description</th></tr></thead>";
  while($row=$stmt->fetch_assoc()){
    echo "<tr><td>".$row['upc']."</td><td>".$row['title']."</td><td>".$row['category']."</td><td>".$row['price']."</td>"
        ."<td>".$row['imageLink']."</td><td>".$row['description']."</td>
        <td><a href='editProductAdmin.php?upc=".$row['upc']."'>Edit</a></td><td><a href='../server_side/removeProduct.php?upc=".$row['upc']."' >Remove</a></td></tr>";

  }
  echo "</table>";
}
}else {
  header("location: ../server_side/processLogin.php");
}

 ?>
</div>
