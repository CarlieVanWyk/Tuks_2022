<?php
    require "master.php";
    session_start();
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // echo $email;
    // echo $pass;

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
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

    echo "
        <button id='editUserDetailsBTNid' type='button' class='btn' data-toggle='modal' 
                data-target='#editUserDetailsBTN" . $userID . "' data-whatever='@mdo'>
                <i class='fa-solid fa-pencil fa-2x'></i> 
        </button>
        <div class='modal fade' id='editUserDetailsBTN" . $userID . "' tabindex='-1' role='dialog' 
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                <button class='' data-dismiss='modal'>
                    <i class='fa-solid fa-xmark fa-2x'></i>
                </button>
                <h2 class='modal-title' id='exampleModalLabel'>Edit Your Details</h2>
                </div>
                <div class='modal-body'>
                    <form action='editUserDetailsBtnSubmit.php' method='post' enctype='multipart/form-data'>
                        <div class='form-group'>
                            <label for='userProfileName' class='col-form-label'>Name:</label>
                            <input id='userProfileName' type='text' class='form-control' name='userProfileName' placeholder='" . $name_surname . "'>
                        </div>
                        <div class='form-group'>
                            <label for='profilePicToUpload' class='col-form-label'>Image:</label>
                            <input id='profilePicToUpload' type='file' class='form-control' name='profilePicToUpload' placeholder='" . $profile_img .".jpg'/>
                        </div>
                        <div class='form-group'>
                            <label for='userProfileJob' class='col-form-label'>Job:</label>
                            <input id='userProfileJob' type='text' class='form-control' name='userProfileJob' placeholder='" . $job . "'/>
                        </div>
                        <div class='form-group'>
                            <label for='userProfileQuote' class='col-form-label'>Quote:</label>
                            <input id='userProfileQuote' type='text' class='form-control' name='userProfileQuote' placeholder='" . $quote . "'/>
                        </div>
                        <div class='form-group'>
                            <label for='userProfileBday' class='col-form-label'>Birthday:</label>
                            <input id='userProfileBday' type='text' class='form-control' name='userProfileBday' placeholder='" . $bDay . "'/>
                        </div>
                        <input type='hidden' id='userID' name='userID' value='" . $userID . "'/>";

    echo            "<button class='btn'>
                        Edit
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>";
    
?>