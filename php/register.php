<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		try {

			$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$username = $_POST['username'];
			$pass = $_POST['password'];

			$username = stripslashes($username);
			$pass = stripslashes($pass);
			
			/*
			Add encryption to the password for storing in the database
			*/
			$encoded_password = base64_encode($pass);
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			
			/*
			Add a new user to the users table in the database
			*/
			$stmt = $conn -> prepare("INSERT INTO Evergreen_users (Username, Password) VALUES (?,?)");

			$stmt -> execute(array(
				$username, $hash
			));

			/*
			If stmt is successful, redirect the user to the login page, otherwise stay on the register page
			*/
			if($stmt -> rowCount() > 0){
				header("Location: index.php");
			} else {
				header("Location: register.php");
			}

		}

		catch(PDOException $e) {

			echo "Error: " . $e->getMessage();

		}

		$conn = null;

	}

?>