<?php
  //to call all functions for database
  require("partVendorData.php");

  //get list name from the form
  $list = $_POST['list'];
 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Result of Searching List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- This is how you link your external JS file to your HTML -->
    
</head>
<body>
<br>
 <h1>List of <?php echo $list ?></h1>
<br>
  <div class="searchListFormData">
<?php

  $errors = '';
  
  if(trim($list) == '')
  {
    $errors .= 'Select one of the list. <br/>';
  }
  
  if( $errors != '')
  {
    echo $errors;
  }
  else//retrieve all kinds of data from the database
  {
    
    switch ($list) {
      case "PARTS":
        echo " <h2>Retrieve of PARTS Success!</h2>    ";
        CreatePartTableHeader();//make the title of table
        FillPartTable();//fill the data on the table
        break;
      case "VENDORS":
        echo " <h2>Retrieve of VENDORS Success!</h2>    ";
        CreateVendorTableHeader();
        FillVendorTable();
        break;
      case "EVERYTHING"://everything is part and vendor
        echo " <h2>Retrieve of PARTS Success!</h2>    ";
        CreatePartTableHeader();
        FillPartTable();
        echo  "&nbsp";
        echo " <h2>Retrieve of VENDORS Success!</h2>    ";
        CreateVendorTableHeader();
        FillVendorTable();
        break;
      default:
        echo "<h2>There is some error for executing your command</h2>";
    }
    
?>

 
 <?php
  }
 ?>
  </div>

</body>
</html>








