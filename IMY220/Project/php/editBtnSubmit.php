<?php
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $eventID = $_POST["eventId"];

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    require "master.php";

    $query = "SELECT * FROM localevents WHERE localEvent_id = '$eventID'";
    $res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($res);

    $orgName = $row["name"];
    $orgDescription = $row["description"];
    $orgDate = $row["date"];
    $orgLocation = $row["location"];
    $orgHashTags = $row["hashtags"];
    $orgImage_name = $row["image_name"];

    if($_POST["eventName"] == "") {
        $newName = $orgName;
    }
    else {
        $newName = $_POST["eventName"];
    }
    if($_POST["eventDesc"] == "") {
        $newDescription = $orgDescription;
    }
    else {
        $newDescription = $_POST["eventDesc"];
    }
    if($_POST["eventDate"] == "") {
        $newDate = $orgDate;
    }
    else {
        $newDate = $_POST["eventDate"];
    }
    if($_POST["eventLoc"] == "") {
        $newLocation = $orgLocation;
    }
    else {
        $newLocation = $_POST["eventLoc"];
    }
    if($_POST["eventHash"] == "") {
        $newHashTags = $orgHashTags;
    }
    else {
        $newHashTags = $_POST["eventHash"];
    }
    if($_FILES["picToUpload"]["name"] == "") {
        $newImage_name = $orgImage_name;
    }
    else {
        $uploadFile = $_FILES["picToUpload"];
        if(($uploadFile["type"] == "image/png" 
        || $uploadFile["type"] == "image/jpeg"
        || $uploadFile["type"] == "image/jpg") 
        && $uploadFile["size"] < 1000000)
        {
            if($uploadFile["error"] > 0){
                echo "Error: " . $uploadFile["error"] . "<br/>";
            } else {
                if(file_exists("../gallery/" . $uploadFile["name"])){
                    echo $uploadFile["name"] . " already exists.";
                } else {
                    move_uploaded_file($uploadFile["tmp_name"], "../gallery/" . $uploadFile["name"]);
                    echo "Stored in: " . "../gallery/" . $uploadFile["name"];
                }
            }
            } else {
            echo "Invalid file";
        }
        $newImage_name = $uploadFile["name"];
    }

    $sql = "UPDATE localevents SET name = '$newName', description = '$newDescription', date = '$newDate', location = '$newLocation', hashtags = '$newHashTags', image_name = '$newImage_name' WHERE localEvent_id = $eventID";
    $res = mysqli_query($mysqli, $sql);
    if($res){
        header('Location: home.php');
        echo "event edited";
    }else{
        echo "Error editing event";
    }



?>