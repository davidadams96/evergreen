<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		try {

			$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);

			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$username = $_POST['username'];
			$pass = $_POST['password'];

			$username = stripslashes($username);
			$pass = stripslashes($pass);

			$stmt = $conn -> prepare("SELECT * FROM Evergreen_users WHERE Username='$username'");

			$stmt -> execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() == 1) {

				if (password_verify($pass, $row['Password'])){

					$_SESSION['evergreenLogin'] = $row['ID'];
					header("Location: customers.php");

				} else {
					
					$message = "<div class='alert alert-danger' role='alert'>The password that you entered is incorrect.</div>";
					$_SESSION['error'] = $message;
					header("Location: index.php");

				}

			} else {

				$message = "<div class='alert alert-danger' role='alert'>Please ensure the username and password you used are correct and try again.</div>";
				$_SESSION['error'] = $message;
				header("Location: index.php");

			}

		}

		catch(PDOException $e) {

			echo "Error: " . $e->getMessage();

		}

		$conn = null;

	}

?>