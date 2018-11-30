<!DOCTYPE html>
<html>
<head>
  <title>Explore - PhotoArt</title>
  <link rel="stylesheet" href="css/reset.css"/>
  <link rel="stylesheet" href="css/general.css"/>
  <link rel="stylesheet" href="css/photoArtExplore.css"/>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
</head>
<body>
  <?php require('../server_side/header.php'); ?>
    <div id="mainBG" class="shadow">
      <h2>Explore - Click on a photo to view similar photos!</h2>
        <div id="columnWrapper" class="shadow">
          <a href="PhotoArtAbstract.php"><img src="images/Abstract/fire.jpg" alt="A vibrant fire" id="images"></a>
          <h3>Abstract -<span id="ital"> Explore the wild side</span></h3>
        </div>
        <div id="columnWrapper" class="shadow">
          <a href="PhotoArtLandscape.php"><img src="images/Landscape/slopes.jpg" alt="Cascading lush slopes" id="images"></a>
          <h3>Landscape -<span id="ital"> Wider angles makes your mouth dangle</span></h3>
        </div>
        <div id=columnWrapper class="shadow">
          <a href="PhotoArtNature.php"><img src="images/Nature/creek.jpg" alt="A creek with clear water" id="images"></a>
          <h3>Nature -<span id="ital"> Beautiful escapes provided by mother Earth</h3>
        </div>
        <div id="columnWrapper" class="shadow">
          <a href="PhotoArtDogs.php"><img src="images/Dogs/Thunder.jpg" alt"A very cute dog" id="images"></a>
          <h3>Dogs -<span id="ital"> Need we say more?</h3>
        </div></div>
    <footer>
      <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
    </footer>

</body>
</html>
