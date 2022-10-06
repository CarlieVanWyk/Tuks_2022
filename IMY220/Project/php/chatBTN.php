<?php
    //gett user name and friend name
    $query = "SELECT * FROM users WHERE id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($res);
    $userName = $row["name"];

    $query1 = "SELECT * FROM users WHERE id = '$friendID'";
    $res1 = mysqli_query($mysqli, $query1);
    $row1 = mysqli_fetch_array($res1);
    $friendName = $row1["name"];

     echo "
     <button id='chatBTNid' type='button' class='btn' data-toggle='modal' 
             data-target='#chatBTN" . $userID . "' data-whatever='@mdo'>
             Chat
     </button>
     <div class='modal fade' id='chatBTN" . $userID . "' tabindex='-1' role='dialog' 
         aria-labelledby='exampleModalLabel' aria-hidden='true'>
         <div class='modal-dialog modal-dialog-centered' role='document'>
             <div class='modal-content'>
             <div class='modal-header'>
             <h2 class='modal-title' id='exampleModalLabel'><img class='userPfpSmall' src='../gallery/". $row2["profile_img"] ."' alt='user' /> "
             . $row2['name_surname'] . "</h2>
             </div>
             <div class='modal-body'>
                <div class='chatArea'>
                    <div class='box2 userOther'> Hey Hey 😊</div>
                </div>
                <form>
                    <input id='messageToSend' type='text' />
                    <button id='messageToSendBTN' type='submit'>Send</button>
                </form>";

 echo            "
            </div>
        </div>
     </div>
 </div>";
?>