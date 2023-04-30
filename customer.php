<?php 

	session_start();

	if(isset($_SESSION['evergreenLogin'])){
	} else {
		header("Location: index.php");
	}

	require "php/config.php";
	require "php/getCustomer.php";
?>

<!doctype html>
<html>
<head>
	
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	
<title>Evergreen Technical Task - <?php echo $firstName . " " . $lastName; ?></title>
	
<link rel="icon" type="image/png" href="">
<link rel="stylesheet" href="css/main.css">	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZixzJrJckp5miYiobNFFVwfZ-U9KqpWM"></script>
	
<script>

	$(document).ready(function(){
		var map; 
		var geocoder;

		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 0, lng: 0},
			zoom: 13,
			disableDefaultUI: true
		});
		
		geocoder = new google.maps.Geocoder();
	
		geocoder.geocode({'address': '<?php echo $postcode; ?>'}, function(results, status){
			if(status == "OK"){
				map.setCenter(results[0].geometry.location);
				var autoMarker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			}
		});
		
	});
	
</script>
	
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
		<div class="row align-items-center">
			<div class="col-md-6">
				<p class="fw-bold">Name:</p>
				<p><?php echo $firstName . " " . $lastName; ?></p>
				
				<p class="fw-bold">Company:</p>
				<p><?php echo $company; ?></p>
				
				<p class="fw-bold">Phone Number:</p>
				<p><?php echo $phone; ?></p>
				
				<p class="fw-bold">Address:</p>
				<p><?php echo $addressOne . ", <br>" . $addressTwo . ", <br>" . $city . ", <br>" . $postcode; ?></p>
			</div>
			<div class="col-md-6">
				<div id="map">
				
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>