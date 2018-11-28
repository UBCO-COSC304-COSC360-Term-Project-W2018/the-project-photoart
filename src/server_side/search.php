<?php

require('../server_side/header.php');
require('../server_side/connection.php');
  $search = $_GET["searchBar"];
  $sql = ("SELECT title, imageLink FROM Product WHERE title LIKE '%'. $search .'%'");
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $title = $row['title'];
      $imgLink = $row['imageLink'];
      echo $title;
      echo $imgLink;
      $sql->close();
  }
}
  else{
  echo "No search results found!";
  }
 ?>
