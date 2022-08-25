<?php
    echo "
    <button id='editBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#editBTN' data-whatever='@mdo'>
            <i class='fa-solid fa-pencil'></i>
    </button>
    <div class='modal fade' id='editBTN' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button class=' data-dismiss='modal'>
                <i class='fa-solid fa-xmark fa-2x'></i>
            </button>
            <h2 class='modal-title' id='exampleModalLabel'>Create Local Event</h2>
            </div>
            <div class='modal-body'>
                <form action='' method='post' enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label for='eventName' class='col-form-label'>Name:</label>
                        <input type='text' class='form-control' name='eventName' required>
                    </div>
                    <div class='form-group'>
                        <label for='picToUpload' class='col-form-label'>Image:</label>
                        <input type='file' class='form-control' name='picToUpload' id='picToUpload' required/>
                    </div>
                    <div class='form-group'>
                        <label for='eventDesc' class='col-form-label'>Description:</label>
                        <input type='text' class='form-control' name='eventDesc' required/>
                    </div>
                    <div class='form-group'>
                        <label for='eventDate' class='col-form-label'>Date:</label>
                        <input type='date' class='form-control' name='eventDate' required>
                    </div>
                    <div class='form-group'>
                        <label for='eventLoc' class='col-form-label'>Location:</label>
                        <input type='text' class='form-control' name='eventLoc' required>
                    </div>
                    <div class='form-group'>
                        <label for='eventHash' class='col-form-label'>Hashtags:</label>
                        <input type='text' class='form-control' name='eventHash' required>
                    </div>";

                    
                    // $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                    // $res = $mysqli->query($query);
                    // if($row = mysqli_fetch_array($res))
                    // {
                    //     echo 	"<input type='hidden' id='email' name='email' value='" . $row['email'] . "'/>
                    //             <input type='hidden' id='pass' name='pass' value='" . $row['password'] . "'/>";				
                    // }
                    // else
                    // {
                    //     echo 	"<div class='alert alert-danger mt-3' role='alert'>
                    //             You are not registered on this site!
                    //         </div>";
                    // }

    echo            "<button class='btn'>
                        create
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>";
?>