<?php
    $eventId = $row["localEvent_id"];
    $eventName = $row["name"];
    $eventDate = $row["date"];
    $eventImage = $row["image_name"];
    $eventDescription = $row["description"];
    $eventLocation = $row["location"];
    $eventHashtags = $row["hashtags"];


    echo "
    <button id='editBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#editBtn" . $eventId . "' data-whatever='@mdo'>
            <i class='fa-solid fa-pencil'></i>
    </button>
    <div class='modal fade' id='editBtn" . $eventId . "' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button class='' data-dismiss='modal'>
                <i class='fa-solid fa-xmark fa-2x'></i>
            </button>
            <h2 class='modal-title' id='exampleModalLabel'>Edit Local Event</h2>
            </div>
            <div class='modal-body'>
                <form action='editBtnSubmit.php' method='post' enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label for='eventName' class='col-form-label'>Name:</label>
                        <input type='text' class='form-control' name='eventName' placeholder='" . $eventName . "'>
                    </div>
                    <div class='form-group'>
                        <label for='picToUpload' class='col-form-label'>Image:</label>
                        <input type='file' class='form-control' name='picToUpload' id='picToUpload' placeholder='" . $eventImage .".jpg'/>
                    </div>
                    <div class='form-group'>
                        <label for='eventDesc' class='col-form-label'>Description:</label>
                        <input type='text' class='form-control' name='eventDesc' placeholder='" . $eventDescription . "'/>
                    </div>
                    <div class='form-group'>
                        <label for='eventDate' class='col-form-label'>Date:</label>
                        <input type='date' class='form-control' name='eventDate' placeholder='" . $eventDate . "'>
                    </div>
                    <div class='form-group'>
                        <label for='eventLoc' class='col-form-label'>Location:</label>
                        <input type='text' class='form-control' name='eventLoc' placeholder='" . $eventLocation . "'>
                    </div>
                    <div class='form-group'>
                        <label for='eventHash' class='col-form-label'>Hashtags:</label>
                        <input type='text' class='form-control' name='eventHash' placeholder='" . $eventHashtags . "'>
                    </div>
                    <input type='hidden' id='eventId' name='eventId' value='" . $eventId . "'/>";

    echo            "<button class='btn'>
                        Edit
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>";
?>