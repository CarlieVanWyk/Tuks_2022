<?php

session_start();

//initialize varaibles
$username = "";
$email = "";

$errors = array(); 

//connect to database
$database = mysqli_connect("wheatley.cs.up.ac.za", "u21672823", "2H7M6WOSZETA7GJ67GZ5BCCBMGLLJFGK", "u21672823_cos216P3") or die("could not connect to database");   //("IP address of where database is", "user", "password", "database you want to target")                                      //first parameter is the IP address of where your database is (wheatley/phpmyadmin IP = 137.215.98.223), not sure if this is correct


//____________________________________________________________signup users
//gather info from form:
if(isset($_POST["nameField"])){
  $username = mysqli_real_escape_string($database, $_POST["nameField"]); //("connection you made with database", "store variable you are trying to access in post array")
}
if(isset($_POST["surnameField"])){
$surname = mysqli_real_escape_string($database, $_POST["surnameField"]);
}
if(isset($_POST["emailField"])){
$email = mysqli_real_escape_string($database, $_POST["emailField"]);
}
if(isset($_POST["passField1"])){
$password1 = mysqli_real_escape_string($database, $_POST["passField1"]);
}if(isset($_POST["passField2"])){
$password2 = mysqli_real_escape_string($database, $_POST["passField2"]);
}

//________________________________create form validation logic
//tackle any errors from user:
if(empty($username))
{
    array_push($errors, "username is required");
}
if(empty($surname))
{
    array_push($errors, "surname is required");
}
if(empty($email))
{
    array_push($errors, "email is required");
}
if(empty($password1))
{
    array_push($errors, "password is required");
}
// if($password1 != $password2)
// {
//     array_push($errors, "passwords need to match");
// }

//check if username being put in already exist in database
$user_check_query = "SELECT * FROM userInfo WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($database, $user_check_query);
$user = mysqli_fetch_assoc($results);                       //fetches any matches that might occur from prev line

if($user) {                       //if line 49 is true
    if($user["username"] === $username) {
        array_push($errors, "username already exist");
    }
    if($user["email"] === $email) {
        array_push($errors, "this email already has a registered username");
    }
}

//____________finally register user if there are no errors
if(count($errors) == 0) {
    
    //encrypt your passwords:
    // $password = md5($password1);
    $password = hash('sha256',($password));
    //add salt to password:
    $salted = "shfrohevn4539svsod".$password."blehfjhr";
    // $salted = randomStr().$password.randomStr();
    $apiKey = randomStr();
    $query  = "INSERT INTO userInfo(username, surname, email, password, apiKey) VALUES ('$username', '$surname', '$email', '$salted', '$apiKey')";

    mysqli_query($database, $query);    //run query on database

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: registeredUser.php');
}

//generate a reandom string (alpha-numeric) function, used in salting and API key
function randomStr($length = 10) {
  $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charLength = strlen($char);
  $randomStr = '';
  for ($i = 0; $i < $length; $i++) {
      $randomStr .= $char[rand(0, $charLength - 1)];
  }

  $result = $randomStr;
  return $result;
}



?>








<!-- <script>
    /*Carlie van wyk*/

/*variables*/
var Name = document.getElementById("nameField");
var surname = document.getElementById("surnameField");
var email = document.getElementById("emailField");
var password = document.getElementById("passField1");
var confirmPassword = document.getElementById("passField2");
var button = document.getElementById("formSubmit");

var validName = false;
var validSurname = false;
var validEmail = false;
var validPass1 = false;
var validPass2 = false;

/*onclick event*/
button.onclick = function () {
  if (Name.value.length != 0) {
    validName = true;
    console.log(validName);
  }

  if (surname.value.length != 0) {
    validSurname = true;
    console.log(validSurname);
  }

  if (email.value.length != 0) {
    validEmail = true;
    console.log(validEmail);
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
//     validSurname == true &&
//     validEmail == true &&
//     validPass1 == true &&
//     validPass2 == true
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

surname.onblur = function () {
  var surnameValue = surname.value;
  var icon = document.getElementById("surnameImg");

  if (surnameValue === "" || surnameValue.length == 1) {
    document.getElementById("surnameMessage").innerHTML =
      "Surname is too short";
    icon.setAttribute("src", "../images/cross.png");
    validName = false;
  } else {
    document.getElementById("surnameMessage").innerHTML = " ";
    icon.setAttribute("src", "../images/tick.png");
    validName = true;
  }
};

email.onblur = function () {
  var emailValue = email.value;
  var icon = document.getElementById("emailImg");

  if (
    emailValue === "" ||
    emailValue.indexOf("@") == -1 ||
    emailValue.indexOf(".") == -1
  ) {
    document.getElementById("emailMessage").innerHTML = "Email is not valid";
    icon.setAttribute("src", "../images/cross.png");
    validName = false;
  } else {
    document.getElementById("emailMessage").innerHTML = " ";
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

confirmPassword.onblur = function () {
  var confirmPasswordValue = confirmPassword.value;
  var passwordValue = password.value;
  var icon = document.getElementById("pass2Img");

  if (confirmPasswordValue === "" || confirmPasswordValue != passwordValue) {
    document.getElementById("pass2Message").innerHTML = "Password must match";
    icon.setAttribute("src", "../images/cross.png");
    validName = false;
  } else {
    document.getElementById("pass2Message").innerHTML = " ";
    icon.setAttribute("src", "../images/tick.png");
    validName = true;
  }
};

</script> -->