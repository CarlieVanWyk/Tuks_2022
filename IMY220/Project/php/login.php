<?php

    session_start();

    // See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    require "master.php";

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $res = mysqli_query($mysqli, $query);
    $resp = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0)
    {
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $pass;
        $_SESSION["name"] = $resp["name"];
        $_SESSION["id"] = $resp["id"];
        header('Location: home.php');
    }
    else
    {
        header('Location: ../index.html');
        echo '<h1>Login unsuccessful!</h1>
        <p> <a href="../index.html">Retry</a></p>';
    }

    $_SESSION["email"] = $email;
    $_SESSION["pass"] = $pass;
?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>IMY 220 - Project Login result page</title>
	<meta charset="utf-8" />	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">	
</head>
<body>
	<div class="container">
		<?php 
			// if($res) {
            //     // header('Location: home.php');
            //     echo "email: " . $_SESSION["email"];
            //     echo "pass: " . $pass;
            //     echo '<h1>Login successful!</h1>
            //     <p>You can now <a href="home.php">go to the home page</a>.</p>';
            // } 
  			// else
            //     // header('Location: ../index.html');
  			// 	echo '<div class="alert alert-danger mt-3" role="alert">
  			// 			The account could not be created
  			// 		</div>';
		?>
	</div>
</body>
</html> -->