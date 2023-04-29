<?php 
	
	require "config.php";

	try{
		
		$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$customer = $_GET['customer'];
		
		$stmt = $conn -> prepare("SELECT * FROM Customers WHERE ID=$customer ORDER BY LastName ASC");
		
		$stmt -> execute();
		
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
			$company = $row['Company'];
			$firstName = $row['FirstName'];
			$lastName = $row['LastName'];
			$phone = $row['Phone'];
			$addressOne = $row['AddressOne'];
			$addressTwo = $row['AddressTwo'];
			$city = $row['City'];
			$postcode = $row['Postcode'];
		}
		
	}

?>