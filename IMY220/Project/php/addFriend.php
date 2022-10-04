<?php
    require "master.php";
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $userID = $_GET["userID"];
    $friendID = $_GET["friendID"];

    $query = "INSERT INTO friends (user_id, friend_id) VALUES ('$userID', '$friendID')";
    $res = mysqli_query($mysqli, $query);

    if($res)
    {
        header('Location: global.php');
    }
    else
    {
        echo "Error adding friend";
    }
?>