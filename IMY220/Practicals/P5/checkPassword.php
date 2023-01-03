<?php  
	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);
	
	$email = $_POST["email"];
	$pass = $_POST["pass"];

	$users = [["email" => "mordechai@gmail.com", "password" => "asdf"], ["email" => "rigby@hotmail.com", "password" => "1234"]];

	$emailExists = false;
	foreach ($users as $user ) {
		if($user["email"] == $email && $user["password"] == $pass){
			die("Valid");
		} else if ($user["email"] == $email ){
			$emailExists = true;
		}
	}	
	if($emailExists)
		die("Password incorrect");
	else
		die("No user with that email address");

	// Normally this would include connecting to the database and checking password there
?>