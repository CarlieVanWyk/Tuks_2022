<?php
    require "master.php";
    session_start();
    // $emailOfSelectedUser = $_SESSION["email"];
    // $passOfSelectedUser = $_SESSION["pass"];

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // echo $emailOfSelectedUser;
    // echo $passOfSelectedUser;

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$emailOfSelectedUser' AND password = '$passOfSelectedUser'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null;  
    // echo $userID;


	$query1 = "SELECT * FROM profileuserdetails WHERE user_id = '$userID'";
    $res1 = $mysqli->query($query1);
    $row1 = mysqli_fetch_array($res1);

    if($row1["profile_img"] == null || $row1["name_surname"] == null || $row1["job"] == null || $row1["quote"] == null || $row1["bday"] == null)
    {
        $profile_img = "defaultProfileImg.png";
        $name_surname = "Name Surname";
        $job = "Job";
        $quote = "Quote";
        $bDay = "1 Jan 2022";
    }
    else
    {
        $profile_img = $row1["profile_img"];
        $name_surname = $row1["name_surname"];
        $job = $row1["job"];
        $quote = $row1["quote"];
        $bDay = $row1["bday"];
    }

    echo "<div id='userImage'>
            <img src='../gallery/". $profile_img ."' alt='user' />
            <p>".$name_surname."</p>
        </div>
        <div id='userInfo'>
            <p><b>Job: </b>". $job ."</p>
            <p><b>Quote: </b> '". $quote ."'</p>
            <p><b>Birthday: </b> ". $bDay ."</p>
        </div>";

    
?>