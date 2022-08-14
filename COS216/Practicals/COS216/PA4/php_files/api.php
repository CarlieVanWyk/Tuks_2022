<?php

//connect to database

$input = file_get_contents("php://input");
$postings = json_decode($input);

if(isset($postings->type)){
    $theType = $postings->type;
    checkType($theType);
}
function startReq(){
        $database = mysqli_connect("wheatley.cs.up.ac.za", "u21672823", "2H7M6WOSZETA7GJ67GZ5BCCBMGLLJFGK", "u21672823_cos216P3") or die("could not connect to database");

    //query selector
    $query  = "SELECT * FROM newsAPI LIMIT 5";
    $Qreturn = mysqli_query($database, $query);  //get info from your API, but in weird format
    // $Qreturn = mysqli_fetch_assoc($Qreturn);   //ask to make data gotten from above line into an associative array
    $valuesData = new stdClass();
    $index = 0;

    $setUpDataToAssociativeArr = new stdClass();    //stdClass makes it an associative array
    $setUpDataToAssociativeArr->status = "success";
    $setUpDataToAssociativeArr->timestap = time();

    while($insidedata = mysqli_fetch_assoc($Qreturn)){    
        $setUpDataToAssociativeArr->values[$index] = innerJson($insidedata);
        $index++;
    }
    //make json object using data from db
    
    
    // $setUpDataToAssociativeArr->values[$index] = $valuesData;
    $finalJSonObj = json_encode($setUpDataToAssociativeArr);     //this makes it a JSON object

    echo $finalJSonObj;
}

function innerJson($Qreturn){
    $valuesData = new stdClass();
    if(isset($Qreturn['title'])){                           //access Qreturn as you would a normal json object
        $valuesData->title = $Qreturn['title'];
    }
    if(isset($Qreturn['description'])){
        $valuesData->description = $Qreturn['description'];
    }
    if(isset($Qreturn['date'])){
        $valuesData->date = $Qreturn['date'];
    }
    if(isset($Qreturn['author'])){
        $valuesData->author = $Qreturn['author'];
    }
    if(isset($Qreturn['imgURL'])){
        $valuesData->imgURL = $Qreturn['imgURL'];
    }
    return $valuesData;
}

function checkType($m){
    if($m == 'info'){
        startReq();
    }else if($m == 'login'){
        header('location: signup.php');
    }else{
        $setUpDataToAssociativeArr = new stdClass();    //stdClass makes it an associative array
        $setUpDataToAssociativeArr->status = "failed";
        $setUpDataToAssociativeArr->timestap = time();
        $setUpDataToAssociativeArr->values = "not implemented yet";
        $finalJSonObj = json_encode($setUpDataToAssociativeArr);
        echo $finalJSonObj;
    }
}
?>