<!DOCTYPE html>
<html>
<head>
  <title>Home - PhotoArt</title>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
   <link rel="stylesheet" type="text/css" href="css/reset.css"/>
   <link rel="stylesheet" type="text/css" href="css/general.css"/>
   <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
  <?php require('../server_side/header.php'); ?>
  <div class="search-container">
    <form method="get" action="PhotoArtSearch.php"> <!-- this can be added later, also the following pages may be useful
      https://www.w3schools.com/howto/howto_css_searchbar.asp
      https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_searchbar3 -->
    <input type="text" name="searchBar" placeholder="Search Photos.." class="shadow"/>
    <button type="submit"><!-- image of magnifying glass similar to the link above!--></button>
    </form>
  </div>
  <div class ="columnWrapper"> <!-- this will be the background of the 3 columns -->
    <div class="column shadow" id="left">
      <h2>About Us</h2>
      <br>
      <p>The simple description of our business is that we sell and ship high-quality images printed on different sizes of premium canvases for reasonable prices.  However, PhotoArt knows the power of a meaningful photo, which is why we don’t consider ourselves just a photo-distribution service, rather a service that provides a window to your innermost dreams and desires.  Fill your home, workspace or office with these beautiful escapes from your everyday life.
      <br><br>  We aim to showcase the beauty of our world with pictures.  I’m sure you’ll agree, the price tag is well worth the photograph quality and customer experience.
      </p>
    </div>
    <div class="column shadow" id="middle">
      <h2>Photo of the Week</h2>
      <br>
      <p>A walk in the forest</p>
      <br>
        <span><a href="PhotoArtPictureInfo.php"><img src="images/Nature/Forest.JPG" alt="Photo of the week" id="container"></a></span> <!-- this links to the photoart picture info page -->
      <br>
      <br>
      <p>
        We chose this stunning image taken by Jan Reisler because it uniquely reminds us of simpler times... Going on hikes, enjoying the summer sun, and best of all no worries, hakuna matata.
      </p>
    </div>
    <div class="column shadow" id = "right">
      <h2>Join Our Team</h2>
      <br>
      <p>With so many stock photo websites and near unlimited access to pictures readily available on the internet, the true beauty of photography is being lost.  PhotoArt still believes in the importance of photography, which is why we employ a team of highly-experienced professional photographers to deliver our customers with spectacular images.
        <br> <br>
        Art is borderless, which is why a central goal of our company is to provide a diverse view of the world all around us.  For this reason, our photographers are posted all around the world, from the golden dunes of the Sahara to the snow-covered peaks of the Rocky Mountains.
        <br> <br>
        So join us, and help us capture our world through your lenses as a PhotoArt member.
      </p>
    </div>
  </div>
    <footer>
      <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
    </footer>
</body>
</html>
