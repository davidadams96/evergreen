<?php 
	
	require "config.php";

	try{
		
		$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		/*
		Using the current client's ID from the table, select from the database customers that match that client ID and store the results in an array
		*/
		$clientID = $_SESSION['evergreenLogin'];
		
		$stmt = $conn -> prepare("SELECT * FROM `Customers` WHERE ClientID='$clientID' ORDER BY LastName ASC");
		
		$stmt -> execute();
		
		$customerArray = array();
		
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
			$customerArray[] = $row; 
		}
		
	}

	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	$conn = null;

?>