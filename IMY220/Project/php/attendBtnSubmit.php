<?php
    session_start();

    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $eventID = $_POST["eventId"];
    $userID = $_SESSION["id"];

    // echo $eventID;
    // echo $userID;

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    require "master.php";

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

    if(isset($_POST['eventDesc']) && $uploadFile != "null"){
        
        //upload event details to database attend
        $eventDescription = $_POST["eventDesc"];
        $imgName = isset($uploadFile["name"]) ? $uploadFile["name"] : null;
        $eventRating = $_POST["eventRating"];
        

        $queryCheck = "SELECT * FROM attend WHERE description = '$eventDescription' AND user_id = '$userID' AND event_id = '$eventID'";
        $resCheck = mysqli_query($mysqli, $queryCheck);
        $numRows = mysqli_num_rows($resCheck);
        if($numRows == 0) {
            $query = "INSERT INTO attend (user_id, event_id, image_name, description, rating) VALUES ('$userID', '$eventID', '$imgName', '$eventDescription', '$eventRating')";
            $res = mysqli_query($mysqli, $query) == TRUE;
        } else {
            echo "Event already exists";
        }
    }

    //check if event added to database
    $query = "SELECT * FROM attend WHERE description = '$eventDescription' AND user_id = '$userID' AND event_id = '$eventID'";
    $res = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($res) > 0)
    {
        header('Location: home.php');
    }
    else
    {
        echo '<h1>event creation unsuccessful!</h1>
        <p> <a href="home.php">Retry</a></p>';
    }



?>