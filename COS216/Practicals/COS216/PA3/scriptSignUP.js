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

  if (
    validName == true &&
    validSurname == true &&
    validEmail == true &&
    validPass1 == true &&
    validPass2 == true
  ) {
    console.log("submit!");
    return true;
  } else
    document.getElementById("submitMessage").innerHTML =
      "Make sure all form fields are filled in and valid";
  return false;
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
