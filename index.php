<!--
    This is for handling the database using php

	Revision History
	April 6, 2019 Created by Yunice Kim(7940406)
  April 9, 2019 Updated by Yunice Kim
  April 12, 2019 Updated by Yunice Kim
-->
<?php
  require("partVendorData.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assignment 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    <script type="text/javascript" src="js/validatePartForm.js"></script>
    <script type="text/javascript" src="js/validateVendorForm.js"></script>
    <script type="text/javascript" src="js/validateSearchListForm.js"></script>
</head>
<body onload="firstFocus();">
  <h1>PARTS</h1>
  <h2>Please Input new Part information below</h2>
  

  <form name="myPartform" method="Post" onsubmit=""  action="parts.php" >

<!--
  <form name="myPartform" method="Post" onsubmit="return validatePartForm();"  action="parts.php" >
-->
    <label>PART ID : </label>
    &nbsp;<input id="partId" placeholder="" type="text" name="partId"><br/>

    <label>VENDOR Number :</label>
    &nbsp;
    
    <?php
      SearchVendorNumber();
    ?>
<!--
    <input id="vendorNumber" placeholder="" type="text" name="vendorNumber"><br/>
-->
    <label>DESCRIPTION : </label>
    &nbsp;<input id="description" placeholder="" type="text" name="description"><br/>

    <label>ON HAND : </label>
    &nbsp;<input id="onHand" placeholder="" type="text" name="onHand"><br/>

    <label>ON ORDER : </label>
    &nbsp;<input id="onOrder" placeholder="" type="text" name="onOrder"><br/>

    <label>COST : </label>
    $<input id="cost" placeholder="" type="text" name="cost"><br/>
    
    <label>LIST PRICE : </label>
    $<input id="listPrice" placeholder="" type="text" name="listPrice"><br/><br/>

    <input type="submit" value="ADD NEW PART">
    <p id="partErrors"></p>
  </form>  

  <h1>VENDORS</h1>
<!--
<form name="myVendorform" method="Post" onsubmit="return validateVendorForm();"  action="vendors.php" >
-->
<h2>Please Input new Vendor information below</h2>
<form name="myVendorform" method="Post" onsubmit=""  action="vendors.php" >

  <label>VENDOR NUMBER : </label>
  <input id="vendorNumberInVendorForm" placeholder="" type="text" name="vendorNumberInVendorForm"><br/>

  <label>VENDOR NAME : </label>
  <input id="vendorName" placeholder="" type="text" name="vendorName"><br/>

  <label>ADDRESS1 : </label>
  <input id="address1" placeholder="Address 1" type="text" name="address1"><br/>

  <label>ADDRESS2 : </label>
  <input id="address2" placeholder="Address 2" type="text" name="address2"><br/>

  <label>CITY : </label>
  <input id="city" placeholder="Kitchener" type="text" name="city"><br/>

  <label>PROVINCE</label>
  <select class="selectVendor" name="province" id="province">
      <option value="Alberta">Alberta</option>
      <option value="British Columbia">British Columbia</option>
      <option value="Manitoba">Manitoba</option>
      <option value="New Brunswick">New Brunswick</option>
      <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
      <option value="Nova Scotia">Nova Scotia</option>
      <option value="Ontario" selected>Ontario</option>
      <option value="Prince Edward Island">Prince Edward Island</option>
      <option value="Quebec">Quebec</option>
      <option value="Saskatchewan">Saskatchewan</option>
      <option value="Northwest Territories">Northwest Territories</option>
      <option value="Nunavut">Nunavut</option>
      <option value="Yukon">Yukon</option>
  </select><br/><br/>

  <label>POST CODE : </label>
  <input id="postcode" placeholder="X9X 9X9" type="text" name="postcode"><br/>

  <label>COUNTRY : </label>
  <input id="country" placeholder="Canada" type="text" name="country"><br/>

  <label>PHONE : </label>
  <input id="phone" placeholder="123-123-1234" type="text" name="phone"><br/>

  <label>FAX : </label>
  <input id="fax" placeholder="123-123-1234" type="text" name="fax"><br/>
  <br/>

  <input type="submit" value="ADD NEW VENDOR">
  <p id="vendorErrors"></p>
</form> 

<h1>SEARCH</h1>
<!--
<form name="mySearchListform" method="Post" onsubmit="return validateSearchListForm();"  action="" >
-->
<h2>Please Select Menu to Retrieve</h2>
<form name="myVendorform" method="Post" onsubmit=""  action="parameter.php" >

  <label>LIST</label>
  <select class="selectVendor" name="list" id="list">
      <option value="PARTS">PARTS</option>
      <option value="VENDORS">VENDORS</option>
      <option value="EVERYTHING" >EVERYTHING</option>
  </select><br/><br/>

  <input type="submit" value="RETRIEVE LIST">
  <p id="searchListErrors"></p>
</form> 

</body>
</html>




