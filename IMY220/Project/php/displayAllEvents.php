<?php
    //errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    require "master.php";

    //print everything in localEvents table
    $sql = "SELECT * FROM localevents ORDER BY date DESC";
    $res = mysqli_query($mysqli, $sql);
    while($row = mysqli_fetch_array($res))
	{
        $sql2 = "SELECT * FROM users WHERE id = '$row[user_id]'";
        $res2 = mysqli_query($mysqli, $sql2);
        $row2 = mysqli_fetch_array($res2);
		echo 	"<div class='card' id='eventCard'>
                    <h3 class='card-header'>
                    <a href='selectedUser.php?userID=" . $row["user_id"] . "&currentPage=global.php'>
                        <button id='whichUserId'><i class='fa-solid fa-user'></i>" . $row2['name'] . "</button>
                    </a>"

                     . $row['name'] . " - " 
                     . "<small>" . $row['date'] . "</small>
                     </h3>
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