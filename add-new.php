<!doctype html>
<html>
<head>
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	
<title>Evergreen Technical Task - Add new customer</title>
	
<link rel="icon" type="image/png" href="">
<link rel="stylesheet" href="css/main.css">	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
</head>

<body>
	
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#evergreenNavbar" aria-controls="evergreenNavbar" aria-expanded="false" aria-label="Toggle Navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="evergreenNavbar">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
					<li class="nav-item">
						<a class="nav-link" href="customers.php">Customers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="add-new.php">Add new</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-new.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="eg-container">
		<form method="post">
			
			<div class="row">
				<div class="col-sm-12">
					<label>Company name</label>
					<input class="form-control" name="company" />
				</div>
			</div>
			
			<div class="row">
				<label>Name</label>
				<div class="col-sm-6">
					<input class="form-control" name="firstName" />
					<div class="form-text">First name</div>
				</div>
				<div class="col-sm-6">
					<input class="form-control" name="lastName" />
					<div class="form-text">Last name</div>
				</div>
			</div>
			
			<div class="row">
				<label>Phone number</label>
				<div class="col-sm-12">
					<input class="form-control" name="phone" />
				</div>
			</div>
			
			<div class="row">
				<label>Address</label>
				<div class="col-sm-6">
					<input class="form-control" name="addressOne" />
					<div class="form-text">Address line one</div>
				</div>
				<div class="col-sm-6">
					<input class="form-control" name="addressTwo" />
					<div class="form-text">Address line two (optional)</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<label>City/Town</label>
					<input class="form-control" name="city" />
				</div>
				<div class="col-sm-6">
					<label>Postcode</label>
					<input class="form-control" name="postcode" />
				</div>
			</div>
			
<!--
			<input class="form-control" name="company" />
			<input class="form-control" name="firstName" />
			<input class="form-control" name="lastName" />
			<input class="form-control" name="phone" />
			<input class="form-control" name="addressOne" />
			<input class="form-control" name="addressTwo" />
			<input class="form-control" name="city" />
			<input class="form-control" name="postcode" />
-->
			<button type="submit" class="btn btn-primary btn-block mt-4" name="addNewClient">Submit new client</button>
		</form>
	</div>
	
</body>
</html>