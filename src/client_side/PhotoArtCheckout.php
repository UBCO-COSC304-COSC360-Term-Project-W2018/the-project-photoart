<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <!-- will add stylesheets, js and php header and footers
   (STYLE THEM AND THEN WE CAN COPY AND PASTE THEM INTO A HEADER AND FOOOTER PHP PAGES LATER ON) -->
   <link rel="stylesheet" type="text/css" href="css/reset.css"/>
   <link rel="stylesheet" type="text/css" href="css/general.css"/>
   <link rel="stylesheet" type="text/css" href="css/checkout.css"/>
   <script type="text/javascript" src="script/checkRequired.js"></script>
   <script type="text/javascript" src="script/paymentInfoCheck.js"></script>
</head>
<body>
<?php require('../server_side/header.php'); ?>
  <div id="mainBG">
    <h1>Payment and Shipping Information</h1>
  <form method="post" action="profile.php"> <!-- profile.php will have to be changed to appropriate location -->
    <fieldset>
      <table>
        <tbody>
        <tr>
          <td><label>First Name</label></td>
          <td><label>Last Name</label></td>
          </tr>
        <tr>
          <td><input class="button1 required" type="text" name="firstName"/></td>
          <td><input class="button1 required" type="text" name="lastName"/></td>
        </tr>
        <tr><td colspan="2"><label>Shipping Address</label><td></tr>
        <tr><td colspan="2"><input class="button2 required" type="text" name="address"/></td></tr>
        <tr>
            <td><label>Country</label></td>
            <td><label>Province</label></td>
        </tr>
        <tr>
          <td>
            <select name="country">
              <option value="CA">CA</option>
            </select></td>
          <td colspan="2">
            <select name="Province">
              <option value="BC">BC</option>
              <option value="AB">AB</option>
              <option value="SK">SK</option>
              <option value="MB">MB</option>
              <option value="ON">ON</option>
              <option value="QC">QC</option>
              <option value="NB">NB</option>
              <option value="NS">NS</option>
              <option value="NL">NL</option>
              <option value="PE">PE</option>
            </select>
          </td>
        </tr>
        <tr><td colspan="2"><label>Email</label></td></tr>
        <tr><td colspan="2"><input class="button2 required" type="text" name="email"/></td></tr>
        <tr><td colspan="2"><label>Payment method</label></td></tr>
        <tr><td colspan="2">
          <select name="Payment">
            <option value="MasterCard">MasterCard</option>
            <option value="Visa">Visa</option>
          </select>
          </td> <!-- should be the type "password" or "text"? -->
        </tr>
        <tr><td><label>CardNumber</label></td>
            <td><label>Expiry Date</label></td>
            <td><label>CSV</label></td>
        </tr>
        <tr>  <td><input maxlength="16" class="button2 required" type="text" name="CardNumber"></td>
              <td><input class="button2" type="month" name="CardDate" value="2020-01" required></td>
              <td><input maxlength="3" class="button2 required" type="text" name="CardCSV"></td>
        </tr>
    </tbody></table>
    <div id="Items">
      <p>breakfast Photo $50.00</p>
      <p>breakfast Photo $50.00</p>
      <p>breakfast Photo $50.00</p>
      <p>breakfast Photo $50.00</p>
    </div>
    <div id="total">
      <h2>Grand total</h2>
      <p>$200.00</p>
      <button id="submit" type="submit" name="saveChanges" class="shadow">Checkout</button>
    </div>

    </fieldset>
  </form>
</div>
<footer>
  <p>&copy; 2018 PhotoArt All Rights Reserved | Website created for COSC 360/304</p>
</footer>
</body>
</html>
