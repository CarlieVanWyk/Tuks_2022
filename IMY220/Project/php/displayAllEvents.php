<?php
    //errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //connect
    $mysqli = mysqli_connect("localhost", "root", "", "imy220project");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    //print everything in localEvents table
    $sql = "SELECT * FROM localevents ORDER BY date DESC";
    $res = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($res))
	{
		echo 	"<div class='card' id='eventCard'>
                    <h3 class='card-header'>" . $row['name'] . " - " . "<small>" . $row['date'] . "</small></h3>
                    <a href='selectedEvent.php?eventID=" . $row["localEvent_id"] . "&currentPage=global.php'>
                        <img class='card-img-top' src='../gallery/" . $row['image_name'] . "' alt='Card image cap'>
                    </a>
                    <div class='card-body'>";
                 require "friendsAttendingBtn.php";
                 require "attendBtn.php";
        echo    "   </div>
                </div>
                ";
	}

?>