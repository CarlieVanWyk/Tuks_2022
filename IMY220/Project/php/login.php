<?php

    session_start();

    // See all errors and warnings
	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);

    // $mysqli = mysqli_connect("localhost", "u21672823", "alkewmar", "u21672823");
    $mysqli = mysqli_connect("localhost", "root", "", "IMY220project");

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $res = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($res) > 0)
    {
        $_SESSION["email"] = $email;
        $_SESSION["pass"] = $pass;
        header('Location: home.php');
    }
    else
    {
        echo '<h1>Login unsuccessful!</h1>
        <p> <a href="../index.html">Retry</a></p>';
    }
?>