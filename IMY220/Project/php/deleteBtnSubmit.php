<?php
    session_start();
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $eventID = $_POST["eventId"];
    $userID = $_SESSION["id"];

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    require "master.php";

    $query = "DELETE FROM localevents WHERE localEvent_id = '$eventID' AND user_id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    $query2 = "DELETE FROM listevents WHERE event_id = '$eventID'";
    $res2 = mysqli_query($mysqli, $query2);
    $query3 = "DELETE FROM attend WHERE event_id = '$eventID' AND user_id = '$userID'";
    $res3 = mysqli_query($mysqli, $query3);
    if($res && $res2) {
        header('Location: home.php');
        echo "Event deleted";
    }else{
        echo "Error deleting event";
    }

?>