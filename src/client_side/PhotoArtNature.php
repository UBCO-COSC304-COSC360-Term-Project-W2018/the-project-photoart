
<?php require('../server_side/header.php');
require('../server_side/connection.php');?>

<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/categoryPhotos.css"/>
<div id='columnWrapper' class='shadow'>
<h1>Nature - <span id="ital"> Beautiful escapes provided by mother Earth</span></h1>
<?php
$sql = ("SELECT title, imageLink, upc, category FROM Product WHERE category='Nature'");
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $title = $row['title'];
    $imgLink = $row['imageLink'];
    $imgUPC = $row['upc'];
echo"<div id=resultSection class='shadow'>
<p id='titles'>".$title."</p>
<br>
  <span><a href='PhotoArtPictureInfo.php?upc=".$imgUPC."'><img src=".$imgLink." alt='Photo of the week' id='images'></a></span> <!-- this links to the photoart picture info page -->

</div>";
}
}
?>
</div>
