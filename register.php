<?php

	session_start();

    require_once "php/config.php";
	require_once "php/register.php";

?>

<!doctype html>
<html>
<head>
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	
<title>Evergreen Technical Task - Register</title>
	
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
		<h1>Register</h1>
		<form method="post" class="login-form">
			<label>Name</label>
			<input class="form-control eg-input" type="text" name="name" required />
			<label>Email or username</label>
			<input class="form-control eg-input" type="text" name="username" required />
			<label>Password</label>
			<input class="form-control eg-input" type="password" name="password" required />
			<button type="submit" class="btn btn-primary btn-block mt-4" name="registerSubmit">Submit</button>
		</form>
	</div>
	<?php echo $message; ?>
	
</body>
</html>