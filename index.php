<?php

	session_start();

    require_once "php/config.php";

	$message = "";

	if(isset($_SESSION['error'])){
		$message = $_SESSION['error'];
		unset($_SESSION['error']);
	}

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

//				if (password_verify($pass, $row['Password'])){
				if($pass == $row['Password']){

					$_SESSION['evergreenLogin'] = $row['ID'];
					header("Location: customers.php");

				} else {
					
					$message = "Password Incorrect";
					$_SESSION['error'] = $message;

				}

			} else {

//				$message = "Please ensure the username and password you used are correct and try again.";
				$message = "<div class='alert alert-danger' role='alert'>Please ensure the username and password you used are correct and try again.</div>";
				$_SESSION['error'] = $message;

			}

		}

		catch(PDOException $e) {

			echo "Error: " . $e->getMessage();

		}

		$conn = null;

	}

?>

<!doctype html>
<html>
<head>
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	
<title>Evergreen Technical Task - Login</title>
	
<link rel="icon" type="image/png" href="">
<link rel="stylesheet" href="css/main.css">	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
</head>

<body id="loginPage">
	
	<div class="eg-box">
		<h1>Sign in</h1>
		<form method="post" class="login-form">
			<label>Email or username</label>
			<input class="form-control eg-input" type="text" name="username" />
			<label>Password</label>
			<input class="form-control eg-input" type="password" name="password" />
			<button type="submit" class="btn btn-primary btn-block mt-4" name="loginSubmit">Submit</button>
		</form>
	</div>
	<?php echo $message; ?>
	
</body>
</html>