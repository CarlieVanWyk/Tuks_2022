<?php
    session_start();

	// See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

	// $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    //     if ($mysqli->connect_error) {
    //         die("Connection failed: " . $mysqli->connect_error);
    //     } 
    require "master.php";

    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];
    echo "email: ". $_SESSION["email"] . "<br/>";
    echo "pass: " . $_SESSION["pass"]  . "<br/>";

	//check and upload image
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

	$userID = "SELECT * FROM users WHERE email = '$email'";
    echo "userID: " . $userID . "<br/>";
	$userID = mysqli_query($mysqli, $userID);
	$userID = mysqli_fetch_array($userID);
	$userID = isset($userID["id"]) ? $userID["id"] : null;

	if(isset($_POST['eventName']) && $uploadFile != "null"){
        
        //upload event details to database localEvents
        $eventName = $_POST["eventName"];
        $eventDate = $_POST["eventDate"];
        $eventDescription = $_POST["eventDesc"];
        $eventHash = $_POST["eventHash"];
        $eventLoc = $_POST["eventLoc"];
        $imgName = isset($uploadFile["name"]) ? $uploadFile["name"] : null;
        

        $queryCheck = "SELECT * FROM localevents WHERE name = '$eventName' AND user_id = '$userID'";
        echo "queryCheck: " . $queryCheck . "<br/>";
        $resCheck = mysqli_query($mysqli, $queryCheck);
        $numRows = mysqli_num_rows($resCheck);
        echo "numRows: " . $numRows . "<br/>";
        if($numRows == 0) {
            $query = "INSERT INTO localevents (user_id, name, image_name, description, date, location, hashtags) 
                    VALUES ('$userID', '$eventName', '$imgName', '$eventDescription', '$eventDate', '$eventLoc', '$eventHash')";
            $res = mysqli_query($mysqli, $query) == TRUE;
            echo $query . "<br/>";
        } else {
            echo "Event already exists";
        }
    }

    //check if event added to database
    $query = "SELECT * FROM localevents WHERE name = '$eventName' AND user_id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    echo "numRows: " . mysqli_num_rows($res) . "<br/>";
    if(mysqli_num_rows($res) > 0)
    {
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $pass;
        header('Location: home.php');
    }
    else
    {
        echo '<h1>event creation unsuccessful!</h1>
        <p> <a href="home.php">Retry</a></p>';
    }
?>