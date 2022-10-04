<?php
    require "master.php";
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $userID = $_GET["userID"];
    $friendID = $_GET["friendID"];

    $query = "DELETE FROM friends WHERE user_id = '$userID' AND friend_id = '$friendID'";
    $res = mysqli_query($mysqli, $query);

    if($res)
    {
        header('Location: global.php');
    }
    else
    {
        echo "Error removing friend";
    }
    
?>