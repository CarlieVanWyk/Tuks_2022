<?php
    $listID = $row["list_id"];
    $listName = $row["name"];
    $listDescription = $row["description"];


    echo "
    <button id='editBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#editBtn" . $listID . "' data-whatever='@mdo'>
            <i class='fa-solid fa-pencil'></i>
    </button>
    <div class='modal fade' id='editBtn" . $listID . "' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <button class='' data-dismiss='modal'>
                <i class='fa-solid fa-xmark fa-2x'></i>
            </button>
            <h2 class='modal-title' id='exampleModalLabel'>Edit List</h2>
            </div>
            <div class='modal-body'>
                <form action='editListBtnSubmit.php' method='post' enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label for='listName' class='col-form-label'>Name:</label>
                        <input type='text' class='form-control' name='listName' placeholder='" . $listName . "'>
                    </div>
                    <div class='form-group'>
                        <label for='listDesc' class='col-form-label'>Description:</label>
                        <input type='text' class='form-control' name='listDesc' placeholder='" . $listDescription . "'/>
                    </div>
                    <input type='hidden' id='listId' name='listId' value='" . $listID . "'/>";

    echo            "<button class='btn'>
                        Edit
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>";
?>