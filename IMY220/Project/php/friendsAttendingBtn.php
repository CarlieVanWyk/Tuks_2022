<?php
    echo "
    <button id='friendsBTNid' type='button' class='btn' data-toggle='modal' 
            data-target='#friendsBTN' data-whatever='@mdo'>
            <i class='fa-solid fa-user-group'></i>
    </button>
    <div class='modal fade' id='friendsBTN' tabindex='-1' role='dialog' 
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <form action='deleteBtn.php' method='post'>
                    <div class='modal-header'>
                        <h2 class='modal-title' id='exampleModalLabel'>Friends attending</h2>
                    </div>
                    <div class='modal-body'>
                        // list all friends attending here (profile pic and name)
                    </div>

                    
                </form>
            </div>
        </div>
    </div>"
?>
