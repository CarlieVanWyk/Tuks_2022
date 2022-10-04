<?php

    session_start();

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    // if ($mysqli->connect_error) {
    //     die("Connection failed: " . $mysqli->connect_error);
    // }
    require "master.php";
    
    //add list name, list description and user_id to database
    if(isset($_POST['listName']) && isset($_POST['listDesc'])){
        $listName = $_POST["listName"];
        $listDesc = $_POST["listDesc"];
        $userID = $_POST["id"];
        
        $queryCheck = "SELECT * FROM lists WHERE name = '$listName' AND user_id = '$userID'";
        $resCheck = mysqli_query($mysqli, $queryCheck);
        $numRows = mysqli_num_rows($resCheck);
        if($numRows == 0) {
            $q = "INSERT INTO lists (user_id, name, description) 
                    VALUES ('$userID', '$listName', '$listDesc')";
        
            echo $q;
            $res = mysqli_query($mysqli, $q);

        } else {
            echo "List already exists";
        }
    }

    //check if event added to database
    $query3 = "SELECT * FROM lists WHERE name = '$listName' AND user_id = '$userID'";
    $res3 = mysqli_query($mysqli, $query3);
    if(mysqli_num_rows($res3) > 0)
    {
        header('Location: lists.php');
    }
    else
    {
        echo '<h1>list creation unsuccessful!</h1>
        <p> <a href="home.php">Retry</a></p>';
    }



    
?>