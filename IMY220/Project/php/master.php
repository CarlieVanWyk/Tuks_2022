<?php
    // Create connection
	// $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
	// if ($mysqli->connect_error) {
	//     die("Connection failed: " . $mysqli->connect_error);
	// }

    $mysqli = mysqli_connect("localhost", "root", "", "imy220project");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
?>