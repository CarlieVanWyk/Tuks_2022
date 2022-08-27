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
                    <div class='modal-body'>";
                    
                    // $_SESSION['localEvent_id'] = $row['localEvent_id'];
                
                    $query2 = "SELECT * FROM lists WHERE user_id = '$userID'";
                    $res2 = mysqli_query($mysqli, $query2);
                    
                    while($row2 = mysqli_fetch_array($res2)){
                        echo "
                            <div class='card' id='listCard'>
                                <a href='selectedList.php?listID=" . $row2["list_id"] . "&currentPage=lists.php'>
                                    <h3 class='card-header'>" . $row2['name'] . "</h3>
                                
                                    <div class='card-body'>
                                        <p class='card-text'>" . $row2['description'] . "</p>
                                    </div>
                                </a>
                                <form action='submitEventToList.php' method='post'>
                                    <input type='hidden' name='listID' value='" . $row2['list_id'] . "'>
                                    <input type='hidden' name='localEvent_id' value='" . $_SESSION['localEvent_id'] . "'>
                                    <button type='submit'>Add</button>
                                </form>
                            </div>";
                    }

    echo        "   </div>
                </div>
            </div>
        </div>";
?>