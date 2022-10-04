<?php

    $eventId = $row["localEvent_id"];

    echo "
    <button id='attendBtnId' type='button' class='btn' data-toggle='modal' 
            data-target='#attendBtn" . $eventId . "' data-whatever='@mdo'>
            Attend
    </button>
    <div class='modal fade' id='attendBtn" . $eventId . "' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button class='' data-dismiss='modal'>
                <i class='fa-solid fa-xmark fa-2x'></i>
            </button>
            <h2 class='modal-title' id='exampleModalLabel'>What was the event like?</h2>
            </div>
            <div class='modal-body'>
                <form action='attendBtnSubmit.php' method='post' enctype='multipart/form-data'>

                    <div class='form-group'>
                        <label for='picToUpload' class='col-form-label'>Image:</label>
                        <input type='file' class='form-control' name='picToUpload' id='picToUpload'/>
                    </div>
                    <div class='form-group'>
                        <label for='eventDesc' class='col-form-label'>Description:</label>
                        <input type='text' class='form-control' name='eventDesc'/>
                    </div>
                    <div class='form-group'>
                        <label for='eventRating' class='col-form-label'>5 Star Rating:</label>
                        <input type='text' class='form-control' name='eventRating'/>
                    </div>
                    <input type='hidden' id='eventId' name='eventId' value='" . $eventId . "'/>";

    echo            "<button type='submit' class='btn'>
                        Attend
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>";
?>