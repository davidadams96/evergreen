<?php 

	session_start();

	/*
	If the user has not logged in, redirect them back to the login page
	*/

	if(isset($_SESSION['evergreenLogin'])){
	} else {
		header("Location: index.php");
	}

	require "php/config.php";
	require "php/getAllCustomers.php";
?>

<!doctype html>
<html>
<head>
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	
<title>Evergreen Technical Task - Customers</title>
	
<link rel="icon" type="image/png" href="">
<link rel="stylesheet" href="css/main.css">	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
	
<script src="js/customers.js"></script>
	
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
						<a class="nav-link active" href="customers.php">Customers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-new.php">Add new</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="php/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="eg-container">
		
		<table id="customersTable" class="w-100">
			<thead>
				<tr>
					<th>Name</th>
					<th>Company</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<!--Run a foreach statement for each customer stored in the array and display in the table-->
				<?php foreach ($customerArray as $customer): ?>
				<tr class="customer-item">
					<td><?php echo $customer['FirstName'] . " " . $customer['LastName']; ?></td>
					<td><?php echo $customer['Company']; ?></td>
					<td><a href="customer.php?customer=<?php echo $customer['ID'];?>" class="btn btn-primary btn-block">More details</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
	
</body>
</html>