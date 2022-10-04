<!-- <h2>Are you friends?</h2> -->
<!-- <div>
    <p>You and xxx are not friends</p>
    <button>Add friend</button>
</div> -->

<?php
    require "master.php";

    // echo $emailOfSelectedUser;
    // echo $passOfSelectedUser;

    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

     // get name from users where email = email and password = password
    $query = "SELECT * FROM users WHERE email = '$emailOfSelectedUser' AND password = '$passOfSelectedUser'";
    $res = mysqli_query($mysqli, $query);
    $result = mysqli_fetch_array($res);
    $friendName = isset($result["name"]) ? $result["name"] : null;
    $friendID = isset($result["id"]) ? $result["id"] : null;

    $email = $_SESSION["email"];
    $pass = $_SESSION["pass"];
      // get id from users where email = email and password = password
    $query0 = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
    $res0 = mysqli_query($mysqli, $query0);
    $userID = mysqli_fetch_array($res0);
    $userID = isset($userID["id"]) ? $userID["id"] : null;

    echo "<h2>Are you and ". $friendName ." friends?</h2>";

    $query1 = "SELECT * FROM friends WHERE friend_id = '$friendID' AND user_id = '$userID'";
    $res1 = $mysqli->query($query1);
    // $row1 = mysqli_fetch_array($res1);

    if(mysqli_num_rows($res1) > 0)
    {
        echo "<div>
                <p>You and ". $friendName ." are friends</p>
                <a href='removeFriend.php?friendID=" . $friendID . "&userID=". $userID ."'>
                    <button>Remove friend</button>
                </a>
            </div>";
    }
    else
    {
        echo "<div>
                <p>You and ". $friendName ." are not friends</p>
                <a href='addFriend.php?friendID=" . $friendID . "&userID=". $userID ."'>
                  <button>Add friend</button>
                </a>
            </div>";
    }
?>