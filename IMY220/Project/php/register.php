<?php
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

	
	// $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    $mysqli = mysqli_connect("localhost", "root", "", "IMY220project");

	$name = $_POST["fname"];
	$surname = $_POST["lname"];
	$email = $_POST["email1"];
	$date = $_POST["date"];
	$pass = $_POST["pass1"];

	$query = "INSERT INTO users (name, surname, email, birthday, password) VALUES ('$name', '$surname', '$email', '$date', '$pass');";

	$res = mysqli_query($mysqli, $query) == TRUE;
?>

<!DOCTYPE html>
<html>
<head>
	<title>IMY 220 - Project Register result page</title>
	<meta charset="utf-8" />	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">	
</head>
<body>
	<div class="container">
		<?php 
			if($res)
                echo '<h1>Registration successful!</h1>
                <p>You can now <a href="home.php">go to the home page</a>.</p>';
  			else
  				echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  					</div>';
		?>
	</div>
</body>
</html>