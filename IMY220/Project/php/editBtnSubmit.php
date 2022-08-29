<?php
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $eventID = $_POST["eventId"];

    $mysqli = mysqli_connect("localhost", "root", "", "IMY220project");

    //update event if post values are set
    $name = $_POST["eventName"];
    $date = $_POST["eventDate"];
    $image = $_POST["picToUpload"];
    $description = $_POST["eventDesc"];
    $location = $_POST["eventLoc"];
    $hash = $_POST["eventHash"];

    if(isset($name)) {
        $sql = "UPDATE localevents SET name = '$name' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else if(isset($date)) {
        $sql = "UPDATE localevents SET date = '$date' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else if(isset($image)) {
        $sql = "UPDATE localevents SET image_name = '$image' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else if(isset($description)) {
        $sql = "UPDATE localevents SET description = '$description' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else if(isset($location)) {
        $sql = "UPDATE localevents SET location = '$location' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else if(isset($hash)) {
        $sql = "UPDATE localevents SET hashtags = '$hash' WHERE localEvent_id = $eventID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: home.php');
            echo "Event edited";
        }else{
            echo "Error editing event";
        }
    }

    else {
        //do nothing;
    }



?>