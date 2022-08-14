<?php

session_start();

//connect to database
$database = mysqli_connect("wheatley.cs.up.ac.za", "u21672823", "2H7M6WOSZETA7GJ67GZ5BCCBMGLLJFGK", "u21672823_cos216P3") or die("could not connect to database");

$errors = array(); 

if(isset($_POST["login_user"])) {
  $username = mysqli_real_escape_string($database, $_POST["nameField"]);
  $password = mysqli_real_escape_string($database, $_POST["passField1"]);

  if(empty($username)) {
    array_push($errors, "username is required");
  }
  if(empty($password)) {
    array_push($errors, "password is required");
  }

  if(count($errors) == 0) {
  // if(true) {
    //hash and salt the provided password from above and then only can you compare it with the password stored 
    //in the database
    $password = hash('sha256',($password));
    $password = "shfrohevn4539svsod".$password."blehfjhr";

    //ask database if the entered data match with what is stored inside it
    $query = "SELECT * FROM userInfo WHERE username='$username' AND password='$password'";

    $result = mysqli_query($database, $query);

    if($result) {

      $_SESSION['username'] = $username; 
      $_SESSION['success'] = "logged in successfully";

      //redrect them to index page
     
      header("location: today.php");
    }
    else {
      array_push($errors, "wrong username/password, please try again");
    }
  }

  //store API key in DOM storage
  $get_info_query = "SELECT * FROM userInfo WHERE username = '$username' or email = '$email'";
  $result = mysqli_query($database, $get_info_query);
  $resultsArr = mysqli_fetch_assoc($result);

  $_SESSION['apiKey'] = $resultsArr['apiKey'];
}

?>

<!-- <script>
    /*Carlie van wyk*/

/*variables*/
var Name = document.getElementById("nameField");
var password = document.getElementById("passField1");
var button = document.getElementById("formSubmit");

var validName = false;
var validPass1 = false; 

/*onclick event*/
button.onclick = function () {
  if (Name.value.length != 0) {
    validName = true;
    console.log(validName);
  }

  if (password.value.length != 0) {
    validPass1 = true;
    console.log(validPass1);
  }

  if (confirmPassword.value.length != 0) {
    validPass2 = true;
    console.log(validPass2);
  }

//   if (
//     validName == true &&
//     validPass1 == true
//   ) {
//     console.log("submit!");
//     return true;
//   } else
//     document.getElementById("submitMessage").innerHTML =
//       "Make sure all form fields are filled in and valid";
//   return false;
};

/*onblur events*/
Name.onblur = function () {
  var NameValue = Name.value;
  var icon = document.getElementById("nameImg");

  if (NameValue === "" || NameValue.length == 1) {
    document.getElementById("nameMessage").innerHTML = "Name is too short";
    icon.setAttribute("src", "../images/cross.png");
    validName = false;
  } else {
    document.getElementById("nameMessage").innerHTML = " ";
    icon.setAttribute("src", "../images/tick.png");
    validName = true;
  }
};





/*___________________________________________________________________________________________check password */
function passwordRequirements(value) {
  let requirements = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$"
  );

  if (!value || value.length === 0) {
    return false;
  }

  // if value passes regex test
  if (requirements.test(value)) {
    return true;
  } else {
    return false;
  }
}

password.onblur = function () {
  var passwordValue = password.value;
  var icon = document.getElementById("pass1Img");

  if (
    passwordValue === "" ||
    passwordValue.length < 8 ||
    passwordRequirements(passwordValue) == false
  ) {
    document.getElementById("pass1Message").innerHTML =
      "Password must have at least 8 characters, an upper and lowercase letter, a special character and a number";
    icon.setAttribute("src", "../images/cross.png");
    validName = false;
  } else {
    document.getElementById("pass1Message").innerHTML = " ";
    icon.setAttribute("src", "../images/tick.png");
    validName = true;
  }
};

</script> -->