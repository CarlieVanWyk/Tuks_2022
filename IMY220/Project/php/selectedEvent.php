<?php
    $eventId = $_GET["eventID"];

    // Create connection
	$mysqli = mysqli_connect("localhost", "root", "", "imy220project");
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	}

	$sql = "SELECT * FROM localevents WHERE localEvent_id = $eventId";
	$res = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($res);

    require "eventPage.php";
?>