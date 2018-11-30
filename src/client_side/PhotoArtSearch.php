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

  $search = '%' . $_GET["searchBar"] . '%';
  $sql = $con->prepare("SELECT title, imageLink, upc, description FROM Product WHERE title LIKE ?");
  $sql->bind_param("s", $search);
  $sql->execute();
  $result = $sql->get_result();
  if($result->num_rows > 0){

    if($result->num_rows > 1){ //Checks to see how many results there are
    echo "<h1 id='results'>There are " . $result->num_rows . " results!</h1><br><br>"; //if there are plural results
  }
  else{
    echo "<h1 id='results'>There is " . $result->num_rows . " result!</h1> <br><br>"; //if there is a singular result
  }

    while($row = $result->fetch_assoc()){
      $title = $row['title'];
      $imgLink = $row['imageLink'];
      $imgUPC = $row['upc'];
      $description = $row['description'];

      echo "<div id='resultSection' class='shadow'>";
      echo "<h3 id='titles'>".$title."</h3>";
      echo "<a href='PhotoArtPictureInfo.php?upc=".$imgUPC."'><img src=".$imgLink." id='images'></a>";
      echo "<p>".$description. "</p></div>";
  }
}
  else{
  echo "<h1 id='noResults'>There are no results matching your search!</h1>";
  echo "<a href='PhotoArtMain.php'><h2 id='return'>Return to the previous page</h2></a>";
  }
  $sql->close(); /*close connection*/
 ?>
</div>
</body>
</html>
