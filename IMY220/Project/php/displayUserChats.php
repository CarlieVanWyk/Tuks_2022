<?php
    require "master.php";
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

    $query1 = "SELECT * FROM friends WHERE user_id = '$userID'";
    $res1 = $mysqli->query($query1);

    echo "<h2>Chats</h2>
            <ul>";

    while($row1 = mysqli_fetch_array($res1)) {
        $friendID = $row1["friend_id"];

        $query2 = "SELECT * FROM profileuserdetails WHERE user_id = '$friendID'";
        $res2 = mysqli_query($mysqli, $query2);
        $row2 = mysqli_fetch_array($res2);
        echo "<li>
                <img class='userPfpSmall' src='../gallery/". $row2["profile_img"] ."' alt='user' />"
                . $row2['name_surname'] .
                "<div>";
                require "chatBTN.php";
        echo    "</div>
            </li>";
    }

    echo   "</ul>";
?>