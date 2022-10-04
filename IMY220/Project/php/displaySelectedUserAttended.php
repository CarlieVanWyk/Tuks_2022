<?php

    require "master.php";

    // $emailOfSelectedUser = $_SESSION["email"];
    // $pass = $_SESSION["pass"];

    // echo $emailOfSelectedUser;
    // echo $passOfSelectedUser;

    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$emailOfSelectedUser' AND password = '$passOfSelectedUser'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null;  
    // echo $userID;

    $query1 = "SELECT * FROM attend WHERE user_id = '$userID'";
    $res1 = $mysqli->query($query1);
    // $row1 = mysqli_fetch_array($res1);

    // $query2 = "SELECT * FROM localevents WHERE user_id = '$userID'";
    // $res2 = $mysqli->query($query2);

    $numOfAttended = "SELECT COUNT(user_id) FROM attend WHERE user_id = '$userID'";

    $numOfAttended = $mysqli->query($numOfAttended);
    $numOfAttended = mysqli_fetch_array($numOfAttended);
    $numOfAttended = isset($numOfAttended["COUNT(user_id)"]) ? $numOfAttended["COUNT(user_id)"] : null;

    // <i class='fa-solid fa-calendar-days fa-3x'></i>
    echo "
    <p>Attended</p>
    
    <button id='editUserAttendedBTNid' type='button' class='btn' data-toggle='modal' 
                data-target='#editUserAttendedBTN" . $userID . "' data-whatever='@mdo'>
                <i class='fa-solid fa-circle-check fa-3x'></i> 
        </button>
        <div class='modal fade' id='editUserAttendedBTN" . $userID . "' tabindex='-1' role='dialog' 
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                <button class='' data-dismiss='modal'>
                    <i class='fa-solid fa-xmark fa-2x'></i>
                </button>
                <h2 class='modal-title' id='exampleModalLabel'>Your Attended Events</h2>
                </div>
                <div class='modal-body'>";

    while($row1 = mysqli_fetch_array($res1)) {
        $eventID = $row1['event_id'];
        $query2 = "SELECT * FROM localevents WHERE localEvent_id = '$eventID'";
        $res2 = $mysqli->query($query2);
        $row2 = mysqli_fetch_array($res2);

        echo "
        <div class='card'>
            <a href='selectedEvent.php?eventID=" . $row1["event_id"] . "&currentPage=profilePage.php'>
                <div class='card-body text-center'>"
                    . $row2['name'] . " - " . "<small>" . $row2['date'] . "</small>" .
                "</div>
            </a>
        </div>";
    }

    echo          
            "</div>
        </div>
        </div>
    </div>";

    echo "<p>". $numOfAttended ."</p>";

?>


<script src="../scriptFiles/displayUserCreated.js"></script>