<?php

	function ConnectToDatabase()
	{

		$connectionString = 'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\\xampp\\htdocs\\assignment\\assignment4\\database\\assignment5.mdb';

		
		$connection = new PDO($connectionString);
		$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $connection;

	}

?>



