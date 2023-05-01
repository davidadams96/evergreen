<?php

	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if (isset($_POST['addCustomer'])) {
		
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

				$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$company = $_POST['company'];
				$clientID = $_SESSION['evergreenLogin'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$phone = $_POST['phone'];
				$addressOne = $_POST['addressOne'];
				$addressTwo = $_POST['addressTwo'];
				$city = $_POST['city'];
				$postcode = $_POST['postcode'];
				
				if(!empty($company) && !empty($firstName) && !empty($lastName) && !empty($phone) && !empty($addressOne) && !empty($city) && !empty($postcode)){
				
					$stmt = $conn -> prepare("INSERT INTO Customers (ClientID, Company, FirstName, LastName, Phone, AddressOne, AddressTwo, City, Postcode) VALUES (?,?,?,?,?,?,?,?,?)");

					$stmt -> execute(array(
						$clientID, $company, $firstName, $lastName, $phone, $addressOne, $addressTwo, $city, $postcode
					));

					if($stmt -> rowCount() > 0){
						
						$message = "<div class='alert alert-success' role='alert'>Successfully added a new customer.</div>";
						
						$_SESSION['formResp'] = $message;
						header("Location: add-new.php");
					} else {
						
						$message = "<div class='alert alert-danger' role='alert'>There was an issue when adding this customer. Please try again.</div>";
						
						$_SESSION['formResp'] = $message;
						header("Location: add-new.php");
					}
					
				} else {
					
					$message = "<div class='alert alert-danger' role='alert'>Please fill in all required fields.</div>";
					
					$_SESSION['formResp'] = $message;
					header("Location: add-new.php");
				}
				
			}
			
			catch(PDOException $e) {
				
				$message = "<div class='alert alert-danger' role='alert'>There was an issue when adding this customer. Please try again.</div>";
				
				$_SESSION['formResp'] = $message;
				echo "Error: " . $e->getMessage();
			}

			$conn = null;
			
		}
		
	}

?>