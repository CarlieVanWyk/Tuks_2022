<?php

    require "master.php";
    // session_start();
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // echo $email;
    // echo $pass;

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null;  
    // echo $userID;

    $query1 = "SELECT * FROM localevents WHERE user_id = '$userID'";
    $res1 = $mysqli->query($query1);
    // $row1 = mysqli_fetch_array($res1);

    $numOfCreated = "SELECT COUNT(user_id) FROM localevents WHERE user_id = '$userID'";

    $numOfCreated = $mysqli->query($numOfCreated);
    $numOfCreated = mysqli_fetch_array($numOfCreated);
    $numOfCreated = isset($numOfCreated["COUNT(user_id)"]) ? $numOfCreated["COUNT(user_id)"] : null;

    // <i class='fa-solid fa-calendar-days fa-3x'></i>
    echo "
    <p>Created</p>
    
    <button id='editUserCreatedBTNid' type='button' class='btn' data-toggle='modal' 
                data-target='#editUserCreatedBTN" . $userID . "' data-whatever='@mdo'>
                <i class='fa-solid fa-calendar-days fa-3x'></i> 
        </button>
        <div class='modal fade' id='editUserCreatedBTN" . $userID . "' tabindex='-1' role='dialog' 
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                <button class='' data-dismiss='modal'>
                    <i class='fa-solid fa-xmark fa-2x'></i>
                </button>
                <h2 class='modal-title' id='exampleModalLabel'>Your Created Events</h2>
                </div>
                <div class='modal-body'>";

    while($row1 = mysqli_fetch_array($res1)) {
        echo "
        <div class='card'>
            <a href='selectedEvent.php?eventID=" . $row1["localEvent_id"] . "&currentPage=profilePage.php'>
                <div class='card-body text-center'>"
                    . $row1['name'] . " - " . "<small>" . $row1['date'] . "</small>" .
                "</div>
            </a>
        </div>";
    }

    echo          
            "</div>
        </div>
        </div>
    </div>";

    echo "<p>". $numOfCreated ."</p>";

?>


<script src="../scriptFiles/displayUserCreated.js"></script>