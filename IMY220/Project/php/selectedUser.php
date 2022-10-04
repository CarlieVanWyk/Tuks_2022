<?php
	// session_start();
    $userId = $_GET["userID"];
    $currentPage = $_GET["currentPage"];

	require "master.php";

    $sql = "SELECT * FROM users WHERE id = $userId";
    $res = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($res);

    $emailOfSelectedUser = $row["email"];
    $passOfSelectedUser = $row["password"];

    require "selectedProfilePage.php";

?>