<?php
    //all errors
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //get hidden fields
    $eventID = $_POST["eventId"];
    echo "eventId: $eventID";



    // $sql = "DELETE FROM localevents WHERE localEvent_id = $eventId";
    // $res = mysqli_query($mysqli, $sql);

    //delete event and adjust localEvent_id in localevents table
    // if(isset($_POST["deleteBtnId"]))
    // {
    //     $sql = "DELETE FROM localevents WHERE localEvent_id = $eventId";
    //     $res = mysqli_query($mysqli, $sql);
    //     $sql = "UPDATE localevents SET localEvent_id = localEvent_id - 1 WHERE localEvent_id > $eventId";
    //     $res = mysqli_query($mysqli, $sql);
    // }

?>