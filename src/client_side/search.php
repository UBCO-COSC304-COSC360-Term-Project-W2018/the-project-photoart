<!DOCTYPE html>
<html>
<head>
  <title>Search - PhotoArt</title>
  <link rel="stylesheet" type="text/css" href="../client_side/css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="../client_side/css/general.css"/>
</head>

<?php

require('../server_side/header.php');
require('../server_side/connection.php');

  $search = $_GET["searchBar"];
  $sql = ("SELECT title, imageLink FROM Product WHERE title LIKE '%". $search . "%'");
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){

    if(mysqli_num_rows($result) > 1){ //Checks to see how many results there are
    echo "There are " . mysqli_num_rows($result) . " results!<br><br>"; //if there are plural results
  }
  else{
    echo "There is " . mysqli_num_rows($result) . " result! <br><br>"; //if there is a singular result
  }

    while($row = mysqli_fetch_assoc($result)){
      $title = $row['title'];
      $imgLink = $row['imageLink'];

      echo "<p id='titles'>".$title."</p>";
      echo "<a href='../client_side/PhotoArtPictureInfo.php'><img src=".$imgLink." id='images'></a>";
  }
}
  else{
  echo "There are no results matching your search!";
  }
 ?>
 </html>
