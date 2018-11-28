<!DOCTYPE html>
<html>
<head>
  <title>Search - PhotoArt</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/general.css"/>
  <link rel="stylesheet" type="text/css" href="css/search.css"/>
</head>
<body>
<?php

require('../server_side/header.php');
require('../server_side/connection.php');

echo "<div id='columnWrapper' class='shadow'>";

  $search = $_GET["searchBar"];
  $sql = ("SELECT title, imageLink FROM Product WHERE title LIKE '%". $search . "%'");
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) > 0){

    if(mysqli_num_rows($result) > 1){ //Checks to see how many results there are
    echo "<h1 id='results'>There are " . mysqli_num_rows($result) . " results!</h1><br><br>"; //if there are plural results
  }
  else{
    echo "<h1 id='results'>There is " . mysqli_num_rows($result) . " result!</h1> <br><br>"; //if there is a singular result
  }

    while($row = mysqli_fetch_assoc($result)){
      $title = $row['title'];
      $imgLink = $row['imageLink'];

      echo "<div id='resultSection' class='shadow'>";
      echo "<h3 id='titles'>".$title."</h3>";
      echo "<a href='PhotoArtPictureInfo.php'><img src=".$imgLink." id='images'></a></div>";


  }
}
  else{
  echo "<h1 id='noResults'>There are no results matching your search!</h1>";
  echo "<a href='PhotoArtMain.php'><h2 id='return'>Return to the previous page</h2></a>";
  }
 ?>
</div>
</body>
 </html>
