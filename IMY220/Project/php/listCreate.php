

<?php
    session_start();

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $mysqli = mysqli_connect("localhost", "root", "", "imy220project");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    //populate lists table
    if(isset($_POST['listName'])){
        $userID = $_POST["id"];
        $listName = $_POST["listName"];
        $listDescr = $_POST["listDesc"];

        $queryCheck = "SELECT * FROM lists WHERE name = '$listName' AND user_id = '$userID'";
        $resCheck = mysqli_query($mysqli, $queryCheck);
        $numRows = mysqli_num_rows($resCheck);
        if($numRows == 0) {
            $query = "INSERT INTO lists (user_id, name, description) VALUES ('$userID', '$listName', '$listDescr')";
            $res = mysqli_query($mysqli, $query) == TRUE;
        } else {
            header('Location: lists.php');
        }
    }

    //check if event added to database
    $query = "SELECT * FROM lists WHERE name = '$listName' AND user_id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($res) > 0)
    {
        header('Location: lists.php');
    }
    else
    {
        echo '<h1>event creation unsuccessful!</h1>
        <p> <a href="home.php">Retry</a></p>';
    }
?>