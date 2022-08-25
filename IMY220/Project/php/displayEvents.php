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


    // bit unsure how to display this in home.php after event is created
	$query = "SELECT * FROM localevents WHERE user_id = '$userID' ORDER BY date DESC";
	$res = $mysqli->query($query);
	// $row = mysqli_fetch_array($res);

	
	while($row = mysqli_fetch_array($res))
	{
		echo 	"
                        <div class='card' id='eventCard'>
                            <h3 class='card-header'>" . $row['name'] . " - " . "<small>" . $row['date'] . "</small></h3>
                <a href='selectedEvent.php?eventID=" . $row["localEvent_id"] . "'>
                            <img class='card-img-top' src='../gallery/" . $row['image_name'] . "' alt='Card image cap'>
                </a>
                            <div class='card-body'>";
        echo                    require "deleteBtn.php";  
        echo                    require "editBtn.php";
        echo                    require "addToListBtn.php";
        echo				"</div>
                        </div>
                ";
	}
?>