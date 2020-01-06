<?php

	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result of Inputing Part</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    
</head>
<body>

 <h1>Inputed Part's Information</h1>

 <br>
  <div class="partFormData">
  
<?php

  $errors = '';
  //get inputs from the form
  $partId = $_POST['partId'];
  $vendorNumber = $_POST['vendorNumber'];
  $description = $_POST['description'];
  $onHand = $_POST['onHand'];
  $onOrder = $_POST['onOrder'];
  $cost = $_POST['cost'];
  $listPrice = $_POST['listPrice'];

  //validate all inputs are right
  if(trim($partId) == '')
  {
    $errors .= 'Type the Part ID. <br/>';
  }
  else
  {
    if(!is_numeric($partId))
    {
        $errors .= "Type the Part ID as a number.<br/>";
    }
    else
    {
        $partId = intval($partId);
    }
  }
  
  if(trim($vendorNumber) == '')
  {
    $errors .= 'Type the Vendor Number. <br/>';
  }
  else
  {
    if(!is_numeric($vendorNumber))
    {
        $errors .= "Type the Vendor Number as a number.<br/>";
    }
    else
    {
        $vendorNumber = intval($vendorNumber);
    }
  }
  
  if(trim($description) == '')
  {
    $errors .= 'Type the Description. <br/>';
  }
  
  if(trim($onHand) == '')
  {
    $errors .= 'Type the on Hand Amount. <br/>';
  }
  else
  {
    if(!is_numeric($onHand))
    {
        $errors .= "Type the on Hand Amount as a number.<br/>";
    }
    else
    {
        $onHand = intval($onHand);
    }
  }

  if(trim($onOrder) == '')
  {
    $errors .= 'Type the Order Amount. <br/>';
  }
  else
  {
    if(!is_numeric($onOrder))
    {
        $errors .= "Type the on Order Amount as a number.<br/>";
    }
    else
    {
        $onOrder = intval($onOrder);
    }
  }

  if(trim($cost) == '')
  {
    $errors .= 'Type the Cost. <br/>';
  }
  else
  {
    if(!is_numeric($cost))
    {
        $errors .= "Type the Cost as a number.<br/>";
    }
    else
    {
        $cost = intval($cost);
    }
  }

  if(trim($listPrice) == '')
  {
    $errors .= 'Type the List Price. <br/>';
  }
  else
  {
    if(!is_numeric($listPrice))
    {
        $errors .= "Type the List Price as a number.<br/>";
    }
    else
    {
        $listPrice = intval($listPrice);
    }
  }
  
  //if there are some errors, show the errors
  if( $errors != '')
  {
    echo $errors;
  }
  else//or insert all inputs on the database
  {

    $connection = ConnectToDatabase();

    $queryInsert = "insert into PARTS ( PartID, VendorNo,  Description, OnHand, OnOrder, Cost, ListPrice) VALUES ('$partId', '$vendorNumber', '$description', '$onHand', '$onOrder', '$cost', '$listPrice')";

    $preparedQueryInsert = $connection -> prepare($queryInsert);
    $preparedQueryInsert -> execute();

?>
 <h2>Input success!</h2>   
 <label>PART ID</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$partId</span>";
  ?>
  <br/>
  
 <label>VENDOR NUMBER</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$vendorNumber</span>";
  ?>
  <br/>

 <label>DESCRIPTION</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$description</span>";
  ?>
  <br/>

 <label>ON HAND</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$onHand</span>";
  ?>

 <label>ON ORDER</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$onOrder</span>";
  ?>

 <label>COST</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$$cost</span>";
  ?>

 <label>LIST PRICE</label><label class="colon">:</label>
  <?php 
    echo "<span class='rightAlign'>$$listPrice</span>";
  ?>

 <?php
  }
 ?>
  </div>
</body>
</html>








