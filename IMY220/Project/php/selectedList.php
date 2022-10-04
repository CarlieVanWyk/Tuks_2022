<?php
    $listID = $_GET["listID"];
    $currentPage = $_GET["currentPage"];

    // Create connection
	// $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
	// if ($mysqli->connect_error) {
	//     die("Connection failed: " . $mysqli->connect_error);
	// }
	require "master.php";

	$sql = "SELECT * FROM lists WHERE list_id = $listID";
	$res = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($res);

    require "listPage.php";
?>