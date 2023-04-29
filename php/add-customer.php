<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if (isset($_POST['newCustomer'])) {
		
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

				$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$company = $_POST['company'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$phone = $_POST['phone'];
				$addressOne = $_POST['addressOne'];
				$addressTwo = $_POST['addressTwo'];
				$city = $_POST['city'];
				$postcode = $_POST['postcode'];
				
				$stmt = $conn -> prepare("INSERT INTO Customers (Company, FirstName, LastName, Phone, AddressOne, AddressTwo, City, Postcode) VALUES (?,?,?,?,?,?,?,?)");
				
				$stmt -> execute(array(
					$company, $firstName, $lastName, $phone, $addressOne, $addressTwo, $city, $postcode
				));
				
				if($stmt -> rowCount() > 0){
					$message = "Success";
				} else {
					$message = "Fail";
				}
				
			}
			
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$conn = null;
			
		}
		
	}

?>