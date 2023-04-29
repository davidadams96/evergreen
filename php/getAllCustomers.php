<?php 
	
	require "config.php";

	try{
		
		$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn -> prepare("SELECT * FROM Customers ORDER BY LastName ASC");
		
		$stmt -> execute();
		
		$customerArray = array();
		
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
			$customerArray[] = $row; 
		}
		
	}

?>