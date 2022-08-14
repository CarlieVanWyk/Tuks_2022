<?php

session_start();

//initialize varaibles
$APIKey = $_SESSION['apiKey'];

//connect to database
$database = mysqli_connect("wheatley.cs.up.ac.za", "u21672823", "2H7M6WOSZETA7GJ67GZ5BCCBMGLLJFGK", "u21672823_cos216P3") or die("could not connect to database");   //("IP address of where database is", "user", "password", "database you want to target")                                      //first parameter is the IP address of where your database is (wheatley/phpmyadmin IP = 137.215.98.223), not sure if this is correct


//____________________________________________________________signup users
//gather info from form:
if(isset($_POST["rating1"])){
    $rate1 = mysqli_real_escape_string($database, $_POST["rating1"]);
}

//__________________________________________________________Grab article from newsAPI table


$query  = "INSERT INTO ratingToday(apiKey, rating) VALUES ('$APIKey', '$rate1')";
mysqli_query($database, $query);    //run query on database


header('location: today.php');
?>
