<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result of Inputing Vendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    
</head>
<body>

 <h1>Inputed Vendor's Information</h1>
 <br>
 
  <div class="vendorFormData">
  
<?php

  $errors = '';
  //get all inputs from the form
  $vendorNumberInVendorForm = $_POST['vendorNumberInVendorForm'];
  $vendorName = $_POST['vendorName'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $postcode = $_POST['postcode'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $fax = $_POST['fax'];

  //validate all inputs are correct
  if(trim($vendorNumberInVendorForm) == '')
  {
    $errors .= 'Type the Vendor Number. <br/>';
  }
  else
  {
    if(!is_numeric($vendorNumberInVendorForm))
    {
        $errors .= "Type the Vendor Number as a number.<br/>";
    }
    else
    {
        $vendorNumberInVendorForm = intval($vendorNumberInVendorForm);
    }
  }
  
  if(trim($vendorName) == '')
  {
    $errors .= 'Type the Vendor Name. <br/>';
  }
  
  if(trim($address1) == '')
  {
    $errors .= 'Type the Address 1. <br/>';
  }
 /* 
  if(trim($address2) == '')
  {
    $errors .= 'Type the Address 2. <br/>';
  }
  */
  if(trim($city) == '')
  {
    $errors .= 'Type the City. <br/>';
  }
  
  if(trim($province) == '')
  {
    $errors .= 'Type the Province. <br/>';
  }
  else
  {
    $province = strtoupper($province);
  }
  
  if(trim($postcode) == '')
  {
    $errors .= 'Type the Postcode. <br/>';
  }
  else
  {
    $pattern = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";
    if( !preg_match($pattern, $postcode) )
    {
      $errors .= 'The Format of Postcode is wrong. <br/>';
    }
  }
  
  if(trim($country) == '')
  {
    $errors .= 'Type the Country. <br/>';
  }
  else
  {
    $country = strtoupper($country);
  }
  
  if(trim($phone) == '')
  {
    $errors .= 'Type the Phone. <br/>';
  }
  else
  {
    $pattern = "/^\d{3}-\d{3}-\d{4}$/";
    if( !preg_match($pattern, $phone) )
    {
      $errors .= 'The Format of Phone is wrong. <br/>';
    }
  }
  
  if(trim($fax) == '')
  {
    $errors .= 'Type the fax. <br/>';
  }
  else
  {
    $pattern = "/^\d{3}-\d{3}-\d{4}$/";
    if( !preg_match($pattern, $fax) )
    {
      $errors .= 'The Format of Fax is wrong. <br/>';
    }
  }
    
  if( $errors != '')
  {
    echo $errors;
  }
  else//if all inputs are right, insert those into the database
  {

    $connection = ConnectToDatabase();

    $queryInsert = "insert into VENDORS ( VendorNo, VendorName,  Address1, Address2, City, Prov, PostCode, Country, Phone, Fax) VALUES ('$vendorNumberInVendorForm', '$vendorName', '$address1', '$address2', '$city', '$province', '$postcode', '$country', '$phone', '$fax')";

    $preparedQueryInsert = $connection -> prepare($queryInsert);
    $preparedQueryInsert -> execute();

?>
 <h2>Input success!</h2>    
 <label>VENDOR NUMBER</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$vendorNumberInVendorForm</span>";
  ?>
  <br/>
  
 <label>VENDOR NAME</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$vendorName</span>";
  ?>
  <br/>

 <label>ADDRESS1</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$address1</span>";
  ?>
  <br/>

 <label>ADDRESS2</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$address2</span>";
  ?>

 <label>CITY</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$city</span>";
  ?>

 <label>PROVINCE</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$province</span>";
  ?>

 <label>POSTCODE</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$postcode</span>";
  ?>

<label>COUNTRY</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$country</span>";
  ?>

<label>PHONE</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$phone</span>";
  ?>

<label>FAX</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$fax</span>";
  ?>

 <?php
  }
 ?>
  </div>
</body>
</html>








