<?php
    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    // get id from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $res = mysqli_query($mysqli, $query);
    $userID = mysqli_fetch_array($res);
    $userID = isset($userID["id"]) ? $userID["id"] : null; 

    $query = "SELECT * FROM lists WHERE user_id = '$userID'";
    $res = mysqli_query($mysqli, $query);
    
    // while($row = mysqli_fetch_array($res)){
    //     echo "
    //         <div class='card' id='listCard'>
    //             <a href='selectedList.php?listID=" . $row["list_id"] . "&currentPage=lists.php'>
    //                 <h3 class='card-header'>" . $row['name'] . "</h3>
                
    //                 <div class='card-body'>
    //                     <p class='card-text'>" . $row['description'] . "</p>
    //                 </div>
    //             </a>
    //         </div>";
    // }

    while($row = mysqli_fetch_array($res)) {
        echo "
            <div class='row mb-3'>
                <div class='col-6 offset-3'>
                    <div class='card' id='listCard'>
                        <a href='selectedList.php?listID=" . $row["list_id"] . "&currentPage=lists.php'>
                            <h3 class='card-header'>" . $row['name'] . "</h3>
                        
                            <div class='card-body'>
                                <p class='card-text'>" . $row['description'] . "</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        ";

    }
    


?>