<link rel="stylesheet" type="text/css" href="css/form.css">
<?php

	include("connection.php");

	function SearchVendorNumber()
	{
		$connection = ConnectToDatabase();

		$querySelect = "SELECT VendorNo FROM VENDORS";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		
		$preparedQuerySelect -> execute();

		echo "<select class='selectPart' id='vendorNumber' name='vendorNumber'>";
			
		while ($row = $preparedQuerySelect -> fetch())
		{
			$vendorNumber = (int)$row["VendorNo"];

			echo"<option value='$vendorNumber'>$vendorNumber</option>";
		}
		echo "</select>";

	}

	function FillPartTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		$querySelect = "SELECT * FROM PARTS";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$partId = $row["PartID"];
			$vendorNumber = $row['VendorNo'];
			$description = $row['Description'];
			$onHand = $row['OnHand'];
			$onOrder = $row['OnOrder'];
			$cost = $row['Cost'];
			$listPrice = $row['ListPrice'];

			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$partId</td>";
			$tableBodyText .= "<td>$vendorNumber</td>";
			$tableBodyText .= "<td>$description</td>";

			$number = number_format($onHand,0);
			$tableBodyText .= "<td>$number</td>";

			$number = number_format($onOrder,0);
			$tableBodyText .= "<td>$number</td>";

			$number = number_format($cost,2);
			$tableBodyText .= "<td>$$number</td>";

			$number = number_format($listPrice,2);
			$tableBodyText .= "<td>$$number</td>";

			$tableBodyText .= "</tr>";

		}
		$tableBodyText .= "</table>";

		echo $tableBodyText;

	}

	function FillVendorTable()
	{

		$tableBodyText = "";

		$connection = ConnectToDatabase();

		$querySelect = "SELECT * FROM Vendors";
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$vendorNo = $row["VendorNo"];
			$vendorName = $row['VendorName'];
			$address1 = $row['Address1'];
			$address2 = $row['Address2'];
			$city = $row['City'];
			$prov = $row['Prov'];
			$postCode = $row['PostCode'];
			$county = $row['Country'];
			$phone = $row['Phone'];
			$fax = $row['Fax'];

			$tableBodyText .= "<tr>";
			
			$number = round($vendorNo,0);
			$tableBodyText .= "<td>$number</td>";

			$tableBodyText .= "<td class='text'>$vendorName</td>";
			$tableBodyText .= "<td class='text'>$address1</td>";
			$tableBodyText .= "<td class='text'>$address2</td>";
			$tableBodyText .= "<td class='text'>$city</td>";
			$tableBodyText .= "<td class='text'>$prov</td>";
			$tableBodyText .= "<td class='text'>$postCode</td>";
			$tableBodyText .= "<td class='text'>$county</td>";
			$tableBodyText .= "<td class='text'>$phone</td>";
			$tableBodyText .= "<td class='text'>$fax</td>";
			$tableBodyText .= "</tr>";

		}
		$tableBodyText .= "</table>";

		echo $tableBodyText;

	}


	function CreatePartTableHeader()
	{

		$text = "<table>";
		$text .= "<tr>";
		$text .= "<th>Part ID</th>";
		$text .= "<th>Vendor Number</th>";
		$text .= "<th>Description</th>";
		$text .= "<th>OnHand</th>";
		$text .= "<th>OnOrder</th>";
		$text .= "<th>Cost</th>";
		$text .= "<th>List Price</th>";
		$text .= "</tr>";

		echo $text;

	}

	function CreateVendorTableHeader()
	{

		$text = "<table>";
		$text .= "<tr>";
		$text .= "<th>Vendor Number</th>";
		$text .= "<th>Vendor Name</th>";
		$text .= "<th>Address1</th>";
		$text .= "<th>Address2</th>";
		$text .= "<th>City</th>";
		$text .= "<th>Province</th>";
		$text .= "<th>PostCode</th>";
		$text .= "<th>Count</th>";
		$text .= "<th>Phone</th>";
		$text .= "<th>Fax</th>";
		$text .= "</tr>";

		echo $text;

	}
?>



