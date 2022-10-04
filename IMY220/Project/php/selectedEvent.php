<?php
	session_start();
    $eventId = $_GET["eventID"];
    $currentPage = $_GET["currentPage"];
	$userID = $_SESSION["id"];

	require "master.php";

	$sql = "SELECT * FROM localevents WHERE localEvent_id = $eventId";
	$res = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($res);

	$sql2 = "SELECT * FROM attend WHERE user_id = $userID AND event_id = $eventId";
	$res2 = mysqli_query($mysqli, $sql2);
	$row2 = mysqli_fetch_array($res2);

    require "eventPage.php";
?>