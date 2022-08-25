<?php

    echo "
    <button id='deleteBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#deleteBTN' data-whatever='@mdo'>
        <i class='fa-solid fa-trash-can'></i>
    </button>
    <div class='modal fade' id='deleteBTN' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <form action='deleteBtn.php' method='post'>
                    <div class='modal-header'>
                        <h2 class='modal-title' id='exampleModalLabel'>Are you sure?</h2>
                    </div>
                    <div class='modal-body'>
                        <button id='deleteBtnId' type='submit' class='btn'>Delete</button>
                        <button type='button' class='btn' data-dismiss='modal' >Cancel</button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>"
?>

<?php

?>