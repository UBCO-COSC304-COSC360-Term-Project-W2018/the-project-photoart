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

function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

   <?php
   require('../server_side/header.php');
   include("../server_side/connection.php");

   //get product info
   $sql = "Select upc, price, imageLink, description, title From product";

   //get upc of product from referring page
   $upc = 1;
   $imageDesc;
   $imageTitle;
   $imagePrice;
   $imageQuantity;
   $imageSrc;

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

 //review submit
if(isset($_POST)){
 if(isset($_POST["review"])){
   if(isset($_SESSION["username"])){
     $msg = "Review has been added";
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
      <img src="../client_side/images/Nature/Forest.JPG" alt="PictureofProduct" title="<?php echo($imageTitle); ?>" class="shadow" id="mainPic"/>
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
    <button type="button" name="writeReview" class="shadow collapsible">Write Review</button>
    <div class="content review shadow">
      <form method="POST">
        <textarea name="review" class="text" placeholder="Enter review here..."></textarea>
        <br>
        <input type="submit" name="submit" class="shadow" value="Submit"><button type="button" name="cancel" class="shadow">Cancel</button>
      </form>
    </div>
    <div class="review shadow">
      <p class="author">AgentMikster44</p> <!-- this will need to be dynamic -->
      <p class="comment">Makes me want to go hiking now... 5/5</p>
    </div>
    <div class="review shadow">
      <p class="author">DozenTortillas88</p>
      <p class="comment">I appreciate this photo, however it reminds me of my girlfriend. 1/5</p>
    </div>
    <div class="review shadow">
      <p class="author">XxPhotographerBlissxX</p>
      <p class="comment">This photograph is very well layed out, I actually have purchased this exact one on canvas and it came in just a few days ago,
        we already put it up on the wall near our dining table. Now whilst we are consuming some incredible vegan homemade food, we canvas
        bask in the glory of this beautiful piece of art. Molto bello, magnifique! Muah, kisses from italy!</p>
    </div>
  </div>
  <footer>
    <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
  </footer>
</body>
</html>
<?php
//this needs to be at the bottom so it loads after all the html has been loaded
//Don't try to change this, window.onload also does not work
if(isset($_POST["submit"])){
  echo "<script type='text/javascript'>myFunction();</script>";
}
 ?>
