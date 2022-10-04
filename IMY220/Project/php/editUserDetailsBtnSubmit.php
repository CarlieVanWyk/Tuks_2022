<?php
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $userID = $_POST["userID"];

    require "master.php";

    $query = "SELECT * FROM profileuserdetails WHERE user_id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($res);

    $orgName = $row["name_surname"];
    $orgImage_name = $row["profile_img"];
    $orgJob = $row["job"];
    $orgQuote = $row["quote"];
    $orgBDay = $row["bday"];

    if($_POST["userProfileName"] == "") {
        $newName = $orgName;
    }
    else {
        $newName = $_POST["userProfileName"];
    }
    if($_POST["userProfileJob"] == "") {
        $newJob = $orgJob;
    }
    else {
        $newJob = $_POST["userProfileJob"];
    }
    if($_POST["userProfileQuote"] == "") {
        $newQuote = $orgQuote;
    }
    else {
        $newQuote = $_POST["userProfileQuote"];
    }
    if($_POST["userProfileBday"] == "") {
        $newBDay = $orgBDay;
    }
    else {
        $newBDay = $_POST["userProfileBday"];
    }

    
    if($_FILES["profilePicToUpload"]["name"] == "") {
        $newImage_name = $orgImage_name;
    }
    else {
        $uploadFile = $_FILES["profilePicToUpload"];
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

    $query1 = "UPDATE profileuserdetails SET profile_img = '$newImage_name', name_surname = '$newName',  job = '$newJob', quote = '$newQuote', bday = '$newBDay' WHERE user_id = '$userID'";
    $res1 = mysqli_query($mysqli, $query1);
    if($res1){
        header('Location: profilePage.php');
        echo "event edited";
    }else{
        echo "Error editing event";
    }



?>