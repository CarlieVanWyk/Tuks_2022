<?php
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
	require "master.php";

	$name = $_POST["fname"];
	$surname = $_POST["lname"];
	$email = $_POST["email1"];
	$date = $_POST["date"];
	$pass = $_POST["pass1"];

	$query = "INSERT INTO users (name, surname, email, birthday, password) VALUES ('$name', '$surname', '$email', '$date', '$pass');";
	// echo $query;
	$res = mysqli_query($mysqli, $query) == TRUE;

	$query1 = "INSERT INTO profileuserdetails (user_id, profile_img, name_surname, job, quote, bday) 
	VALUES ((SELECT id FROM users WHERE email = '$email'), 'defaultProfileImg.png', 'name surname', 'job', 'quote', '11 Jan 2022');";
	$res1 = mysqli_query($mysqli, $query1) == TRUE;
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
			if($res) {
				header('Location: ../index.html');
                // echo '<h1>Registration successful!</h1>
                // <p>You can now <a href="home.php">go to the home page</a>.</p>';
			}
  			else{
  				echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  					</div>';
			}
		?>
	</div>
</body>
</html>