<?php

    require "master.php";

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$emailOfSelectedUser' AND password = '$passOfSelectedUser'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null;  
    // echo $userID;

    $query1 = "SELECT * FROM friends WHERE user_id = '$userID'";
    $res1 = $mysqli->query($query1);
    // $row1 = mysqli_fetch_array($res1);

    $numOfFriends = "SELECT COUNT(user_id) FROM friends WHERE user_id = '$userID'";

    $numOfFriends = $mysqli->query($numOfFriends);
    $numOfFriends = mysqli_fetch_array($numOfFriends);
    $numOfFriends = isset($numOfFriends["COUNT(user_id)"]) ? $numOfFriends["COUNT(user_id)"] : null;

    // <i class='fa-solid fa-calendar-days fa-3x'></i>
    echo "
    <p>Friends</p>
    
    <button id='editUserFriendsBTNid' type='button' class='btn' data-toggle='modal' 
                data-target='#editUserFriendsBTN" . $userID . "' data-whatever='@mdo'>
                <i class='fa-solid fa-user-group fa-3x'></i> 
        </button>
        <div class='modal fade' id='editUserFriendsBTN" . $userID . "' tabindex='-1' role='dialog' 
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                <button class='' data-dismiss='modal'>
                    <i class='fa-solid fa-xmark fa-2x'></i>
                </button>
                <h2 class='modal-title' id='exampleModalLabel'>Your Friends</h2>
                </div>
                <div class='modal-body'>";

    while($row1 = mysqli_fetch_array($res1)) {
        $query2 = "SELECT * FROM users WHERE id = '$row1[friend_id]'";
        $res2 = $mysqli->query($query2);
        $row2 = mysqli_fetch_array($res2);

        echo "
        <div class='card'>
            <a href='selectedUser.php?userID=" . $row1["friend_id"] . "&currentPage=profilePage.php'>
                <div class='card-body text-center'>"
                    . $row2["name"] .
                "</div>
            </a>
        </div>";
    }

    echo          
            "</div>
        </div>
        </div>
    </div>";

    echo "<p>". $numOfFriends ."</p>";

?>


<script src="../scriptFiles/displayUserCreated.js"></script>