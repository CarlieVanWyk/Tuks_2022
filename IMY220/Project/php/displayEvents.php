<?php
    // session_start();
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null;  


	$query = "SELECT * FROM localevents WHERE user_id = '$userID' ORDER BY date DESC";
	$res = $mysqli->query($query);
	// $row = mysqli_fetch_array($res);

	
	while($row = mysqli_fetch_array($res))
	{
        $testEvent_id = $row['localEvent_id'];
		echo 	"<div class='card' id='eventCard'>
                    <h3 class='card-header'>" . $row['name'] . " - " . "<small>" . $row['date'] . "</small></h3>
                <a href='selectedEvent.php?eventID=" . $row["localEvent_id"] . "&currentPage=home.php'>
                    <img class='card-img-top' src='../gallery/" . $row['image_name'] . "' alt='Card image cap'>
                </a>
                <div class='card-body'>";
        // echo     $row["localEvent_id"];
        // echo     $testEvent_id;
                 require "deleteBtn.php"; 
                 require "editBtn.php";
                 require "addToListBtn.php";
                 require "friendsAttendingBtn.php";
                 require "attendBtn.php";
        echo    "</div>
                </div>
                ";
	}
?>