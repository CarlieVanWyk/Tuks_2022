<?php
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $listID = $_POST["listId"];

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    require "master.php";

    $query = "SELECT * FROM lists WHERE list_id = '$listID'";
    $res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($res);

    $orgName = $row["name"];
    $orgDescription = $row["description"];
    

    if($_POST["listName"] == "") {
        $newName = $orgName;
    }
    else {
        $newName = $_POST["listName"];
    }

    if($_POST["listDesc"] == "") {
        $newDescription = $orgDescription;
    }
    else {
        $newDescription = $_POST["listDesc"];
    }

    echo "name: $newName ";
    echo "descr: $newDescription ";


        $sql = "UPDATE lists SET name = '$newName', description = '$newDescription' WHERE list_id = $listID";
        $res = mysqli_query($mysqli, $sql);
        if($res){
            header('Location: lists.php');
            echo "list edited";
        }else{
            echo "Error editing list";
        }



?>