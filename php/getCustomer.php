<?php 
	
	require "config.php";

	try{
		
		$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//Get the customer ID from the URL string and select that customers information from the database. Also checking to make sure the customer being selected belongs to that client. 
		$customer = $_GET['customer'];
		$clientID = $_SESSION['evergreenLogin'];
		
		$stmt = $conn -> prepare("SELECT * FROM Customers WHERE ID=$customer AND ClientID=$clientID");
		
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

	catch(PDOException $e) {
				
		$message = "<div class='alert alert-danger' role='alert'>There was an issue when selecting this customer. Please try again.</div>";

		$_SESSION['formResp'] = $message;
		echo "Error: " . $e->getMessage();
	}

	$conn = null;

?>