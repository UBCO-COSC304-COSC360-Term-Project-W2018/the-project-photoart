<!DOCTYPE html>
<html>
<head>
  <title>PhotoInfo - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/picInfo.css">
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
</head>
<body>
  <?php require('../server_side/header.php'); ?>
  <div id="surroundingBackground" class="shadow">
    <figure>
      <img src="images/Nature/Forest.jpg" alt="PictureofProduct" title="a walk in the forest" class="shadow" id="mainPic"/> <!-- image source will need to be dynamic? -->
      <figcaption>A walk in the forest</figcaption>
    </figure>
    <div id="imgInfoBG">
    <div id="imgInfoNoBtn" class="shadow">
      <h2>Image Info</h2>
      <p id="uniqueInfo">Information about the image here, stuff that makes it unique</p>
      <p class="shotInfo">Shot with: </p>
      <p class="shotInfo">ISO: </p>
      <p class="shotInfo">Location: </p>
      <p class="shotInfo">Format: </p>
      <button type="button" name="shareBtn">Share</button>
      <p class="picCost">$0.00</p>
    </div>
    <button type="button" name="addCart">Add to Cart</button>
  </div></div>
  <div id="reviewSec" class="shadow">
    <h3>Reviews</h3>
    <button type="button" name="writeReview" class="shadow">Write Review</button>
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