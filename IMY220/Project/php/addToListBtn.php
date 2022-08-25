<?php
    echo "
    <button id='addToListBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#addToListBTN' data-whatever='@mdo'>
            <i class='fa-solid fa-circle-plus'></i><i class='fa-solid fa-bars-staggered'></i>
    </button>
    <div class='modal fade' id='addToListBTN' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <button data-dismiss='modal'>
                    <i class='fa-solid fa-xmark fa-2x'></i>
                </button>
                <h2 class='modal-title' id='exampleModalLabel'>Save to List</h2>
            </div>
            <div class='modal-body'>
                // list all lists here and put 'add' button next to each and when clicked add event to list
            </div>
            </div>
        </div>
    </div>";
?>