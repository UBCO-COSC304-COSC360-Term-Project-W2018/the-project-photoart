<!DOCTYPE html>
<html>
<head>
  <title>PhotoInfo - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/picInfo.css">
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
<script>
window.onload = function() {
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
}

function cancelWriteReview() {
  document.getElementById("writeReview").click();
  document.getElementById('textArea').value = '';
 }

function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
}
</script>

   <?php
   require('../server_side/header.php');
   include("../server_side/connection.php");

   //get product info
   $sql = "Select upc, price, imageLink, description, title From Product";

   //get upc of product from referring page
   $upc = $_GET["upc"];
   $imageDesc;
   $imageTitle;
   $imagePrice;
   $imageQuantity;
   $imageSrc;

   //check if upc is a number, if not, show error message
   if(!is_numeric($upc)){
     echo("<br>Error: upc is not a number");
     return;
   }

   $results = mysqli_query($con, $sql);
   //foreach result(row) in results
   if (isset($results)){
   while ($row = mysqli_fetch_row($results)){
     if ($row[0]==$upc){
       $imageDesc = $row[3];
       $imageTitle = $row[4];
       $imagePrice = $row[1];
       //get the image quantity by summing all warehouse quantities
       // $imageQuantity = ..
       $imageSrc = $row[2];
     }
   }
 }

//if no product was found, show error message
if(!isset($imageSrc)){
  echo("<br>Error: product not found");
  return;
}

 //review submit
 if(!isset($_SESSION["review"]))
  $_SESSION["review"] = null;
if(isset($_POST)){
  //this is to prevent refreshing page from making multiple copies and messing things up
  if(isset($_POST["review"]) and $_POST["review"] != $_SESSION["review"]){
   if(isset($_SESSION["username"]) and !empty($_POST["review"])){
     $review = $_POST["review"];
     //delete any previous reviews from this product and user before adding
     if($stmt=$con->prepare("Delete From Review Where upc = ? and username = ?")){
        $stmt->bind_param('ss',$upc,$_SESSION["username"]);
        $stmt->execute();
      }
     //add review
     $_SESSION["review"] = $_POST["review"];
     //TODO: Check if user has purchased product before they can write a review
     $msg = "Review has been added";
     if($stmt=$con->prepare("Insert Into Review(details, upc, username) values(?,?,?)")){
        $stmt->bind_param('sss',$_POST["review"],$upc,$_SESSION["username"]);
        $stmt->execute();
      }
   }else{
     $msg = "You need to be logged in to add a review";
   }
   if(empty($_POST["review"]))
   $msg = "Review text cannot be submitted empty";
 }
}
   ?>
</head>
<body>
<div id="snackbar" class="shadow"><?php echo($msg); ?></div>

  <div id="surroundingBackground" class="shadow">
    <figure>
      <img src="<?php echo($imageSrc); ?>" alt="PictureofProduct" title="<?php echo($imageTitle); ?>" class="shadow" id="mainPic"/>
      <figcaption><?php echo($imageTitle); ?></figcaption>
    </figure>
    <div id="imgInfoBG">
    <div id="imgInfoNoBtn" class="shadow">
      <h2>Image Info</h2>
      <p id="uniqueInfo"><?php echo($imageDesc); ?></p>
      <button type="button" name="shareBtn">Share</button>
      <p class="picCost">$<?php echo($imagePrice); ?></p>
    </div>
    <button type="button" name="addCart">Add to Cart</button>
  </div></div>
  <div id="reviewSec" class="shadow">
    <h3>Reviews</h3>
    <button type="button" id="writeReview" name="writeReview" class="shadow collapsible">Write Review</button>
    <div class="content review shadow">
      <form method="POST">
        <textarea id="textArea" name="review" class="text" placeholder="Enter review here..."></textarea>
        <br>
        <input type="submit" name="submit" class="shadow" value="Submit">
        <button type="button" name="cancel" onclick="cancelWriteReview()" class="shadow collapsible">Cancel</button>
      </form>
    </div>
<?php
//show all reviews for particular product
if($stmt=$con->prepare("Select details, username From Review Where upc = ?")){
   $stmt->bind_param('s',$upc);
   $stmt->execute();
   $stmt->bind_result($details, $username);

   while ($stmt->fetch()){
     echo('<div class="review shadow">');
     echo('<p class="author">'.$username.'</p>');
     echo('<p class="comment">'.$details.'</p>');
     echo('</div>');
   }

   if($stmt->num_rows() == 0){
     echo("<br><br><br><br>No reviews to display.");
   }
}
 ?>
  </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
<?php
//this needs to be at the bottom so it loads after all the html has been loaded
//Don't try to change this, window.onload also does not work
if(isset($_POST["submit"]) and isset($msg)){
  echo "<script type='text/javascript'>myFunction();</script>";
}

mysqli_close($con);
 ?>
