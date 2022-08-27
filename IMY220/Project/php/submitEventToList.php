<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $listID = $_POST["listID"];
    $eventID = $_SESSION["localEvent_id"];

    $mysqli = mysqli_connect("localhost", "root", "", "IMY220project");

    $query = "INSERT INTO listevents (list_id, event_id) VALUES ('$listID', '$eventID')";   
    $res = mysqli_query($mysqli, $query);
    if($res){
        header('Location: home.php');
        echo "Event added to list";
    }else{
        echo "Error adding event to list";
    }

?>